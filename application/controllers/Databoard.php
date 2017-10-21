
<?php

class Databoard extends CI_Controller {

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
// on charge la view qui contient le corps de la page
        $this->load->model('Stats_model', 'stats');


        $page_data["nb_ruche_vide"] = $this->stats->nb_ruche_vide();
        $page_data["nb_ruche_pleine"] = $this->stats->nb_ruche_pleine();
        $page_data["nb_rucher"] = $this->stats->count_apiary();



        $page_data["nb_ruche_excellent"] = $this->stats->nb_ruche_etat_excellent();
        $page_data["nb_ruche_bon"] = $this->stats->nb_ruche_etat_bon();
        $page_data["nb_ruche_moyen"] = $this->stats->nb_ruche_etat_moyen();
        $page_data["nb_ruche_mauvais"] = $this->stats->nb_ruche_etat_excellent();

        $page_data['page_name'] = 'databoard/index';
        $page_data['script_name'] = 'databoard/_script';
        $page_data['page_active'] = 'databoard';



// on charge la page dans le template

        $this->load->view('app/index', $page_data);
    }

}
