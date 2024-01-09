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
    $this->db->query('INSERT INTO activity (user_id, title, activity_desc, act_datetime, category, location, organizer_name, skill_acquired, attachment, link_form) VALUES (:user_id, :title, :activity_desc, :act_datetime, :category, :location, :organizer_name, :skill_acquired, :attachment, :link_form)');

    // Bind values
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':activity_desc', $data['activity_desc']);
    $this->db->bind(':act_datetime', $data['act_datetime']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':location', $data['location']);
    $this->db->bind(':organizer_name', $data['organizer_name']);
    $this->db->bind(':skill_acquired', $data['skill_acquired']);
    $this->db->bind(':attachment', $data['attachment']);
    $this->db->bind(':link_form', $data['link_form']);

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
        $this->db->query('UPDATE activity SET title = :title, activity_desc = :activity_desc, category = :category, location = :location, organizer_name = :organizer_name, skill_acquired = :skill_acquired, attachment = :attachment WHERE activity_id = :activity_id');
    
        $this->db->bind(':activity_id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':activity_desc', $data['activity_desc']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':organizer_name', $data['organizer_name']);
        $this->db->bind(':skill_acquired', $data['skill_acquired']);
        $this->db->bind(':attachment', $data['attachment']);
    
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function deleteActivity($activity_id){
        $this->db->query('DELETE FROM activity WHERE activity_id = :activity_id');

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


} // Closing brace for the Activity class
?>

