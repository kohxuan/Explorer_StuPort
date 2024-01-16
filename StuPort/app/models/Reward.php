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

    public function findRewardById($reward_id)
    {
        $this->db->query('SELECT * FROM reward WHERE reward_id = :reward_id');
        $this->db->bind(':reward_id', $reward_id);
        $row = $this->db->single();
        return $row;
    }

   public function updateReward($data)
    {
        $this->db->query('UPDATE reward SET badge_name = :badge_name, badge_description = :badge_description, badge_icon_path = :badge_icon_path, points_required = :points_required WHERE reward_id = :reward_id');

        $this->db->bind(':reward_id', $data['reward_id']);
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

    public function findRewardByBadgeName($badge_name)
    {
        $this->db->query('SELECT * FROM reward WHERE badge_name = :badge_name');
        $this->db->bind(':badge_name', $badge_name);
        $row = $this->db->single();
        return $row;
    }

    
    public function getRewardImagePath($points_required) {
        if ($points_required < 10) {
            return 'images/rewards/bronze_badge.png'; // Correct the path as per your image directory structure
        } elseif ($points_required >= 10 && $points_required < 30) {
            return 'images/rewards/silver_badge.png'; // Correct the path as per your image directory structure
        } elseif ($points_required >= 30 && $points_required < 50) {
            return 'images/rewards/gold_badge.png'; // Correct the path as per your image directory structure
        } elseif ($points_required >= 50) {
            return 'images/rewards/diamond_badge.png'; // Correct the path as per your image directory structure
        } else {
            return 'images/rewards/default_badge.png'; // Default badge if no condition is met, correct the path as per your image directory structure
        }
    }

    // ... Any additional methods you may need ...
    }




?>