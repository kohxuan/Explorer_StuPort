<?php


class Reward
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllRewards()
    {
        $this->db->query('SELECT * FROM reward');
        $result = $this->db->resultSet();
        return $result;
    }

    public function addReward($data)
    {
        $this->db->query('INSERT INTO reward (badge_name, badge_description, badge_icon_path, points_required) VALUES (:badge_name, :badge_description, :badge_icon_path, :points_required)');

        $this->db->bind(':badge_name', $data['badge_name']);
        $this->db->bind(':badge_description', $data['badge_description']);
        $this->db->bind(':badge_icon_path', $data['badge_icon_path']);
        $this->db->bind(':points_required', $data['points_required']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findRewardById($id)
    {
        $this->db->query('SELECT * FROM reward WHERE reward_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateReward($data)
    {
        $this->db->query('UPDATE reward SET badge_name = :badge_name, badge_description = :badge_description, badge_icon_path = :badge_icon_path, points_required = :points_required WHERE reward_id = :id');

        $this->db->bind(':id', $data['reward_id']);
        $this->db->bind(':badge_name', $data['badge_name']);
        $this->db->bind(':badge_description', $data['badge_description']);
        $this->db->bind(':badge_icon_path', $data['badge_icon_path']);
        $this->db->bind(':points_required', $data['points_required']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteReward($id)
    {
        $this->db->query('DELETE FROM reward WHERE reward_id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}


?>