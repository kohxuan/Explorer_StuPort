<?php
class Badge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // ... Existing methods ...

    // Method to get a student's badge based on activities joined
    public function getStudentBadge($user_id)
    {
        // Get the count of activities the student has joined
        $this->db->query('SELECT act_joined FROM badges WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();

        if ($row) {
            $activitiesJoined = $row->act_joined;

            // Determine the badge based on activities joined
            if ($activitiesJoined <= 10) {
                $badgeId = 1; // Bronze Badge
            } elseif ($activitiesJoined > 10 && $activitiesJoined <= 30) {
                $badgeId = 2; // Silver Badge
            } elseif ($activitiesJoined > 30 && $activitiesJoined <= 50) {
                $badgeId = 3; // Gold Badge
            } elseif ($activitiesJoined > 50) {
                $badgeId = 4; // Diamond Badge
            } else {
                $badgeId = null; // No badge
            }

            // Update the badge in the database
            $this->updateStudentBadge($user_id, $badgeId);

            return $badgeId;
        } else {
            // If no entry in 'badges' table, no badge assigned
            return null;
        }
    }
    
    // Method to update a student's badge
    private function updateStudentBadge($user_id, $badgeId)
    {
        $this->db->query('UPDATE badges SET reward_id = :reward_id WHERE user_id = :user_id');
        $this->db->bind(':reward_id', $badgeId);
        $this->db->bind(':user_id', $user_id);
    
        return $this->db->execute();
    }
    
    // Method to increment the activity count when a student joins a new activity
    public function incrementActivityCount($user_id)
    {
        // Check if the user already has a record in the 'badges' table
        $this->db->query('SELECT * FROM badges WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $row = $this->db->single();
    
        if ($row) {
            // Increment the activity count
            $newCount = $row->act_joined + 1;
            $this->db->query('UPDATE badges SET act_joined = :act_joined WHERE user_id = :user_id');
            $this->db->bind(':act_joined', $newCount);
            $this->db->bind(':user_id', $user_id);
    
            $this->db->execute();
        } else {
            // Create a new record if it doesn't exist
            $this->db->query('INSERT INTO badges (user_id, act_joined, reward_id) VALUES (:user_id, 1, NULL)');
            $this->db->bind(':user_id', $user_id);
    
            $this->db->execute();
        }
    
        // Update the badge based on the new activity count
        $this->getStudentBadge($user_id);
    }
    
    // ... Other existing methods ...
}
?>    
