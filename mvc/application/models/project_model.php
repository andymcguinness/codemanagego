<?php

class Project_model extends CI_Model {

    function __construct() {
        parent::__construct();

        // Database fun
        $dsn = 'mysql://mm09k:d2mwr0p1@ispace-2013.cci.fsu.edu/mm09k_lis4368';
        $this->load->database($dsn);
    }

    public function retrieveProject($slug) {
        $sql = "SELECT * from project WHERE pjt_slug = '$slug';";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function retrieveProjects() {
        $sql = "SELECT * from project;";
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
            var_dump($row);
        }
    }

    public function retrieveProjectInfo() {

    }

}