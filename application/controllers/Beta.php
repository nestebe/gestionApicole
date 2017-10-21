<?php

class Hive extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library(array('session')); //utilisation des sessions
        $this->load->helper('url'); //utiliser des fonction de redirection
        $this->load->database();
        if (!isset($_SESSION['active'])) {
            redirect('/login/index', 'refresh');
        }
    }

    //views/databoard/index
    public function index() {

        $this->load->model('hive_model', 'hive');
        $this->load->model('apiary_model', 'apiary');
        
 
        $page_data["list_hive"] = $this->hive->get_list();

        $page_data['page_name'] = 'hive/hiveList';
        //  $page_data['script_name'] = 'apiary/script_apiaryList';
        $page_data['page_active'] = 'hive';
        $this->load->view('app/index', $page_data);
    }



}
