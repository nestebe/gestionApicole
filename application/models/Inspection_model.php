<?php

class Inspection_model extends CI_Model {

    public $id_ruche;
    public $date_visite;
    public $activite;
    public $nombre_cadre_cuvain;
    public $nombre_cadre_pollen;
    public $nombre_cadre_miel;
    public $est_malade;
    public $maladie;
    public $traitement;
    public $commentaire;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->id_user = $_SESSION['id_user'];
    }

    public function get_list() {

        $query = $this->db->get_where('inspection', array('id_user' => $this->id_user), 1000);
        return $query->result();
    }

    public function get_inspection($id_inspection) {
        try {
            $query = $this->db->get_where('inspection', array('id_inspection' => $id_inspection, 'id_user' => $this->id_user));
        } catch (Exception $ex) {
            redirect('/inspection/inspectionList');
        }

        return $query->row();
    }

    public function create_inspection() {
        $this->id_ruche = $this->input->post('id_ruche', TRUE);

        $tabDate = explode("/", $_POST['date_visite']);
        $tabDate2 = explode(" ", $tabDate[2]);

        $dJour = $tabDate[0];
        $dMois = $tabDate[1];
        //   $dMois =  $tabDate[2];
        $dAnnee = $tabDate2[0];
        $dTemps = $tabDate2[1];

        $datetime = new DateTime($dAnnee . "-" . $dMois . "-" . $dJour . " " . $dTemps);

        $this->date_visite = $datetime->format('Y-m-d H:i:s');

        $this->activite = $this->input->post('activite', TRUE);
        $this->nombre_cadre_cuvain = $this->input->post('nombre_cadre_cuvain', TRUE);
        $this->nombre_cadre_pollen = $this->input->post('nombre_cadre_pollen', TRUE);
        $this->nombre_cadre_miel = $this->input->post('nombre_cadre_miel', TRUE);
        if (isset($_POST['est_malade'])) {
            $this->est_malade = 1;
        } else {
            $this->est_malade = 0;
        }
        $this->maladie = $this->input->post('maladie', TRUE);
        $this->traitement = $this->input->post('traitement', TRUE);
        $this->commentaire = $this->input->post('commentaire', TRUE);
        $this->id_user = $this->id_user;

        $this->db->insert('inspection', $this);

//$id = $this->db->insert_id(); 
    }

    public function update_inspection($id_inspection) {

        $this->id_ruche = $this->input->post('id_ruche', TRUE);
        $tabDate = explode("/", $_POST['date_visite']);
        $tabDate2 = explode(" ", $tabDate[2]);

        $dJour = $tabDate[0];
        $dMois = $tabDate[1];
        //   $dMois =  $tabDate[2];
        $dAnnee = $tabDate2[0];
        $dTemps = $tabDate2[1];

        $datetime = new DateTime($dAnnee . "-" . $dMois . "-" . $dJour . " " . $dTemps);

        $this->date_visite = $datetime->format('Y-m-d H:i:s');

        $this->activite = $this->input->post('activite', TRUE);
        $this->nombre_cadre_cuvain = $this->input->post('nombre_cadre_cuvain', TRUE);
        $this->nombre_cadre_pollen = $this->input->post('nombre_cadre_pollen', TRUE);
        $this->nombre_cadre_miel = $this->input->post('nombre_cadre_miel', TRUE); //$_POST['nombre_cadre_miel'];
        if (isset($_POST['est_malade'])) {
            $this->est_malade = 1;
        } else {
            $this->est_malade = 0;
        }
        // $this->est_malade =  $this->input->post('est_malade', TRUE); 
        $this->maladie = $this->input->post('maladie', TRUE);
        $this->traitement = $this->input->post('traitement', TRUE);
        $this->commentaire = $this->input->post('commentaire', TRUE);
        $this->id_user = $this->id_user;

        $this->db->update('inspection', $this, array('id_inspection' => $id_inspection, 'id_user' => $this->id_user));
    }

    function delete_inspection($id_inspection) {

        $this->db->where('id_user', $this->id_user);
        $this->db->where('id_inspection', $id_inspection);
        $this->db->delete('inspection');
        //  $data = array('success' => true);
        // echo json_encode($data);
    }

}
