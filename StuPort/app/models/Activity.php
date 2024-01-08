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
        $this->db->query('INSERT INTO activity (title, activity_desc, act_datetime, user_id) VALUES (:title, :activity_desc, :act_datetime, :user_id)');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':activity_desc', $data['activity_desc']);
        $this->db->bind(':act_datetime', $data['act_datetime']);
    
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    public function findActivityById($activity_id)
    {
        $this->db->query('SELECT * FROM activity WHERE activity_id = :activity_id');
        $this->db->bind(':activity_id', $activity_id);

        $row = $this->db->single();

        return $row;
    }


    public function updateActivity($data)
    {
        $this->db->query('UPDATE activity SET title = :title, activity_desc = :activity_desc WHERE activity_id = :activity_id');

        $this->db->bind(':activity_id', $data['activity_id']);
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

