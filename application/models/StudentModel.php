<?php

class StudentModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveInfo($data) {
        $this->db->insert('semesterwork', $data);
        return $this->db->insert_id();
    }

    public function saveJournal($data) {
        $this->db->insert('journal', $data);
        return $this->db->insert_id();
    }

    public function updateInfoStudent($data) {
        $this->db->where('StudentId', $data['studentId']);
        $this->db->update('student', $data);
        return true;
    }

    public function getInfoStudent($data) {
        $this->db->where($data);
        $this->db->order_by("Year desc, semester desc");
        return $this->db->get('semesterwork');
    }

    public function getStudent($data = "") {

        $this->db->select('*');
        if ($data <> "") {
            $this->db->where($data);
        }
        $this->db->order_by("StudentID desc");
        $query = $this->db->get('student');


        return $query;
    }

}
