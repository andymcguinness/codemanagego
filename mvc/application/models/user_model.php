<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();

        // Database fun
        $dsn = 'mysql://mm09k:d2mwr0p1@ispace-2013.cci.fsu.edu/mm09k_lis4368';
        $this->load->database($dsn);
    }

    public function createUser() {

        // Pulling the variables from the POST data
        $data = array(
            'usr_username' => $this->input->post('usr_username'),
            'usr_lastname' => $this->input->post('usr_lastname'),
            'usr_firstname' => $this->input->post('usr_firstname'),
            'usr_email' => $this->input->post('usr_email'),
            'usr_password' => $this->input->post('usr_password')
        );

        // Inserting the data
        $this->db->insert('user', $data);
    }

    public function retrieveUser($id) {

    }

    public function updateUser($id /* etc.*/) {

    }

    public function retrieveUsers() {
        $sql = 'SELECT * from user';
        $query = $this->db->query($sql);
        return $query->result();
    }
}