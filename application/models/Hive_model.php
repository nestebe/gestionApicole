<?php

class Hive_model extends CI_Model {

    public $id_user;
    public $id_apiary;
    public $id_colony;
    public $nom;
    public $beehive_type;
    public $etat;
    public $creation_date;
    public $nombre_corps;
    public $nombre_hausses;
    public $nombre_cadres;
    public $beehive_matiere;
    public $exposition_soleil;
    public $vide;
    public $commentaire;
    public $orientation;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->id_user = $_SESSION['id_user'];
    }

    public function get_list() {

        $query = $this->db->get_where('beehive', array('id_user' => $this->id_user), 1000);
        return $query->result();
    }

    public function get_list_details() {
        return $this->db->query("select a.libelle, h.nom, h.creation_date, h.etat from ".$this->db->dbprefix('beehive')." h 
INNER JOIN apiary a ON a.id_rucher = h.id_apiary WHERE a.id_user = " . $this->id_user);
    }

    public function get_hive($id_hive) {
        $query = $this->db->get_where('beehive', array('id_beehive' => $id_hive, 'id_user' => $this->id_user));
        return $query->row();
    }

     function select2_data_hive($id_apiary) {
      $query = $this->db->query("SELECT id_beehive as id, nom as text FROM ".$this->db->dbprefix('beehive')." WHERE id_user = '" . $this->id_user."' AND id_apiary = '".$id_apiary."';" );

        return $query->result();
    }
    
    public function create_hive() {
        $this->id_user = $this->id_user;

        $this->id_apiary = $this->input->post('id_apiary', TRUE); 
        $this->nom = $this->input->post('nom', TRUE);
        $this->etat = $this->input->post('etat', TRUE);
        $this->nombre_cadres =  $this->input->post('nombre_cadres', TRUE);
        $this->nombre_hausses = $this->input->post('nombre_hausses', TRUE);
        $this->nombre_corps = $this->input->post('nombre_corps', TRUE);
        $this->beehive_type = $this->input->post('beehive_type', TRUE);
        $this->beehive_matiere = $this->input->post('beehive_matiere', TRUE);
        $this->exposition_soleil =$this->input->post('exposition_soleil', TRUE);
        $this->orientation = $this->input->post('orientation', TRUE);
        
        if (isset($_POST['vide'])) {
            $this->vide = 1;
        } else {
            $this->vide = 0;
        }
        $this->commentaire =  $this->input->post('commentaire', TRUE);
        $this->creation_date = (new DateTime())->format('Y-m-d H:i:s');
        $this->db->insert('beehive', $this);

        return $this->db->insert_id();


//$id = $this->db->insert_id(); 
    }

    public function update_colony($id_colony, $id_beehive) {
        $this->id_colony = $id_colony;
        
        $this->db->update('beehive', $this, array('id_beehive' => $id_beehive, 'id_user' => $this->id_user));
    }

    public function update_hive($id_hive) {
        
         $hive = $this->get_hive($id_hive);
         $this->creation_date = $hive->creation_date;
         
        $this->id_apiary =$this->input->post('id_apiary', TRUE);
        $this->nom = $this->input->post('nom', TRUE);
        $this->id_colony =$this->input->post('id_colony', TRUE);
        $this->etat = $this->input->post('etat', TRUE); 
        $this->nombre_cadres = $this->input->post('nombre_cadres', TRUE);
        $this->nombre_corps = $this->input->post('nombre_corps', TRUE);
        $this->nombre_hausses = $this->input->post('nombre_hausses', TRUE);
       // $this->commentaire = $this->input->post(['commentaire', TRUE];

        $this->id_user = $this->id_user;
        $this->beehive_type = $this->input->post('beehive_type', TRUE);
        $this->beehive_matiere = $this->input->post('beehive_matiere', TRUE);
        $this->exposition_soleil = $this->input->post('exposition_soleil', TRUE);
        $this->orientation = $this->input->post('orientation', TRUE);
        if (isset($_POST['vide'])) {
            $this->vide = 1;
        } else {
            $this->vide = 0;
        }
        //  $this->vide = $_POST['vide'];
        $this->commentaire = $this->input->post('commentaire', TRUE); // $_POST['commentaire'];
        $this->db->update('beehive', $this, array('id_beehive' => $id_hive, 'id_user' => $this->id_user));
        return $this->db->insert_id();
    }

    function delete_hive($id_hive) {

        $this->db->where('id_user', $this->id_user);
        $this->db->where('id_beehive', $id_hive);
        $this->db->delete('beehive');
    }

    function check_doublon($nom, $id_hive) {

        $query = $this->db->get_where('beehive', array('id_beehive' => $id_hive, 'nom' => $nom, 'id_user' => $this->id_user));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
         function count_hive() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where('id_user', $this->id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }

    
}
