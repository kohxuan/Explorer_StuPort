<?php

class Registration{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function manageAllRegistrations(){
        $this->db->query('SELECT * FROM registration');

        $results = $this->db->resultSet();

        return $results;
    }
}

?>