<?php

class Apiary_model extends CI_Model {

    public $libelle;
    public $adresse;
    public $adresse_2;
    public $cp;
    public $ville;
    public $description;
    public $creation_date;
    public $id_user;
    public $id_rucher;
    public $nombre_ruches;
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        if (isset($_SESSION['id_user'])) {
            $this->id_user = $_SESSION['id_user'];
        } else {
            $this->id_user = "";
        }
    }

    public function get_list() {
        $this->db->select('*');
        $this->db->from("apiary");
        $this->db->where('id_user', $this->id_user);
        $this->db->order_by("creation_date", "asc");
        $query = $this->db->get();

        //   $query = $this->db->get_where('apiary', array('id_user' => $this->id_user), 1000);
        return $query->result();
    }

    public function get_apiary($id_rucher) {
        try {
            $query = $this->db->get_where('apiary', array('id_rucher' => $id_rucher));
        } catch (Exception $ex) {
            redirect('/apiary/apiaryList');
        }

        return $query->row();
    }

    public function create_first_apiary($id_user) {
        $this->libelle = "Mon Rucher";
        $this->adresse = "";
        $this->adresse_2 = "";
        $this->cp = "";
        $this->description = $this->input->post('description', TRUE);
        $this->creation_date = (new DateTime())->format('Y-m-d H:i:s');
        $this->nombre_ruches = 0;
        $this->id_user = $id_user;
        $this->db->insert('apiary', $this);
        return $this->db->insert_id();
    }

    public function create_apiary() {
        $this->libelle = $this->input->post('nom-rucher', TRUE);
        $this->adresse = $this->input->post('adresse-1', TRUE);
        $this->adresse_2 = $this->input->post('adresse-2', TRUE);
        $this->cp = $this->input->post('code-postal', TRUE);
        $this->ville = $this->input->post('commune', TRUE);
        $this->description = $this->input->post('description', TRUE);
        $this->creation_date = (new DateTime())->format('Y-m-d H:i:s');
        $this->nombre_ruches = 0;
        $this->id_user = $this->id_user;
        $this->db->insert('apiary', $this);
        return $this->db->insert_id();
    }

    public function update_apiary() {

        $this->libelle = $this->input->post('nom-rucher', TRUE);
        $this->adresse = $this->input->post('adresse-1', TRUE);
        $this->adresse_2 = $this->input->post('adresse-2', TRUE);
        $this->cp = $this->input->post('code-postal', TRUE);
        $this->ville = $this->input->post('commune', TRUE);
        $this->description = $this->input->post('description', TRUE);
        $id_rucher = $this->input->post('id-rucher', TRUE);
        $apiary = $this->get_apiary($id_rucher);
        $this->creation_date = $apiary->creation_date;
        $this->db->update('apiary', $this, array('id_rucher' => $id_rucher, 'id_user' => $this->id_user));
    }

    function delete_apiary($id_apiary) {

        $this->db->where('id_user', $this->id_user);
        $this->db->where('id_rucher', $id_apiary);
        $this->db->delete('apiary');

        //Supprime les ruches liées au rucher
        $this->db->query("DELETE FROM " . $this->db->dbprefix('beehive') . " WHERE id_user = '" . $this->id_user . "' AND id_beehive = '" . $id_apiary . "' ;");
        //Supprime les colonies liées au rucher
        $this->db->query("DELETE FROM " . $this->db->dbprefix('colony') . " WHERE id_user = '" . $this->id_user . "' AND id_beehive = '" . $id_apiary . "' ;");
    }

    function count_apiary() {
        $this->db->select('id_rucher');
        $this->db->from("apiary");
        $this->db->where('id_user', $this->id_user);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function select2_data_apiary() {
        $query = $this->db->query("SELECT id_rucher as id, libelle as text FROM " . $this->db->dbprefix('apiary') . " WHERE id_user = '" . $this->id_user . "';");

        return $query->result();
    }

}
