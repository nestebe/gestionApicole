<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {

        parent::__construct();
        $this->load->library(array('session')); //utilisation des sessions
        $this->load->helper('url'); //utiliser des fonction de redirection
        $this->load->database();
    }

    public function index() {
        //	$this->load->database();
        $this->load->view('Login/login');
    }

    //authentification
    public function auth() {
      //  session_destroy();

        
        $email = $this->input->post('email');
        $pwd = $this->input->post('password');


        $query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('user')." where login = '$email' AND password = '$pwd'");

      if( $query->num_rows() > 0 ){
          $this->load->model('user_model', 'user');
          $tmp_nom = $this->user->get_user($email)->name;
          $tmp_id = $this->user->get_user($email)->id;
          $this->session->set_userdata('nom', $tmp_nom);
          $this->session->set_userdata('id_user', $tmp_id);
          $this->session->set_userdata('email', $email);
          $this->session->set_userdata('active', true);
          redirect('/databoard/index', 'refresh');
      }
      else{
            redirect('/login/index', 'refresh');
      }



    }

    public function test() {

        if (!isset($_SESSION['email'])) {
            redirect('/login/index', 'refresh');
        } else {
//            echo $_SESSION['email'];
//            $query = $this->db->get('test');
//
//            foreach ($query->result() as $row) {
//                echo "<br>";
//                echo $row->nom;
//            }
        }
    }

}
