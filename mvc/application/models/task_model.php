<?php

class Task_model extends CI_Model {

    function __construct() {
        parent::__construct();

        // Database fun
        $dsn = 'mysql://mm09k:d2mwr0p1@ispace-2013.cci.fsu.edu/mm09k_lis4368';
        $this->load->database($dsn);
    }

    public function createTask() {

        // Pulling the variables from the POST data
        $data = array(

        );

        // Inserting the data
        $this->db->insert('task', $data);
    }

    public function retrieveTask($name) {

    }

    public function updateTask($name /* etc.*/) {

    }

}