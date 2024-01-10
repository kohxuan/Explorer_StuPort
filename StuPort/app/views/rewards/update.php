<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Reward</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/rewards/update" class="btn btn-light-primary"><i class="fa fa-home"></i> Back</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/rewards/update/<?php echo $data['rewards']->reward_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="badge_name" class="form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control" value="<?php echo $data['rewards']->badge_name; ?>" required />
                <span class="text-danger">
                    <?php echo $data['badge_name_Error']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="badge_description" class="form-label">Badge Description</label>
                <textarea name="badge_description" class="form-control" aria-label="With textarea" required><?php echo $data['rewards']->badge_description; ?></textarea>
                <span class="text-danger">
                    <?php echo $data['badge_description_Error']; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="existing_icon" class="form-label">Existing Icon</label>
                <input type="text" name="existing_icon" class="form-control" value="<?php echo $data['rewards']->badge_icon_path; ?>" disabled/>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">New Icon (if any)</label>
                <?php if (isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p class="text-danger"><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                <input type="file" name="image" class="form-control"/>
                <span class="text-danger">
                    <?php echo $data['achievement_status_Error']; ?>
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<style>
    .card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
    }

    .card-header {
        background-color: #f0f0f0;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 20px;
        margin: 0;
    }

    .card-toolbar {
        display: flex;
        gap: 10px;
    }

    .btn-light-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-light-primary:hover {
        background-color: #0056b3;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        border: 1px solid #d1d1d1;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
    }

    .text-danger {
        color: #ff0000;
    }
</style>
