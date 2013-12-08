<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('project_model');
        $this->load->model('list_model');
        $this->load->model('task_model');

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

            $project_info = $this->project_model->retrieveProjectInfo($slug);

            if ($project_info == false) {
                show_404('project');
            } else {
                $list_info = $this->list_model->retrieveListByProject($project_info[0]["pjt_id"]);
                $tasks[] = $this->task_model->retrieveTasksByList($list_info[0]["lst_id"]);
            }

            $data = array( // Putting it all together now
                'project_info' => $project_info,
                'list_info' => $list_info,
                'tasks' => $tasks
            );

            $this->load->view('project_info', $data);

            $this->load->view('includes/footer');
        }
    }


}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */
