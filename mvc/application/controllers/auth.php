<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        // Loads the homepage
    }

    public function signup() {
        // The signup form/logic will go here
    }

    public function login() {
        // The login form/logic will go here
    }

    public function logout() {
        // The logout logic
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */