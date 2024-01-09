<?php 
 
 class Registration {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function manageAllRegistrations() {
        $this->db->query('SELECT * FROM registration');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addRegistration($data)
    {
        $this->db->query('INSERT INTO registration (activity_id,link,user_id) VALUES (:activity_id, :link, :user_id');
        
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':link', $data['link']);
        

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function findRegistrationById($activity_id)
    {
        $this->db->query('SELECT * FROM registration WHERE activity_id = :activity_id');
        $this->db->bind(':activity_id', $activity_id);

        $row = $this->db->single();

        return $row;
    }

    public function updateRegistration($data)
    {
        $this->db->query('UPDATE registrations SET activity_id = :activity_id, link = :link WHERE user_id = :user_id');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':link', $data['link']);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteRegistration($activity_id){
        $this->db->query('DELETE FROM registrations WHERE activity_id = :activity_id');

        $this->db->bind(':activity_id', $activity_id);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }


 }



?>