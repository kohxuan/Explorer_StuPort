<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student Badge</title>
</head>
<body>
    <h1>Create Student Badge</h1>
    
    <?php if (!empty($data['error'])) : ?>
        <p>Error: <?php echo $data['error']; ?></p>
    <?php endif; ?>

    <form action="<?php echo URLROOT; ?>/studentBadge/create" method="POST">
        <label for="student_id">Student ID:</label>
        <input type="number" name="student_id" required><br>

        <label for="reward_id">Reward ID:</label>
        <input type="number" name="reward_id" required><br>

        <label for="date_awarded">Date Awarded:</label>
        <input type="date" name="date_awarded" required><br>

        <label for="act_joined">Act Joined:</label>
        <input type="number" name="act_joined" required><br>

        <input type="submit" value="Create Badge">

        <!-- Badge Type Determination -->
        <?php
        if (isset($_POST['act_joined'])) {
            $act_joined = intval($_POST['act_joined']);
            $badge_type = '';

            if ($act_joined < 10) {
                $badge_type = 'Bronze';
            } elseif ($act_joined >= 10 && $act_joined < 20) {
                $badge_type = 'Silver';
            } elseif ($act_joined >= 20 && $act_joined < 40) {
                $badge_type = 'Gold';
            } elseif ($act_joined >= 40) {
                $badge_type = 'Diamond';
            }

            echo '<p>Badge Type: ' . $badge_type . '</p>';
        }
        ?>
    </form>
</body>
</html>
