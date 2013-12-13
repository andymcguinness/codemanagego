<?php

class Task_model extends CI_Model {

    function __construct() {
        parent::__construct();

        // Database fun
        $dsn = 'mysql://mm09k:d2mwr0p1@ispace-2013.cci.fsu.edu/mm09k_lis4368';
        $this->load->database($dsn);
    }

    public function createTask($data) {

        $data = array(
            'tsk_name' => $this->input->post('tsk_name'),
            'tsk_created_date' => date("Y/m/d H:i:s"),
            'usr_id' => $this->session->userdata('usr_id'),
            'tsk_content' => $this->input->post('tsk_content'),
            'lst_id' => $data[0][0]["lst_id"],
            'tsk_is_complete' => 'n'
        );

        // Inserting the data
        $this->db->insert('task', $data);
    }

    public function retrieveTasksByUser($usr_id) {
        $sql = "SELECT * from task WHERE usr_id = '$usr_id';";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function retrieveTasksByList($list_id) {
        $sql = "SELECT * from task WHERE lst_id = '$list_id';";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}