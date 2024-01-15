<?php

class PerActivities
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function findAllperActivity() {
        $this->db->query('SELECT * FROM per_activity ORDER BY date ASC');
        $result = $this->db->resultSet();

        return $result;
    }

    public function findperActivityById($id)
    {
        $this->db->query('SELECT * FROM per_activity WHERE pac_id = :pac_id');
        $this->db->bind(':pac_id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateperActivity($data)
{
    $this->db->query('UPDATE per_activity SET name = :name, venue = :venue, date = :date , `description` = :description WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $data['pac_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':venue', $data['venue']);
    $this->db->bind(':date', $data['date']);
    $this->db->bind(':description', $data['description']);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

    

public function addperActivity($data)
{
    $this->db->query('INSERT INTO per_activity (s_id, name, date, venue, description, status, evidence) VALUES (:s_id, :name, :date, :venue, :description, "Waiting", :evidence)');

    // Bind values
    $this->db->bind(':s_id', $data['s_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':date', $data['date']);
    $this->db->bind(':venue', $data['venue']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':evidence', $data['evidence']);

    // Execute the query
    return $this->db->execute();
}

    public function deleteperActivity($pac_id){
        $this->db->query('DELETE FROM per_activity WHERE pac_id = :pac_id');

        $this->db->bind(':pac_id', $pac_id);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    // In perActivities model
public function findApprovedPerActivities($s_id)
{
    $this->db->query('SELECT * FROM per_activity WHERE s_id = :s_id AND status = "Approved"');
    $this->db->bind(':s_id', $s_id);

    $result = $this->db->resultSet();

    return $result;
}

public function assignperActivity($data)
{
    $this->db->query('UPDATE per_activity SET l_id = :l_id WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $data['pac_id']);
    $this->db->bind(':l_id', $data['l_id']);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}


public function lecturerList()
{
    $this->db->query('SELECT * FROM lecturer');
    $result = $this->db->resultSet();

    return $result;
}

public function findperActivityByLecturer($l_id)
{
    $this->db->query('SELECT * FROM per_activity WHERE l_id = :l_id AND status = "Waiting"');
    $this->db->bind(':l_id', $l_id);

    $result = $this->db->resultSet();

   
    return $result;
}


public function WaitAllperActivity($s_id)
{
    $this->db->query('SELECT * FROM per_activity WHERE s_id = :s_id AND status = "Waiting" ORDER BY date ASC');
    $this->db->bind(':s_id', $s_id);

    $result = $this->db->resultSet();

    return $result;
}

public function setApprove($pac_id)
{
    $this->db->query('UPDATE per_activity SET status = "Approved" WHERE pac_id = :pac_id');

    $this->db->bind(':pac_id', $pac_id);

    // Execute the query and handle the result (if needed)
    $this->db->execute();
}

public function getStudentFullName($s_id)
{
    $this->db->query('SELECT s_fName FROM student WHERE s_id = :s_id');
    $this->db->bind(':s_id', $s_id);

    $row = $this->db->single();

    return $row ? $row->st_fullname : ''; // Return the full name if it exists, otherwise an empty string
}

public function getLecturerFullName($l_id)
{
    $this->db->query('SELECT l_fName FROM lecturer WHERE l_id = :l_id');
    $this->db->bind(':l_id', $l_id);

    $row = $this->db->single();

    return $row ? $row->l_fName: ''; // Return the full name if it exists, otherwise an empty string
}


}
?>
