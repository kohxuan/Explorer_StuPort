<?php
class Activity{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function manageAllActivities(){
        $this->db->query('SELECT * FROM activity');

        $result = $this->db->resultSet();

        return $result;
    }
}
?>
