<div class="card shadow-sm">

    <div class="card-header">
        <h3 class="card-title">Create Rewards</h3>

        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                
                <a href="<?php echo URLROOT;?>/rewards/create" class="btn btn-light-primary"><i class="fa fa-home"></i></a>
                <!-- <a href="<?php echo URLROOT;?>/badges" class="btn btn-light-primary">Manage Badges</a> -->
            <?php endif; ?>
        </div>
    </div>

    <div class="card-body">

        <form action="<?php echo URLROOT; ?>/rewards/create" method="POST" enctype="multipart/form-data">

            <div class="mb-10">
                <label for="badge_name" class="required form-label">Badge Name</label>
                <input type="text" name="badge_name" class="form-control form-control-solid" placeholder="Badge Name..." required />
            </div>

            <div class="mb-10">
                <label for="badge_description" class="required form-label">Badge Description</label>
                <div class="position-relative">
                    <div class="position-absolute top-0"></div>
                    <textarea name="badge_description" class="form-control" aria-label="With textarea" placeholder="Badge Description..." required></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="badge_name" class="required form-label">Achievemnt Status</label>
                <input type="text" name="badge_name" class="form-control form-control-solid" placeholder="Status..." required />
            </div>


    
            
            

            

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

        </form>

    </div>

</div>