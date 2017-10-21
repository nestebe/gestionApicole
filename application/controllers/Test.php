<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
        $this->load->library('unit_test');
        $this->load->library(array('session')); //utilisation des sessions
        $this->load->helper('url'); //utiliser des fonction de redirection
        $this->load->database();
        $this->session->set_userdata('id_user', 1);
    }

    public function index() {
        //	$this->load->database();
        $this->check_model_apiary();
        // $this->check_model_validation(); 
        echo $this->unit->report();
    }

    public function check_model_apiary() {

        $this->load->model('apiary_model', 'apiary');

        $_POST['nom-rucher'] = "test";
        $_POST['adresse-1'] = "test";
        $_POST['adresse-2'] = "test";
        $_POST['code-postal'] = "test";
        $_POST['commune'] = "test";
        $_POST['description'] = "test";

        $id_apiary = $this->apiary->create_apiary();
        $apiary = $this->apiary->get_apiary($id_apiary);
        $this->unit->run($apiary->libelle, "test", "apiary_creation");
        $_POST['id-rucher'] = $id_apiary;
        $_POST['nom-rucher'] = "test_update";
        $this->apiary->update_apiary();

        $apiary = $this->apiary->get_apiary($id_apiary);
        $this->unit->run($apiary->libelle, "test_update", "apiary_update");

        $this->apiary->delete_apiary($apiary->id_rucher);

        $apiary = $this->apiary->get_apiary($id_apiary);

        $this->unit->run(is_null($apiary), true, "apiary_delete");
    }
    
     public function check_model_hive() {
         $_POST['$beehive_type'] = "test";
         

         
     }
    

    public function check_model_validation() {

        $this->load->model('user_model', 'user');

        $this->load->model('validation_model', 'validation');



        $this->validation->create_validation("test@test.fr");
        $validation = $this->validation->get_validation("test@test.fr");
        $this->unit->run($validation->email, true, "validation_create");

        $validation = $this->validation->delete_validation("test@test.fr");
        $this->validation->get_validation("test@test.fr");
        $this->unit->run(is_null($validation), true, "validation_delete");
    }

}
