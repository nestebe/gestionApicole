<?php

class User_model extends CI_Model {

    public $login;
    public $password;
    public $name;
    public $active;
    public $last_login_date;
    public $abonnement;
     public $date_abonnement;  
public $expiration_abonnement;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_user($email) {
        $query = $this->db->get_where('user', array('login' => $email));
        return $query->row();
    }
    
    public function validation_user($id) {
        

        //$user = $this->get_user($email);
        
        $this->db->update('user', $this, array('active' => 1));
        $query = $this->db->get_where('user', array('id' => $id));
        
        return $query->row();
    }
    
    
    
    
    public function create_user($login, $name, $password) {

        $this->login = $login;
        $this->name = $name;
        $this->password = $password;
        $this->active = 0;
        $this->last_login_date = (new DateTime())->format('Y-m-d H:i:s'); 
        $this->abonnement = 0;
        
        
        $this->db->insert('user', $this);

        return $this->db->insert_id(); 
        
//$id = $this->db->insert_id(); 
    }

}
