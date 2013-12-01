<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Loading the user model for login/signup logic
        $this->load->model('user_model');
        $this->load->helper( array('html', 'url') );
    }

    public function index() {
        $this->load->view('includes/header-homepage');
        $this->load->view('homepage');
        $this->load->view('includes/footer');
    }

    public function signup() {
        // The signup form/logic will go here
        $this->load->view('includes/header-admin');
        $this->load->view('includes/footer');
    }

    public function login() {
        // The login form/logic will go here
        $this->load->view('includes/header-admin');
        $this->load->view('includes/footer');
    }

    public function logout() {
        // The logout logic
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */