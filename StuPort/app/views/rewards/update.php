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
        border: 1px solid #FCBD32; /* Yellow border */
        border-radius: 8px;
        padding: 20px;
    }

    .card-header {
        background-color: #183D64; /* Blue header */
        color: #fff; /* White text */
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-light-primary {
        background-color: #7C1C2B; /* Red button */
        color: #fff; /* White text */
    }

    .btn-light-primary:hover {
        background-color: darken(#7C1C2B, 10%); /* Slightly darker red on hover */
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

