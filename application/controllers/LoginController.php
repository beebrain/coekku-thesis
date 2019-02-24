<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('Login');
    }

    public function login() {
        $username = $this->input->post("StudentID");
        $password = $this->input->post("password");
        $this->load->model('StudentModel');
        $data['StudentID'] = $username;
        $query = $this->StudentModel->getStudent($data);
        $firstUser = $query->result();

        if ($firstUser[0]->Password == md5($password)) {

            $userDetail = array(
                'StudentID' => $username,
            );
            $this->session->set_userdata($userDetail);
//echo "logined";
            redirect("UserController/index");
        } else {
            $data['info'] = 'login fail';
            $this->load->view('Login', $data);
        }
    }

    public function LoginTeacher() {
        $username = $this->input->post("Teacher");
        $password = $this->input->post("password");
        echo $username;
        echo $password;
        if ($username == "Teacher" && $password = "TeacherCOE") {
            $Teacher = array(
                'Teacher' => "HelloTeacher",
            );
            $this->session->set_userdata($Teacher);
            redirect("TeacherController/");
        } else {
            $this->LoginView();
        }
    }

    public function LoginView() {
        $this->load->view('LoginTeacher');
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}

?>