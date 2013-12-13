<?php

class File_model extends CI_Model {

    function __construct() {
        parent::__construct();

        // Database fun
        $dsn = 'mysql://mm09k:d2mwr0p1@ispace-2013.cci.fsu.edu/mm09k_lis4368';
        $this->load->database($dsn);
    }

    public function createFile($upload) {

        // Putting the data together
        $data = array(
            'fil_title' => $upload["upload_data"]["file_name"],
            'fil_type'  => $upload["upload_data"]["file_type"],
            'fil_size'  => $upload["upload_data"]["file_size"],
            'fil_upload_time'   => date("Y/m/d H:i:s"),
            'usr_id'    => $this->session->userdata('usr_id'),
            'pjt_id'    => $this->session->userdata('pjt_id'),
            'fil_path'  => $upload["upload_data"]["full_path"]
        );

        // Inserting the data
        $this->db->insert('file', $data);
    }

    public function retrieveFilesByProject($pjt_id) {
        $sql = "SELECT * from file WHERE pjt_id = '$pjt_id';";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

}