




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


            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
        </form>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>


<?php require APPROOT . '/views/includes/end_app.php';?>

<?php require APPROOT . '/views/includes/footer_metronic.php';?>