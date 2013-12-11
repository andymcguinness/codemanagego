<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Loading the file model for file handling
        $this->load->model('file_model');

        // Loading some useful extras
        $this->load->helper( array('html', 'url', 'form') );
    }


    public function file_upload() {
        $this->load->view('includes/header');

        $this->load->view('upload', array('error' => ''));

        $this->load->view('includes/footer');
    }
}

/* End of file files.php */
/* Location: ./application/controllers/files.php */
