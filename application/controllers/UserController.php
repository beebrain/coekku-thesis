<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('StudentID') == null) {
            // Prevent infinite loop by checking that this isn't the login controller  
            redirect("/LoginController");
        } else {
            $student_sess = $this->session->userdata('StudentID');
        }
    }

    public function index() {
        $this->getInfo();
    }

    public function loginPage() {
        $this->load->view('Login');
    }

    public function changePassword() {
        $currentPassword = md5($this->input->post("currentPass"));
        $newpassword = md5($this->input->post("newPass"));
        $student_sess = $this->session->userdata('StudentID');
        $this->load->model('StudentModel');
        $data['studentId'] = $student_sess;
        $query = $this->StudentModel->getStudent($data);
        $firstUser = $query->result();

        if ($firstUser[0]->Password == $currentPassword) {
            $data["Password"] = $newpassword;
            $this->StudentModel->updateInfoStudent($data);
            $message["info"] = "Password is changed";
            $message['status'] = "ok";
        }else{
            $message["info"] = "Incorrent Password";
            $message['status'] = "fail";
        }
//        $message["paa"] = $firstUser[0]->Password;
//        $message["cu"] = $currentPassword;
        echo json_encode($message);
    }

    public function login() {
        $username = $this->input->post("StudentID");
        $password = $this->input->post("password");
        $this->load->model('StudentModel');
        $data['StudentID'] = $username;
        $query = $this->StudentModel->getStudent($data);
        $firstUser = $query->result();

        if ($firstUser[0]->Password == $password) {

            $userDetail = array(
                'StudentID' => $username,
            );
            $this->session->set_userdata($userDetail);

            redirect("index.php/UserControl/index");
        } else {
            $data['info'] = 'login fail';
            $this->load->view('Login', $data);
        }
    }

    public function saveInformation() {
        $student_sess = $this->session->userdata('StudentID');

        $this->load->model('StudentModel');

        $name = $this->input->post("name");
        $surname = $this->input->post("surname");
        $avisor = $this->input->post("avisor");
        $thesisName = $this->input->post("thesisName");
        $entryYear = $this->input->post("admid");
        $semester = $this->input->post("semester");


        $data['studentId'] = $student_sess;
        $data['Advisor'] = $avisor;
        $data['ThesisTitle'] = $thesisName;
        $data['Name'] = $name;
        $data['Surname'] = $surname;
        $data['EntryYear'] = $entryYear;
        $data['Semester'] = $semester;


        $this->StudentModel->updateInfoStudent($data);
    }

    public function saveSemeter() {

        $student_sess = $this->session->userdata('StudentID');
        $current_Year = $this->input->post("year");
        $current_semester = $this->input->post("semester");

        $core_credit = $this->input->post("core_credit");
        $semina = $this->input->post("semina");


        $journalName1 = $this->input->post("journalName1");
        $typeJor1 = $this->input->post("typeJor1");
        $journalName2 = $this->input->post("journalName2");
        $typeJor2 = $this->input->post("typeJor2");
        $journalName3 = $this->input->post("journalName3");
        $typeJor3 = $this->input->post("typeJor3");
        $workload = $this->input->post("workload");
        // print($workload);
        // print($core_credit);


        $citeria['Student_ID'] = $student_sess;
        $citeria['core_credit'] = $core_credit;
        $citeria['semina'] = $semina;
        $citeria['workload'] = $workload;
        $citeria['Year'] = $current_Year;
        $citeria['semester'] = $current_semester;
        $semesterWork = $this->load->model('semesterWork');
        $insertStatus = $this->semesterWork->saveInfo($citeria);

        if ($insertStatus == TRUE) {
            $citeria_get['Student_ID'] = $student_sess;
            $citeria_get['Year'] = $current_Year;
            $citeria_get['semester'] = $current_semester;


            $query_result = $this->semesterWork->getSemesterInfo($citeria_get);
            $index_journal = $query_result->result();


            // print($index_journal[0]->index_journal);

            $journalModel = $this->load->model('journalModel');
            $citeria_journal['Student_ID'] = $student_sess;
            $citeria_journal['Year'] = $current_Year;
            $citeria_journal['semester'] = $current_semester;
            $citeria_journal['index_journal'] = $index_journal[0]->index_journal;

            if ($journalName1 != "" && $typeJor1 != "") {
                $citeria_journal['TitleName'] = $journalName1;
                $citeria_journal['TypeJournal'] = $typeJor1;
                $this->journalModel->saveJournal($citeria_journal);
            }

            if ($journalName2 != "" && $typeJor2 != "") {
                $citeria_journal['TitleName'] = $journalName2;
                $citeria_journal['TypeJournal'] = $typeJor2;
                $this->journalModel->saveJournal($citeria_journal);
            }

            if ($journalName3 != "" && $typeJor3 != "") {
                $citeria_journal['TitleName'] = $journalName3;
                $citeria_journal['TypeJournal'] = $typeJor3;
                $this->journalModel->saveJournal($citeria_journal);
            }
            // print($strJournal);
            $message["info"] = "ok";
        } else {

            $message["info"] = "DupKey";
        }


        echo json_encode($message);
    }

    public function getInfo() {
        $student_sess = $this->session->userdata('StudentID');

        $this->load->model('semesterWork');
        $citeria['Student_ID'] = $student_sess;


        $query_return = $this->semesterWork->getSemesterInfo($citeria);
        $info_semester = $query_return->result();


        $semina_citeria["student_id"] = $student_sess;
        $semina_citeria["semina"] = "Semina I";
        $query_semina11 = $this->semesterWork->getGradePassSemina($semina_citeria)->num_rows();

        $semina_citeria["semina"] = "Semina II";
        $query_semina12 = $this->semesterWork->getGradePassSemina($semina_citeria)->num_rows();


        $semina_citeria["semina"] = "Semina III";
        $query_semina13 = $this->semesterWork->getGradePassSemina($semina_citeria)->num_rows();



        $data['info_semester'] = $info_semester;
        $data['student_id'] = $student_sess;
        $data['semina1'] = $query_semina11;
        $data['semina2'] = $query_semina12;
        $data['semina3'] = $query_semina13;




        $query_return = $this->semesterWork->getSumCredit($citeria);
        $info_semester = $query_return->result();
        $data['sumCredit'] = $info_semester[0];

        // Load Student Info
        $this->load->model('StudentModel');
        $citeria_student["StudentID"] = $student_sess;
        $query_student = $this->StudentModel->getStudent($citeria_student);

        $data["infoStudent"] = $query_student->result();


        // Load Credit achived

        $this->load->view('Member_zone', $data);
    }

    public function changePass() {

        $this->getInfo();
    }

    public function getdetailInfo() {
        $student_id = $this->input->get("student_ID");
        $year = $this->input->get("year");
        $semester = $this->input->get("semester");

        $this->load->model('semesterWork');

        $citeria["student_id"] = $student_id;
        $citeria["year"] = $year;
        $citeria["semester"] = $semester;


        $query_result = $this->semesterWork->getSemesterInfo($citeria);
        $infoResult = $query_result->result()[0];




        // print_r($infoResult->index_journal);
        $strJournal = "";
        if ($infoResult->index_journal <> "") {
            $journalModel = $this->load->model('journalModel');

            $citeria_journal['index_journal'] = $infoResult->index_journal;
            $result = $this->journalModel->getInfo($citeria_journal);
            $i = 1;
            foreach ($result->result() as $row) {
                $strJournal .= "<dd>" . $i++ . ". " . $row->TitleName . "[" . $row->TypeJournal . "]</dd>";
            }
        } else {
            $strJournal .= "<dd> - </dd>";
        }
        // print($strJournal);
        $message["journal"] = $strJournal;
        $message["workload"] = $infoResult->workload;
        $message["core_credit"] = $infoResult->core_credit;
        $message["semina"] = $infoResult->semina;
        $message["semina_grade"] = $infoResult->semina_grade;
        $message['year'] = $year;
        $message["semester"] = $semester;
        $message["info"] = "ok";
        echo json_encode($message);
    }

    public function deleteWorkLoad() {
        $student_id = $this->input->post("student_ID");
        $year = $this->input->post("year");
        $semester = $this->input->post("semester");

        $this->load->model('semesterWork');

        $data['Student_ID'] = $student_id;
        $data['Year'] = $year;
        $data['semester'] = $semester;
        $this->semesterWork->deleteWorkLoad($data);
//        $message = $this->db->last_query();
//        echo $message;
//        $message["data"] = "sss";
//        echo json_encode($data);
    }

}

?>