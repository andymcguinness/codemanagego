<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('assignment_model');
        $this->load->model('project_model');
        $this->load->model('task_model');

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

            $user_info = $this->user_model->retrieveUserByUsername($this->session->userdata('username'));
            $projects = $this->assignment_model->getUserAssignments($user_info[0]["usr_id"]);

            $this->session->set_userdata('usr_id', $user_info[0]["usr_id"]);

            if ($projects == false) {
                $projects = '';
                $project_info = '';
            } else {
                foreach ($projects as $project) {
                    $project_info[] = $this->project_model->retrieveProject($project["pjt_id"]);
                }
            }

            $tasks[] = $this->task_model->retrieveTasksByUser($user_info[0]["usr_id"]);

            if ($tasks == false) {
                $tasks = '';
            }

            $data = array(
                'username'  => $this->session->userdata('username'),
                'project_info'  => $project_info,
                'tasks'     => $tasks
            );

            $this->load->view('dashboard', $data);
            $this->load->view('includes/footer');
        }
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
