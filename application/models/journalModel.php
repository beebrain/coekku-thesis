<?php
class journalModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
   
   
    public function saveJournal($data) {
        $this->db->insert('journal', $data);
        return $this->db->insert_id();
    }

    public function getInfo($data){
        $this->db->where($data);
        $this->db->order_by("ID desc");
        return $this->db->get('journal');

    }
    


}