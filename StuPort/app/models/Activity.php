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
        $this->db->query('UPDATE activity SET title = :title, activity_desc = :activity_desc,  location = :location, 
        organizer_name = :organizer_name, skill_acquired = :skill_acquired WHERE activity_id = :activity_id');
    
        $this->db->bind(':activity_id', $data['activity_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':activity_desc', $data['activity_desc']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':organizer_name', $data['organizer_name']);
        $this->db->bind(':skill_acquired', $data['skill_acquired']);
    
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

   
    public function joinActivity($activity_id, $user_id)
    {
        // Your existing code to fetch user details
        $this->db->query('SELECT * FROM user WHERE id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
    
        $email = $row->email;
    
        // Fetch student profile based on email
        $this->db->query('SELECT * FROM student WHERE s_email = :email');
        $this->db->bind(':email', $email);
        $row2 = $this->db->single();
    
        $st_id = $row2->st_id;
        $st_fullname = $row2->st_fullname;
        $st_email = $row2->st_email;
        $st_gender = $row2->st_gender;
        $univ_code = $row2->univ_code;
        $st_address = $row2->st_address;
        $st_ic = $row2->st_ic;
    
        // Fetch the max participant_id for the given ac_id
        $this->db->query('SELECT COALESCE(MAX(participant_id), 0) AS max_participant_id FROM activity_participants WHERE ac_id = :ac_id');
        $this->db->bind(':ac_id', $ac_id);
        $row3 = $this->db->single();
        
        $max_participant_id = $row3->max_participant_id;
    
        // Increment the max_participant_id to get the new participant_id
        $participant_id = $max_participant_id + 1;
    
        // Insert the participant into the activity_participants table
        $this->db->query('INSERT INTO activity_participants (participant_id, ac_id, st_id, st_fullname, st_email, st_gender, univ_code, st_address, st_ic) VALUES (:participant_id, :ac_id, :st_id, :st_fullname, :st_email, :st_gender, :univ_code, :st_address, :st_ic)');
    
        $this->db->bind(':participant_id', $participant_id);
        $this->db->bind(':ac_id', $ac_id);
        $this->db->bind(':st_id', $st_id);
        $this->db->bind(':st_fullname', $st_fullname);
        $this->db->bind(':st_email', $st_email);
        $this->db->bind(':st_gender', $st_gender);
        $this->db->bind(':univ_code', $univ_code);
        $this->db->bind(':st_address', $st_address);
        $this->db->bind(':st_ic', $st_ic);
    
        return $this->db->execute();
    }
    
        public function isStudentJoined($user_id, $ac_id)
        {
            // Fetch user details
            $this->db->query('SELECT * FROM users WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            $row = $this->db->single();
        
            if (!$row) {
                // User not found, cannot be a student
                return false;
            }
        
            $email = $row->email;
        
            // Fetch student profile based on email
            $this->db->query('SELECT * FROM st_profile WHERE st_email = :email');
            $this->db->bind(':email', $email);
            $row2 = $this->db->single();
        
            // Check if the student profile exists
            if (!$row2) {
                // Student profile not found
                return false;
            }
        
            $st_id = $row2->st_id;
        
            // Check if the student is already a participant in the specified activity
            $this->db->query('SELECT * FROM activity_participants WHERE st_id = :st_id AND ac_id = :ac_id');
            $this->db->bind(':st_id', $st_id);
            $this->db->bind(':ac_id', $ac_id);
        
            return $this->db->single();
        }

} // Closing brace for the Activity class
?>

