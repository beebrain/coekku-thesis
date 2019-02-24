<?php

class semesterWork extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function saveInfo($data) {

        $checkDup["year"] = $data["Year"];
        $checkDup["semester"] = $data["semester"];
        $checkDup["Student_ID"] = $data["Student_ID"];

        $this->db->where($checkDup);

        $query = $this->db->get('semesterwork');

        $count_row = $query->num_rows();

        if ($count_row == 0) {
            $insert = $this->db->insert('semesterwork', $data);
            return TRUE; // And here false to TRUE
        }

        return FALSE;
    }

    public function Updatecredit($data) {
        $wherecase = array('Student_ID' => $data['Student_ID'], 'Year' => $data['Year'], 'semester' => $data['semester']);
        $this->db->where($wherecase);
        $this->db->update('semesterwork', $data);
        return true;
    }

    public function approveAdd($data) {
        $wherecase = array('Student_ID' => $data['Student_ID'], 'Year' => $data['Year'], 'semester' => $data['semester']);
        $this->db->where($wherecase);
        $this->db->update('semesterwork', $data);
        return true;
    }

    public function getSemesterInfo($data) {
        $this->db->where($data);
        $this->db->order_by("year desc,semester desc");
        return $this->db->get('semesterwork');
    }

    public function getSumCredit($data) {
        $this->db->where($data);
        $this->db->select_sum('achived_credit');
        return $query = $this->db->get('semesterwork');
    }

    public function getGradePassSemina($data) {
        $data["semina_grade"] = "Passed";
        $this->db->where($data);
        return $query = $this->db->get('semesterwork');
    }

    public function deleteWorkLoad($data) {
        $this->db->where($data);
        $this->db->delete('semesterwork');
        return true;
    }

}
