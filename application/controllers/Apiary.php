
<?php

class Apiary extends CI_Controller {

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
    public function apiaryList() {

        $this->load->model('apiary_model', 'apiary');

        $page_data["list_apiary"] = $this->apiary->get_list();

        $page_data['page_name'] = 'apiary/apiaryList';
        $page_data['script_name'] = 'apiary/script_apiaryList';
        $page_data['page_active'] = 'apiary';
        $this->load->view('app/index', $page_data);
    }

    public function editApiary($id_apiary) {


        $this->load->model('apiary_model', 'apiary');
        $page_data['apiary'] = $this->apiary->get_apiary($id_apiary);

        $page_data['page_name'] = 'apiary/editApiary';
        $page_data['script_name'] = 'apiary/script_editApiary';
        $page_data['page_active'] = 'apiary';
        $this->load->view('app/index', $page_data);
    }

    public function newApiary() {

        $this->load->model('apiary_model', 'apiary');


        $page_data['page_name'] = 'apiary/newApiary';
        $page_data['script_name'] = 'apiary/script_newApiary';
        $page_data['page_active'] = 'apiary';

        //Test abonnement
        if ($this->apiary->count_apiary() >= 2) {
            redirect('/subscription/index');
        }
        $this->load->view('app/index', $page_data);
    }

    public function create_apiary() {
        $this->load->model('apiary_model', 'apiary');
        $this->apiary->create_apiary();
        redirect('/apiary/apiaryList');
    }

    public function update_apiary() {
        $this->load->model('apiary_model', 'apiary');
        $this->apiary->update_apiary();
        redirect('/apiary/apiaryList');
    }

    public function delete_apiary($id_apiary) {
        $this->load->model('apiary_model', 'apiary');

        header('Content-type: application/json');


        if ($this->apiary->count_apiary() == 0) {
            $data = array('success' => false, 'msg' => 'Vous devez avoir au moins 1 rucher');
        } else {
            $this->apiary->delete_apiary($id_apiary);
            $data = array('success' => true);
        }


        echo json_encode($data);
        // redirect('/apiary/apiaryList');
    }

    public function get_source_apiary() {

        $this->load->model('apiary_model', 'apiary');
        header('Content-type: application/json');
        $data = $this->apiary->select2_data_apiary();
        echo json_encode($data);
    }

}
