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
        $this->db->query('INSERT INTO activity (user_id, title, activity_desc, act_datetime, category, location, organizer_name, skill_acquired, attachment) 
                         VALUES (:user_id, :title, :activity_desc, :act_datetime, :category, :location, :organizer_name, :skill_acquired, :attachment)');
    
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
        organizer_name = :organizer_name, skill_acquired = :skill_acquired WHERE activity_id = :activity_id;
        UPDATE feedbacks SET title = :title WHERE activity_id = :activity_id');
    
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

   
    
    public function registerActivity($activity_id, $user_id)
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

        $s_id = $row2->s_id;
        $s_fName = $row2->s_fName;
        $s_email = $row2->s_email;
        $s_gender = $row2->s_gender;
        $s_institution = $row2->s_institution;
        $s_address = $row2->s_address;
      

        
    
        // Fetch the max participant_id for the given ac_id
        $this->db->query('SELECT COALESCE(MAX(participant_id), 0) AS max_participant_id FROM activity_participant WHERE activity_id = :activity_id');
        $this->db->bind(':activity_id', $activity_id);
        $row3 = $this->db->single();
        
        $max_participant_id = $row3->max_participant_id;
    
        // Increment the max_participant_id to get the new participant_id
        $participant_id = $max_participant_id + 1;
    
        // Insert the participant into the activity_participants table
        $this->db->query('INSERT INTO activity_participant ( activity_id, s_id, s_fName, s_email, s_gender, s_institution, s_address) VALUES ( :activity_id, :s_id, :s_fName, :s_email, :s_gender, :s_institution, :s_address)');
    
       
        $this->db->bind(':activity_id', $activity_id);
        $this->db->bind(':s_id', $s_id);
        $this->db->bind(':s_fName', $s_fName);
        $this->db->bind(':s_email', $s_email);
        $this->db->bind(':s_gender', $s_gender);
        $this->db->bind(':s_institution', $s_institution);
        $this->db->bind(':s_address', $s_address);
      
        return $this->db->execute();
    }
    
       

        public function getRegisteredActivities($user_id)
        {
            // Fetch student profile based on user_id
            $this->db->query('SELECT * FROM user WHERE id = :user_id');
            $this->db->bind(':user_id', $user_id);
            $row = $this->db->single();
        
            if (!$row) {
                // User not found, cannot be a student
                return false;
            }
        
            $email = $row->email;
        
            // Fetch student profile based on email
            $this->db->query('SELECT * FROM student WHERE s_email = :email');
            $this->db->bind(':email', $email);
            $row2 = $this->db->single();
        
            // Check if the student profile exists
            if (!$row2) {
                // Student profile not found
                return false;
            }
        
            $s_id = $row2->s_id;
        
            // Fetch the activities that the student has registered
            $this->db->query('SELECT * FROM activity_participant WHERE s_id = :s_id');
            $this->db->bind(':s_id', $s_id);
            $rows = $this->db->resultSet();
        
            if (!$rows) {
                // No activities found
                return false;
            }
        
            $registeredActivities = [];
        
            foreach ($rows as $row) {
                // Fetch activity details for each ac_id
                $this->db->query('SELECT * FROM activity WHERE activity_id = :activity_id');
                $this->db->bind(':activity_id', $row->activity_id);
                $activityDetails = $this->db->single();
        
                if ($activityDetails) {
                    // Add activity details to the result array
                    $registeredActivities[] = $activityDetails;
                }
            }
        
            return $registeredActivities;
        }


        
        public function findAllActivityOrganizer($user_id) {
            $this->db->query('SELECT * FROM activity WHERE uploader_id = :uploader_id');
            $this->db->bind(':uploader_id', $user_id);
            
            // Execute the query and fetch results, return them as needed
            return $this->db->resultSet();
        }
        
         public function isActivityEnd($ac_id, $activity_id) {
            $currentDate = date('Y-m-d');
        
            return $currentDate > $activityend;
         }




         public function isStudentRegistered($user_id, $activity_id)
    {
        // Fetch user details
        $this->db->query('SELECT * FROM user WHERE id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
    
        if (!$row) {
            // User not found, cannot be a student
            return false;
        }
    
        $email = $row->email;
    
        // Fetch student profile based on email
        $this->db->query('SELECT * FROM student WHERE s_email = :email');
        $this->db->bind(':email', $email);
        $row2 = $this->db->single();
    
        // Check if the student profile exists
        if (!$row2) {
            // Student profile not found
            return false;
        }
    
        $s_id = $row2->s_id;
    
        // Check if the student is already a participant in the specified activity
        $this->db->query('SELECT * FROM activity_participant WHERE s_id = :s_id AND activity_id = :activity_id');
        $this->db->bind(':s_id', $s_id);
        $this->db->bind(':activity_id', $activity_id);
    
        return $this->db->single();
    }



 public function getParticipantID($ac_id, $user_id) {
    // Fetch user details
    $this->db->query('SELECT * FROM user WHERE id = :user_id');
    $this->db->bind(':user_id', $user_id);
    $row = $this->db->single();

    if (!$row) {
        // User not found, cannot be a student
        return false;
    }

    $email = $row->email;

    // Fetch student profile based on email
    $this->db->query('SELECT * FROM student WHERE s_email = :email');
    $this->db->bind(':email', $email);
    $row2 = $this->db->single();

    // Check if the student profile exists
    if (!$row2) {
        // Student profile not found
        return false;
    }

    $st_id = $row2->st_id;

    // Fetch the participant_id for the given ac_id and st_id
    $this->db->query('SELECT participant_id FROM activity_participants WHERE activity_id = :activity_id AND s_id = :s_id');
    $this->db->bind(':activity_id', $activity_id);
    $this->db->bind(':s_id', $s_id);
    $row3 = $this->db->single();

    if ($row3) {
        // Check if the query was successful before accessing the result
        return $row3->participant_id;
    } else {
        // Query failed
        return false;
    }
}


public function getStudentID($user_id) {
    // Fetch user details
    $this->db->query('SELECT * FROM user WHERE id = :user_id');
    $this->db->bind(':user_id', $user_id);
    $row = $this->db->single();

    if (!$row) {
        // User not found, cannot be a student
        return false;
    }

    $email = $row->email;

    // Fetch student profile based on email
    $this->db->query('SELECT * FROM student WHERE s_email = :email');
    $this->db->bind(':email', $email);
    $row2 = $this->db->single();

    // Check if the student profile exists
    if (!$row2) {
        // Student profile not found
        return false;
    }

    $s_id = $row2->s_id;

    return $s_id;
}

public function getLecturerID($user_id) {
    // Fetch user details
    $this->db->query('SELECT * FROM user WHERE id = :user_id');
    $this->db->bind(':user_id', $user_id);
    $user = $this->db->single();

    // Check if user exists
    if (!$user) {
        return false;
    }

    $email = $user->email;

    // Fetch lecturer profile based on email
    $this->db->query('SELECT * FROM lecturer WHERE l_email = :email');
    $this->db->bind(':email', $email);
    $lecturerProfile = $this->db->single();

    // Check if the lecturer profile exists
    if (!$lecturerProfile) {
        return false;
    }

    return $lecturerProfile->l_id;
}
           

} // Closing brace for the Activity class
?>

