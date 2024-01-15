<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Create Rewards</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/rewards" class="btn btn-light-primary">Manage Rewards</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/rewards/create" <?php echo $data['reward']->reward_id ?> method="POST" enctype="multipart/form-data" id="rewardForm">
            <!-- Badge Name -->
            <div class="mb-10">
                <label for="badge_name" class="required form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control form-control-solid" placeholder="Badge name..." value="<?php echo $data['reward']->reward_id ?>" required />
            </div>

            <!-- Badge Description -->
            <div class="mb-10">
                <label for="badge_description" class="form-label">Badge Description</label>
                <textarea name="badge_description" class="form-control" required></textarea>
            </div>

            <!-- Badge Icon -->
            <div class="mb-10">
                <!-- Image input here -->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Badge icon</label>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                 
            </div>

            <!-- Activity Joined -->
            <div class="mb-10">
                <label for="points_required" class="required form-label">Activity Joined</label>
                <input type="number" name="points_required" class="form-control" placeholder="Activity Joined..." required />
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    const rewardForm = document.getElementById('rewardForm');

    rewardForm.addEventListener('submit', function (event) {
        const badgeName = document.querySelector('input[name="badge_name"]').value;
        const badgeDescription = document.querySelector('textarea[name="badge_description"]').value;
        const badgeIcon = document.querySelector('input[name="badge_icon"]').value;
        const pointsRequired = document.querySelector('input[name="points_required"]').value;

        if (!badgeName || !badgeDescription || !pointsRequired) {
            event.preventDefault();
            // Display an error message or handle the error
        }
    });
</script>
