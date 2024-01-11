<?php

class Rewards extends Controller
{
    private $rewardModel;

    public function __construct()
    {
        $this->rewardModel = $this->model('Reward');
    }

    public function index()
    {
        $rewards = $this->rewardModel->findAllRewards();
        $data = [
            'rewards' => $rewards
        ];

        $this->view('rewards/index', $data);
    }

    public function create()
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards/index");
        }

        $data = [
            'badge_name' => '',
            'badge_description' => '',
            'points_required' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'badge_name' => trim($_POST['badge_name']),
                'badge_description' => trim($_POST['badge_description']),
                'points_required' => trim($_POST['points_required'])
            ];

            if ($data['badge_name'] && $data['badge_description'] && $data['points_required']) {
                if ($this->rewardModel->addReward($data)) {
                    header("Location: " . URLROOT . "/rewards/index");
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('rewards/create', $data);
            }
        }

        $this->view('rewards/create', $data);
    }

    public function update($reward_id)
    {
        $reward = $this->rewardModel->findRewardById($reward_id);

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards/index");
        }

        $data = [
            'reward' => $reward,
            'badge_name' => $reward->badge_name,
            'badge_description' => $reward->badge_description,
            'points_required' => $reward->points_required
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'reward_id' => $reward_id,
                'badge_name' => trim($_POST['badge_name']),
                'badge_description' => trim($_POST['badge_description']),
                'points_required' => trim($_POST['points_required'])
            ];

            if ($this->rewardModel->updateReward($data)) {
                header("Location: " . URLROOT . "/rewards/index");
            } else {
                die("Something went wrong :(");
            }
        }

        $this->view('rewards/update', $data);
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards/index");
        }

        if ($this->rewardModel->deleteReward($id)) {
            header("Location: " . URLROOT . "/rewards/index");
        } else {
            die('Something went wrong..');
        }
    }
}

?>
