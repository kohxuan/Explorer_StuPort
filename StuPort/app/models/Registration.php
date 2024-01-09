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

    public function addRegistration($data) {
        $this->db->query('INSERT INTO registration (activity_id, link, user_id) VALUES (:activity_id, :link, :user_id)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':link', $data['link']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findRegistrationById($activity_id) {
        $this->db->query('SELECT * FROM registration WHERE activity_id = :activity_id');
        $this->db->bind(':activity_id', $activity_id);
        $row = $this->db->single();
        return $row;
    }

    public function updateRegistration($id, $data) {
        $this->db->query('UPDATE registration SET link = :link, status = :status WHERE activity_id = :activity_id');
        // Bind values
        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':link', $data['link']);
        $this->db->bind(':status', $data['status']);
    
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function deleteRegistration($activity_id) {
        $this->db->query('DELETE FROM registration WHERE activity_id = :activity_id');
        $this->db->bind(':activity_id', $activity_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
