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
    public function hiveList() {

        $this->load->model('hive_model', 'hive');
        $this->load->model('apiary_model', 'apiary');


        $page_data["list_hive"] = $this->hive->get_list();

        $page_data['page_name'] = 'hive/hiveList';
        //  $page_data['script_name'] = 'apiary/script_apiaryList';
        $page_data['page_active'] = 'hive';
        $this->load->view('app/index', $page_data);
    }

    public function editHive($id_hive) {


        $this->load->model('hive_model', 'hive');
        $this->load->model('colony_model', 'colony');
        $this->load->model('apiary_model', 'apiary');

        $page_data["ruchers"] = $this->apiary->get_list();
        $hive = $this->hive->get_hive($id_hive);
        $page_data['hive'] = $hive;
        
        $colony = $this->colony->get_colony($hive->id_colony);
        $page_data['colony'] = $colony ;


        $page_data['page_name'] = 'hive/editHive';
        $page_data['script_name'] = 'hive/script_editHive';
        $page_data['page_active'] = 'hive';
        $this->load->view('app/index', $page_data);
    }

    public function newHive() {
        $this->load->model('Hive_model', 'hive');
        
        if($this->hive->count_hive() >= 10){
              redirect('/subscription/index');
        }
                
                
        $this->load->model('apiary_model', 'apiary');
        $page_data["ruchers"] = $this->apiary->get_list();
        $page_data['page_name'] = 'hive/newHive';
        $page_data['script_name'] = 'hive/script_newHive';
        $page_data['page_active'] = 'hive';
        $this->load->view('app/index', $page_data);
    }

    public function create_hive() {
        $this->load->model('hive_model', 'hive');
        $this->load->model('colony_model', 'colony');
        header('Content-type: application/json');

        $_POST['id_beehive'] = $this->hive->create_hive();
        $id_colony = $this->colony->create_colony();
        $this->hive->update_colony($id_colony, $_POST['id_beehive']);



//        if ($this->hive->check_doublon($_POST["nom"],$_POST['id_beehive'])) {
//            $data = array('success' => false, 'msg' => 'Cet identifiant existe');
//        } else {
            $data = array('success' => true);
//        }

        // redirect('/apiary/apiaryList');

        echo json_encode($data);
    }

    public function update_hive() {
        $this->load->model('hive_model', 'hive');
        $this->load->model('colony_model', 'colony');
        header('Content-type: application/json');

        $id_beehive = $this->hive->update_hive($_POST['id_beehive']);
        // $id_colony = $this->colony->update_colony();
        $this->colony->update_colony($_POST['id_colony'], $_POST['id_beehive']);
        $data = array('success' => true);
        echo json_encode($data);
    }

    public function update_apiary() {
        $this->load->model('apiary_model', 'apiary');
        $this->apiary->update_apiary();
        redirect('/apiary/apiaryList');
    }

    public function delete_hive($id_beehive) {
        header('Content-type: application/json');
        $this->load->model('hive_model', 'hive');
        $this->load->model('colony_model', 'colony');
        $hive = $this->hive->get_hive($id_beehive);
        $this->hive->delete_hive($id_beehive);
        $this->colony->delete_colony($hive->id_colony);
        $data = array('success' => true);
         echo json_encode($data);
    }

    
   public function get_source_hive($id_beehive) {

        $this->load->model('hive_model', 'hive');
        header('Content-type: application/json');
        $data = $this->hive->select2_data_hive($id_beehive);
        echo json_encode($data);
    }
    
    
//    public function test() {
//
//        $row = array();
//        $return_arr = array();
//        $row_array = array();
//
//        header("Content-Type: application/json");
//
//        $this->load->model('hive_model', 'hive');
//
//        $this->hive->get_list();
//
//        echo json_encode($this->hive->get_list());
//    }

}
