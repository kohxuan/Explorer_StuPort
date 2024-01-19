<div class="card shadow-sm" style="border-color: #183D64;">
    <div class="card-header" style="background-color: #183D64; color: white;">
        <h3 class="card-title" style="color: white;font-family: 'Your Special Font', gagalin;font-size: 2em;">Upload New Feedback Form</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/feedbacks" class="btn btn-light-primary" style="background-color: #FCBD32; color: white;">Manage Feedback Forms</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">

        <?php 
        $activity_id=$_GET['activity_id']; //assumes that the activity_id is passed as a parameter in the URL
        ?>


        <form action="<?php echo URLROOT; ?>/feedbacks/create" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Link:</label>
                <input type="hidden" id="activity_id" name="activity_id" value="<?php echo $activity_id ; ?>">
                <input type="text" name="link_form" class="form-control form-control-solid" placeholder="Link" required />
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold" style="background-color: #183D64;">Submit</button>

        </form>

    </div>
</div>