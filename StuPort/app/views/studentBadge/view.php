<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reward</title>
</head>
<body>
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">View Reward</h3>
            <div class="card-toolbar">
                <?php if (isLoggedIn()): ?>
                    <a href="<?php echo URLROOT; ?>/studentBadge" class="btn btn-light-primary"><i class="fa fa-home"></i> Back</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="badge_name" class="form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control" value="<?php echo $data['reward']->badge_name; ?>" readonly />
            </div>
            <div class="mb-3">
                <label for="badge_description" class="form-label">Badge Description</label>
                <textarea name="badge_description" class="form-control" aria-label="With textarea" readonly><?php echo $data['reward']->badge_description; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="badge_icon_path" class="form-label">Badge Icon</label>
                <img src="<?php echo $data['reward']->badge_icon_path; ?>" alt="Badge Icon" style="width: 100px; height: 100px;">
            </div>
            <div class="mb-3">
                <label for="points_required" class="form-label">Activities Joined</label>
                <input type="text" name="points_required" class="form-control" value="<?php echo $data['reward']->points_required; ?>" readonly />
            </div>
        </div>
    </div>
</body>
</html>
