<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');

        // Loading some useful extras
        $this->load->helper( array('html', 'url', 'form') );
    }

    public function index() {
        // Retrieving the users to output
        $results['users'] = $this->user_model->retrieveUsers();

        // Pass the data to the view to output the userlist
        $this->load->view('userlist', $results);
    }

    public function dashboard() {
        $logged_in = $this->session->userdata('is_logged_in');

        if ($logged_in == false) {
            redirect('login');
        } else {
            $this->load->view('includes/header');
            $this->load->view('includes/footer');
        }
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
