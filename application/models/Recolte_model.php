<?php

class Recolte_model extends CI_Model {

    public $id_ruche;
    public $id_user;
    public $quantite;
    public $unite;
    public $type_recolte;
    public $commentaire;
    public $date_recolte;


    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->id_user = $_SESSION['id_user'];
    }

    public function get_list() {

        $query = $this->db->get_where('recolte', array('id_user' => $this->id_user), 1000);
        return $query->result();
    }

    public function get_recolte($id_recolte) {
        try {
            $query = $this->db->get_where('recolte', array('id_recolte' => $id_recolte, 'id_user' => $this->id_user));
        } catch (Exception $ex) {
            redirect('/recolte/recolteList');
        }

        return $query->row();
    }

    public function create_recolte() {
        $this->id_ruche = $_POST['id_ruche']; // please read the below note
        $this->date_recolte = new DateTime("".$_POST['date_recolte']);
        $this->quantite = $_POST['quantite'];
        $this->unite = $_POST['unite'];
        $this->type_recolte = $_POST['type_recolte'];
        $this->commentaire = $_POST['commentaire'];
        $this->id_user = $this->id_user;
        
        $this->db->insert('recolte', $this);
        
//$id = $this->db->insert_id(); 
    }

    public function update_recolte($id_recolte) {
           $this->id_ruche = $_POST['id_ruche']; // please read the below note
        $this->date_recolte = new DateTime("".$_POST['date_recolte']);
        $this->quantite = $_POST['quantite'];
        $this->unite = $_POST['unite'];
        $this->type_recolte = $_POST['type_recolte'];
        $this->commentaire = $_POST['commentaire'];
        $this->id_user = $this->id_user;
        
        $this->db->update('recolte', $this, array('id_recolte' => $id_recolte, 'id_user' => $this->id_user));
    }

    function delete_recolte($id_recolte) {
        $this->db->where('id_user', $this->id_user);
        $this->db->where('$id_recolte', $id_recolte);
        $this->db->delete('recolte');
    }

}
