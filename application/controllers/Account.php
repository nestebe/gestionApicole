<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library(array('session')); //utilisation des sessions
        $this->load->helper('url'); //utiliser des fonction de redirection
        $this->load->database();
    }
    

    public function index() {
        //	$this->load->database();
        $this->load->view('account/register');
    }

    public function deconnexion() {
        //	$this->load->database();
        session_unset();
        redirect('/login/index', 'refresh');
    }

    public function new_user() {
        //	$this->load->database();

        $this->load->model('user_model', 'user');
        $this->load->model('apiary_model', 'apiary');



        $login = $this->input->post('login', TRUE);
        $name = $this->input->post('name', TRUE);
        $password = $this->input->post('password', TRUE);


        //send email
//        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://ssl0.ovh.net',
//            'smtp_port' => 465,
//            'smtp_user' => 'contact@dev-worker.com', // change it to yours
//            'smtp_pass' => 'triangle123', // change it to yours
//            'mailtype' => 'html',
//            'charset' => 'iso-8859-1',
//            'wordwrap' => TRUE
//        );

        if ($this->user->get_user($login) > 0) {
            echo "Cette email existe déjà...";
        }


        $id_user = $this->user->create_user($login, $name, $password);
        $this->apiary->create_first_apiary($id_user);

        $activation_link = base_url() . "account/validation_user/$id_user";
        //$message = '';
        $this->load->library('email');
        $this->email->set_newline("\r\n");



        $this->email->from('contact@dev-worker.com', 'Beehope');
        $this->email->to($login);
        $this->email->subject('Inscrition Beehope');
        // $this->email->message($message);
        $this->email->message('Bienvenue sur Beehope ! Vous pouvez activer votre compte en cliquant sur le lien suivant: ' . $activation_link . ' Votre login: ' . $login . ',  Votre mot de passe:' . $password . '');
        if ($this->email->send()) {

          //  send_alert($login);
            $this->load->view('account/confirmAccount');
        } else {
            echo "Une erreur s'est produite merci de contacter le support: contact@dev-worker.com";
        }
        // $this->load->view('account/confirmAccount');
    }
    
    
     public function send_alert($email) {
             $this->load->library('email');
             $this->email->from('contact@dev-worker.com', 'Beehope - Inscription');
             $this->email->to('contact@dev-worker.com');
             $this->email->message('Inscription de '.$email);
             
        if ($this->email->send()) {
          
        } else {
            echo "Une erreur s'est produite merci de contacter le support: contact@dev-worker.com";
        }
     }
    
    

    public function validation_user($id) {
        //	$this->load->database();

        $this->load->model('user_model', 'user');
        $this->user->validation_user($id);


        redirect('/login/index', 'refresh');
    }

    public function checkLogin() {
        //	$this->load->database();
        $this->load->view('account/register');
        $tmp_abonnement = $this->user->get_user($email)->abonnement;
    }

    //authentification
    public function auth() {
        //  session_destroy();


        $email = $this->input->post('email');
        $pwd = $this->input->post('password');
        $query = $this->db->query("SELECT * FROM " . $this->db->dbprefix('user') . " where login = '$email' AND password = '$pwd'");

        if ($query->num_rows() > 0) {
            $this->load->model('user_model', 'user');
            $tmp_nom = $this->user->get_user($email)->nom;
            $tmp_id = $this->user->get_user($email)->id;
            $tmp_abonnement = $this->user->get_user($email)->abonnement;
            $this->session->set_userdata('nom', $tmp_nom);
            $this->session->set_userdata('id_user', $tmp_id);
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('active', true);
            $this->session->set_userdata('abonnement', $tmp_abonnement);

            redirect('/databoard/index', 'refresh');
        } else {
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
