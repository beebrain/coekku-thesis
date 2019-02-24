<?php
class userModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
   


    public function getUsername($data){
        // print_r($data);
        // $this->db->where('StudentID', $data['StudentID']);
        $this->db->where($data);
        return $this->db->get('student');

    }

}