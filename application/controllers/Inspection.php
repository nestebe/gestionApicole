
<?php

class Inspection extends CI_Controller {

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
    public function inspectionList() {

        $this->load->model('inspection_model', 'inspection');

        $page_data["list_inspection"] = $this->inspection->get_list();

        $page_data['page_name'] = 'inspection/inspectionList';

        //  $page_data['script_name'] = 'apiary/script_apiaryList';
        $page_data['page_active'] = 'inspection';
        $this->load->view('app/index', $page_data);
    }

    public function editInspection($id_inspection) {

        $this->load->model('inspection_model', 'inspection');
        $this->load->model('hive_model', 'hive');
        $inspection = $this->inspection->get_inspection($id_inspection);
        $hive = $this->hive->get_hive($inspection->id_ruche);
        
        $page_data['hive'] = $hive;
        $page_data['inspection'] =$inspection;

        $page_data['page_name'] = 'inspection/editInspection';
        $page_data['script_name'] = 'inspection/script_editInspection';
        $page_data['page_active'] = 'inspection';
        $this->load->view('app/index', $page_data);
    }

    public function newInspection() {
        $this->load->model('hive_model', 'hive');
       // $page_data['ruches']  =  $this->hive->get_hivelist_with_apiary();
        
        
        $page_data['page_name'] = 'inspection/newInspection';
        $page_data['script_name'] = 'inspection/script_newInspection';
        $page_data['page_active'] = 'inspection';
        $this->load->view('app/index', $page_data);
    }

    public function create_inspection() {
        $this->load->model('inspection_model', 'inspection');
        $this->inspection->create_inspection();
        $data = array('success' => true);
        echo json_encode($data);
    }

    public function update_inspection() {
        $this->load->model('inspection_model', 'inspection');

        
        $this->inspection->update_inspection($this->input->post('id_inspection', TRUE));
        $data = array('success' => true);
        echo json_encode($data);
       // redirect('/inspection/inspectionList');
    }

    public function delete_inspection($id_inspection) {
        $this->load->model('inspection_model', 'inspection');
    $this->inspection->delete_inspection($id_inspection);
              $data = array('success' => true);
        echo json_encode($data);
    }

}
