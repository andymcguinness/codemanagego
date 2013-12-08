<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('project_model');

        // Loading some useful extras
        $this->load->helper( array('html', 'url', 'form') );
    }

    public function index() {
        $logged_in = $this->session->userdata('is_logged_in');

        if ($logged_in == false) {
            redirect('login');
        } else {
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');

            // Need to figure out how to handle this from the db side first
            //$this->load->view('projects-list');

            $this->load->view('includes/footer');
        }
    }

    public function project($slug) {
        $logged_in = $this->session->userdata('is_logged_in');

        if ($logged_in == false) {
            redirect('login');
        } else {


            $this->load->view('includes/header');
            $this->load->view('includes/sidebar');

            $project_info = $this->project_model->retrieveProject($slug);


            $this->load->view('includes/footer');
        }
    }


}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */
