<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('project_model');
        $this->load->model('list_model');
        $this->load->model('task_model');
        $this->load->model('file_model');
        $this->load->model('user_model');
        $this->load->model('assignment_model');

        // Loading some useful extras
        $this->load->helper( array('html', 'url', 'form') );
    }

    public function project($slug) {
        $logged_in = $this->session->userdata('is_logged_in');

        if ($logged_in == false) {
            redirect('login');
        } else {

            $this->load->view('includes/header');

            $project_info = $this->project_model->retrieveProjectInfo($slug);

            if ($project_info == false) {
                show_404('project');
            } else {
                $list_info = $this->list_model->retrieveListByProject($project_info[0]["pjt_id"]);

                if ($list_info == false) {
                    $list_info = "";
                }

                $tasks[] = $this->task_model->retrieveTasksByList($list_info[0]["lst_id"]);

                if ($tasks == false) {
                    $tasks[] = "";
                }

                $files[] = $this->file_model->retrieveFilesByProject($project_info[0]["pjt_id"]);

                if ($files == false) {
                    $files[] = "";
                }

                $manager[] = $this->user_model->retrieveUser($project_info[0]["usr_id"]);

                $members[] = $this->assignment_model->getProjectMembers($project_info[0]["pjt_id"]);

                if ($members == false) {
                    $member_info = "";
                } else {
                    foreach($members[0] as $member) {
                        $member_info[] = $this->user_model->retrieveUser($member["usr_id"]);
                    }
                }

            }

            $this->session->set_userdata('pjt_id', $project_info[0]["pjt_id"]);
            $this->session->set_userdata('pjt_slug', $project_info[0]["pjt_slug"]);

            $data = array( // Putting it all together now
                'project_info' => $project_info,
                'list_info' => $list_info,
                'tasks' => $tasks,
                'files' => $files,
                'manager' => $manager,
                'members' => $member_info
            );

            $this->load->view('project_info', $data);

            $this->load->view('includes/footer');
        }
    }


}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */
