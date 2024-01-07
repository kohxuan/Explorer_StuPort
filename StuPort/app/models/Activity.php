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

public function addActivity($data)
{
    $this->db->query('INSERT INTO activity ( title, description, user_id) VALUES ( :title, :body, :user_id,)');
    
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);

    if ($this->db->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
?>
