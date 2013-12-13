<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('project_model');
        $this->load->model('list_model');
        $this->load->model('task_model');
        $this->load->model('file_model');
        $this->load->model('user_model');
        $this->load->model('assignment_model');

        // Loading some useful extras
        $this->load->helper( array('html', 'url', 'form') );    }

    public function add_tasks() {
        $logged_in = $this->session->userdata('is_logged_in');

        if ($logged_in == false) {
            redirect('login');
        } else {
            $this->load->library('form_validation');

            $this->load->view('includes/header');

            $this->form_validation->set_rules('tsk_name', 'Task Name', 'required');
            $this->form_validation->set_rules('tsk_content', 'Task Content', 'required');

            if($this->form_validation->run() == true) {
                $project_info = $this->project_model->retrieveProjectInfo($this->session->userdata('pjt_slug'));
                $list_info = $this->list_model->retrieveListByProject($project_info[0]["pjt_id"]);

                $data = array(
                    $list_info
                );

                $this->task_model->createTask($data);
                redirect('projects/project/' . $this->session->userdata('pjt_slug'));
            } elseif ($this->form_validation->run() == false) {
                if ($this->input->post()) {
                    $error = array ('error' => 'One or more of the required fields was missing. Please try again.');
                    $this->load->view('add-task', $error);
                } else {
                    $this->load->view('add-task');
                }
            }

            $this->load->view('includes/footer');
        }
    }

}

/* End of file tasks.php */
/* Location: ./application/controllers/tasks.php */