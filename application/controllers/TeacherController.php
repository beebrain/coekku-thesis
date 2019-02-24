<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TeacherController extends CI_Controller {

    public function __construct() {
        parent::__construct();
 if ($this->session->userdata('Teacher') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  
            redirect("/LoginController/LoginView");
        } else {
            $student_sess = $this->session->userdata('Teacher');
        }
    }

    public function index() {
        $this->showAllStudent();
    }

    public function changePassword() {
        $currentPassword = $this->input->post("currentPassword");
        $newpassword = $this->input->post("newpassword");
    }

    public function getDetailStudent($studentId = "") {
        if ($studentId == "") {
            $this->showAllStudent();
        } else {
            $this->load->model('StudentModel');
            $criteria['StudentID'] = $studentId;
            $result = $this->StudentModel->getStudent($criteria);
            $data_stu = $result->result()[0];

            // Information Student;
            $name = $data_stu->Name;
            $surname = $data_stu->Surname;
            $EntryYear = $data_stu->EntryYear;
            $semesterEntry = $data_stu->Semester;

            $criteria_S['Student_ID'] = $studentId;
            $query_result = $this->StudentModel->getInfoStudent($criteria_S);

            $this->load->model('journalModel');
            $semesterWork = $query_result->result();
            foreach ($query_result->result() as $row) {
                $indexjournal = $row->index_journal;
                $citeria_jour["index_journal"] = $indexjournal;
                $query_result_jour = $this->journalModel->getInfo($citeria_jour);
//                print_r($query_result_jour->result());
                $row->journal = $query_result_jour->result();
            }


            $data["student_id"] = $studentId;
            $data['name'] = $name;
            $data['surname'] = $surname;
            $data['EntryYear'] = $EntryYear;
            $data['semesterEntry'] = $semesterEntry;
            $data['semesterWork'] = $semesterWork;

            // Load Student Info
            $this->load->model('StudentModel');
            $citeria_student["StudentID"] = $studentId;
            $query_student = $this->StudentModel->getStudent($citeria_student);

            $data["infoStudent"] = $query_student->result();

            $criteria_sum['Student_ID'] = $studentId;
            $this->load->model('semesterWork');
            $query_return = $this->semesterWork->getSumCredit($criteria_sum);
            $info_semester = $query_return->result();
            $data['sumCredit'] = $info_semester[0];


            $semina_citeria["student_id"] = $studentId;
            $semina_citeria["semina"] = "Semina I";
            $query_semina11 = $this->semesterWork->getGradePassSemina($semina_citeria)->num_rows();

            $semina_citeria["semina"] = "Semina II";
            $query_semina12 = $this->semesterWork->getGradePassSemina($semina_citeria)->num_rows();


            $semina_citeria["semina"] = "Semina III";
            $query_semina13 = $this->semesterWork->getGradePassSemina($semina_citeria)->num_rows();

            $data['semina1'] = $query_semina11;
            $data['semina2'] = $query_semina12;
            $data['semina3'] = $query_semina13;


            $this->load->view('DetailStudent', $data);
        }
    }

    public function saveCredit() {
        $Student_Id = $this->input->post("Student_Id");
        $Year = $this->input->post("Year");
        $semester = $this->input->post("semester");
        $credit = $this->input->post("credit");
        $semina = $this->input->post("semina");

        $data['Student_ID'] = $Student_Id;
        $data['Year'] = $Year;
        $data['semester'] = $semester;
        $data['achived_credit'] = $credit;
        $data['semina_grade'] = $semina;

        $this->load->model('semesterWork');
        $insertStatus = $this->semesterWork->Updatecredit($data);
        
        if ($insertStatus) {
            $message['info'] = "ok";
        } else {
            $message['info'] = 'fail';
            
        }
//        $message['data'] = $this->db->last_query();
        echo json_encode($message);
    }
    
    
     public function approve() {

        $Student_Id = $this->input->post("Student_Id");
        $Year = $this->input->post("Year");
        $semester = $this->input->post("semester");
        $approve = $this->input->post("approve");

        $data['Student_ID'] = $Student_Id;
        $data['Year'] = $Year;
        $data['semester'] = $semester;
        $data['approve'] = $approve;

        $this->load->model('semesterWork');
        $insertStatus = $this->semesterWork->approveAdd($data);
        
        if ($insertStatus) {
            $message['info'] = "ok";
        } else {
            $message['info'] = 'fail';
            
        }
//        $message['data'] = $this->db->last_query();
        echo json_encode($message);
    }

    public function showAllStudent() {
        $this->load->model('StudentModel');
        $query_result = $this->StudentModel->getStudent();
        $data['student_data'] = $query_result;
        $this->load->view('ShowAllStudent', $data);
    }

}

?>