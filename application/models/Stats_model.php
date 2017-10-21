<?php

class Stats_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->id_user = $_SESSION['id_user'];
    }

    //Statistiques

     function count_hive() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where('id_user', $this->id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function count_apiary() {
        $this->db->select('id_rucher');
        $this->db->from("apiary");
        $this->db->where('id_user', $this->id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function nb_ruche_vide() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where(array('vide' => 1, 'id_user' => $this->id_user));
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    
 
    
    function nb_ruche_pleine() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where(array('vide' => 0, 'id_user' => $this->id_user));
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function nb_ruche_etat_mauvais() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where(array('etat' => 'Mauvais', 'id_user' => $this->id_user));
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function nb_ruche_etat_moyen() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where(array('etat' => 'Moyen', 'id_user' => $this->id_user));
        $query = $this->db->get();
        return $query->num_rows();
    }
    
     function nb_ruche_etat_bon() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where(array('etat' => 'Bon', 'id_user' => $this->id_user));
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function nb_ruche_etat_excellent() {
        $this->db->select('id_beehive');
        $this->db->from("beehive");
        $this->db->where(array('etat' => 'Excellent', 'id_user' => $this->id_user));
        $query = $this->db->get();
        return $query->num_rows();
    }
}
