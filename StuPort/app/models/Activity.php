<?php
class Activity
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function manageAllActivities()
    {
        $this->db->query('SELECT * FROM activity');

        $result = $this->db->resultSet();

        return $result;
    }

    public function addActivity($data)
    {
        $this->db->query('INSERT INTO activity (title, activity_desc , user_id) VALUES (:title, :activity_desc, :user_id)');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':activity_desc', $data['activity_desc']);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
} // Closing brace for the Activity class
?>
