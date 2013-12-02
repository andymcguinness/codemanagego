<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Loading the user model for login/signup logic
        $this->load->model('user_model');

        // Loading some useful extras
        $this->load->helper( array('html', 'url', 'form') );
    }

    public function index() {
        $this->load->view('includes/header-homepage');
        $this->load->view('homepage');
        $this->load->view('includes/footer');
    }

    public function signup() {
        // Loading the form handling/validation library
        $this->load->library('form_validation');

        $this->load->view('includes/header-admin');

        // Setting the validation rules
        $this->form_validation->set_rules('usr_firstname', 'First Name', 'callback_name_check');
        $this->form_validation->set_rules('usr_lastname', 'Last Name', 'callback_name_check');
        $this->form_validation->set_rules('usr_username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('usr_password', 'Password', 'callback_password_check');
        $this->form_validation->set_rules('usr_email', 'Email', 'callback_email_check');

        // Testing for any form validation, displaying page content based on that
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup');
        }
        else {
            $this->load->view('formsuccess');
            $this->user_model->createUser();
        }

        $this->load->view('includes/footer');
    }

    /*** BEGIN SIGNUP CALLBACKS ***/

    public function name_check($str) {

        /*** ALLOWED CHARACTERS ***/
        $modifiedStr = strtolower($str);

        $allowed = "abcdefghijklmnopqrstuvwxyz1234567890- '@.";

        for($i = 0; $i < strlen($modifiedStr); $i++) {

            $character = $modifiedStr{$i};
            $isValid = (strpos($allowed, $character) !== false);

            if ($isValid === false) {
                $this->form_validation->set_message('name_check', 'The %s contains invalid characters. Please try again.');
                return false;
            }
        }

        /*** MAX LENGTH ***/
        if ( (strlen($str) < 75) == false) {
            $this->form_validation->set_message('name_check', 'The %s is too long. Please try again.');
            return false;
        }

        /*** MIN LENGTH ***/
        if ( (strlen($str) > 2) == false) {
            $this->form_validation->set_message('name_check', 'The %s is too short. Please try again.');
            return false;
        }

        return true;
    }

    public function username_check($str) {

        /*** ALLOWED CHARACTERS ***/
        $modifiedStr = strtolower($str);

        $allowed = "abcdefghijklmnopqrstuvwxyz1234567890- '@.";

        for($i = 0; $i < strlen($modifiedStr); $i++) {

            $character = $modifiedStr{$i};
            $isValid = (strpos($allowed, $character) !== false);

            if ($isValid === false) {
                $this->form_validation->set_message('username_check', 'The %s contains invalid characters. Please try again.');
                return false;
            }
        }

        /*** MAX LENGTH ***/
        if ( (strlen($str) < 151) == false) {
            $this->form_validation->set_message('username_check', 'The %s is too long. Please try again.');
            return false;
        }

        /*** MIN LENGTH ***/
        if ( (strlen($str) > 2) == false) {
            $this->form_validation->set_message('username_check', 'The %s is too short. Please try again.');
            return false;
        }

        return true;
    }

    public function password_check($str) {

        /*** ALLOWED CHARACTERS ***/
        $modifiedStr = strtolower($str);

        $allowed = "abcdefghijklmnopqrstuvwxyz1234567890- '@.";

        for($i = 0; $i < strlen($modifiedStr); $i++) {

            $character = $modifiedStr{$i};
            $isValid = (strpos($allowed, $character) !== false);

            if ($isValid === false) {
                $this->form_validation->set_message('password_check', 'The %s contains invalid characters. Please try again.');
                return false;
            }
        }

        /*** MAX LENGTH ***/
        if ( (strlen($str) < 50) == false) {
            $this->form_validation->set_message('password_check', 'The %s is too long. Please try again.');
            return false;
        }

        /*** MIN LENGTH ***/
        if ( (strlen($str) > 8) == false) {
            $this->form_validation->set_message('password_check', 'The %s is too short. Please try again.');
            return false;
        }

        return true;
    }

    public function email_check($str) {

        /*** ALLOWED CHARACTERS ***/
        $modifiedStr = strtolower($str);

        $allowed = "abcdefghijklmnopqrstuvwxyz1234567890- '@.";

        for($i = 0; $i < strlen($modifiedStr); $i++) {

            $character = $modifiedStr{$i};
            $isValid = (strpos($allowed, $character) !== false);

            if ($isValid === false) {
                $this->form_validation->set_message('email_check', 'The %s contains invalid characters. Please try again.');
                return false;
            }
        }

        /*** MAX LENGTH ***/
        if ( (strlen($str) < 91) == false) {
            $this->form_validation->set_message('email_check', 'The %s is too long. Please try again.');
            return false;
        }

        /*** MIN LENGTH ***/
        if ( (strlen($str) > 8) == false) {
            $this->form_validation->set_message('email_check', 'The %s is too short. Please try again.');
            return false;
        }

        return true;
    }

    /*** END SIGNUP CALLBACKS ***/

    public function login() {
        $logged_in = $this->session->userdata('is_logged_in');

        if ($logged_in == false) {

            $this->load->view('includes/header-admin');

            if ($this->input->post()) {

                $username = $this->input->post('usr_username');
                $password = $this->input->post('usr_password');

                $result = $this->user_model->checkCredentials($username, $password);

                if ($result) {
                    $this->session->set_userdata('is_logged_in', 'true');
                    $this->load->view('formsuccess');
                } else {
                    $data = array(
                        'error' => 'Username or password entered incorrectly. Please try again.'
                    );
                    $this->load->view('login', $data);
                }
            }
            else {
                $this->load->view('login');
            }

            $this->load->view('includes/footer');
        } else{
            redirect('dashboard');
        }
    }

    public function logout() {
        // The logout logic
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */