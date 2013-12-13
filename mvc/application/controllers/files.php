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
        $this->load->view('file_upload', array('error' => ''));
        $this->load->view('includes/footer');
    }

    function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|svg|php|js|css|html';
        $config['max_size']	= '100000000';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $data = array('error' => $this->upload->display_errors());

            $this->load->view('includes/header');
            $this->load->view('file_upload', $data);
            $this->load->view('includes/footer');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->file_model->createFile($data);

            $this->load->view('includes/header');
            $this->load->view('upload_success', $data);
            $this->load->view('includes/footer');
        }
    }
}

/* End of file files.php */
/* Location: ./application/controllers/files.php */
