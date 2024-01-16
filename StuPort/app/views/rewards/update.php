<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Reward</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/rewards" class="btn btn-light-primary"><i class="fa fa-home"></i> Back</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
    <form action="<?php echo URLROOT; ?>/rewards/update/<?php echo $data['reward']->reward_id; ?>" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="badge_name" class="form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control" value="<?php echo $data['reward']->badge_name; ?>" required />
                <span class="text-danger">
                    <?php echo $data['badge_name_Error']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="badge_description" class="form-label">Badge Description</label>
                <textarea name="badge_description" class="form-control" aria-label="With textarea" required><?php echo $data['reward']->badge_description; ?></textarea>
                <span class="text-danger">
                    <?php echo $data['badge_description_Error']; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="badge_icon_path" class="form-label">New Icon (if any)</label>
                <?php if (isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p class="text-danger"><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                <input type="file" name="badge_icon_path" class="form-control"/>
                <span class="text-danger">
                    <?php echo $data['achievement_status_Error']; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="points_required" class="form-label">Activities Joined</label>
                <textarea name="points_required" class="form-control" aria-label="With textarea" required><?php echo $data['reward']->points_required; ?></textarea>
                <span class="text-danger">
                    <?php echo $data['badge_description_Error']; ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>



