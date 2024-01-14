




<?php require APPROOT . '/views/includes/head_metronic.php';?>
<?php require APPROOT . '/views/includes/begin_app.php';?>

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->

        
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/activities" class="btn btn-light-primary">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo $data['u_url'] ?>" method="POST">

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Activity Title</label>
                <input type="text" name="title" class="form-control form-control-solid" value="<?php echo $data['activity']->title; ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <textarea name="activity_desc" class="form-control" aria-label="With textarea" required><?php echo $data['activity']->activity_desc; ?></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date and Time</label>
                <input type="datetime-local" name="act_datetime" class="form-control form-control-solid" value="<?php echo $data['activity']->act_datetime; ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Location</label>
                <input type="text" name="location" class="form-control form-control-solid" value="<?php echo $data['activity']->location; ?>" />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Organizer Name</label>
                <input type="text" name="organizer_name" class="form-control form-control-solid" value="<?php echo $data['activity']->organizer_name; ?>" />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Skill Acquired</label>
                <input type="text" name="skill_acquired" class="form-control form-control-solid" value="<?php echo $data['activity']->skill_acquired; ?>" />
            </div>

             <!-- Avatar Section -->
    <div class="row mb-10">
        <label class="col-lg-4 col-form-label fw-semibold fs-6">Attachment</label>
        <div class="col-lg-8">
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT . "/public/" . $data['activity']->attachment; ?>');">

                <div class="image-input-wrapper w-125px h-125px"style="background-image: url('<?php echo URLROOT . "/public/" . $data['activity']->attachment; ?>')" ></div>
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


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
        </form>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>


<?php require APPROOT . '/views/includes/end_app.php';?>

<?php require APPROOT . '/views/includes/footer_metronic.php';?>