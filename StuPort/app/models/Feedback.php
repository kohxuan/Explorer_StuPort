<?php

class Feedback [
    private $db;

    public function __construct(){
        $this->db new Database;
    }

    public function manageAllFeedbacks(){
        $this->db->query(SELECT * FROM 'feedback');

        $results=$this->db->resultSet();

        return $results;
    }
]
?>