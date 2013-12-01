<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        // Retrieving the users to output
        $results['users'] = $this->user_model->retrieveUsers();

        // Pass the data to the view to output the userlist
        $this->load->view('userlist', $results);
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
