<?php

class Colony_model extends CI_Model {

    public $id_beehive;
    public $libelle;
    public $date_derniere_visite;
    public $espece;
    public $marquage;
    public $agressivite;
    public $reine_presente;
    public $c_commentaire;
    public $clipage;
    public $activite;
    public $affectation_1;
    public $affectation_2;
    public $id_colony;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->id_user = $_SESSION['id_user'];
    }

    public function get_list() {

        $query = $this->db->get_where('colony', array('id_user' => $this->id_user), 1000);
        return $query->result();
    }

    public function get_colony($id_colony) {
        try {
            $query = $this->db->get_where('colony', array('id_colony' => $id_colony, 'id_user' => $this->id_user));
        } catch (Exception $ex) {
            redirect('/hive/hiveList');
        }

        return $query->row();
    }

    public function create_colony() {
        $this->id_beehive = $this->input->post('id_beehive', TRUE);
        $this->libelle = $this->input->post('libelle', TRUE);
        // $this->date_derniere_visite = new DateTime("".$_POST['date_derniere_visite']);
        $this->espece = $this->input->post('espece', TRUE);

        $this->marquage = $this->input->post('marquage', TRUE);
        $this->agressivite = $this->input->post('agressivite', TRUE);
        $this->reine_presente = 1; //$_POST['reine_presente'];
        $this->c_commentaire = $this->input->post('c_commentaire', TRUE);

        if (isset($_POST['clipage'])) {
            $this->clipage = 1;
        } else {
            $this->clipage = 0;
        }



        $this->activite = $this->input->post('activite', TRUE);
        $this->affectation_1 = $this->input->post('affectation_1', TRUE);
        $this->affectation_2 = $this->input->post('affectation_2', TRUE);
        $this->id_user = $this->id_user;

        $this->db->insert('colony', $this);

        return $this->db->insert_id();
    }

    public function update_colony($id_colony, $id_beehive) {
        $colony = $this->get_colony($id_colony);
        $this->date_derniere_visite = $colony->date_derniere_visite;       
        $this->id_beehive = $id_beehive;//$this->input->post('id_beehive', TRUE);
        $this->libelle =  $this->input->post('libelle', TRUE);
        $this->espece = $this->input->post('espece', TRUE);
        $this->marquage = $this->input->post('marquage', TRUE);
        $this->agressivite =$this->input->post('agressivite', TRUE);
        $this->reine_presente = $this->input->post('reine_presente', TRUE); 
        $this->c_commentaire = $this->input->post('c_commentaire', TRUE);  
        $this->clipage = $this->input->post('clipage', TRUE);
        $this->activite =$this->input->post('activite', TRUE);
        $this->affectation_1 = $this->input->post('affectation_1', TRUE);
        $this->affectation_2 =$this->input->post('affectation_2', TRUE);
        $this->id_user = $this->id_user;
         $this->id_colony = $id_colony;
        $this->db->update('colony', $this, array('id_colony' => $id_colony, 'id_user' => $this->id_user));
    }

    function delete_colony($id_colony) {

        $this->db->where('id_user', $this->id_user);
        $this->db->where('id_colony', $id_colony);
        $this->db->delete('colony');
    }

    //ANNEXES
    function formatString($value) {

        if (isset($value)) {
            return $value;
        } else {
            return "";
        }
    }

}
