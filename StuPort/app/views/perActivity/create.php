<div class="card shadow-sm"style="border-color: #183D64;">
    <div class="card-header"style="background-color: #183D64; color: white;">
        <h3 class="card-title"style="color: white;font-family: 'Your Special Font', gagalin;font-size: 2em;">Create Personal Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/peractivity" class="btn btn-light-primary"style="background-color: #FCBD32; color: white;">Manage Personal Activity</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">

<style>

</style>
    <form action="<?php echo URLROOT; ?>/peractivity/create" method="POST"  enctype="multipart/form-data">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Name of Personal Activity</label>
                <input type="text" name="name" class="form-control form-control-solid" placeholder="Name of Activity" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Date</label>
                <input type="date" name="date" class="form-control form-control-solid" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Venue</label>
                <input type="text" name="venue" class="form-control form-control-solid" placeholder="Venue of Activity" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <input type="text" name="description" required textarea name="body" class="form-control" aria-label="With textarea" required></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="image" class="required form-label">Evidence</label>

                <?php if(isset($_SESSION['error']) && ($_SESSION['error'] != "")): ?>
                    <p><?php echo $_SESSION['error']; ?></p>
                <?php endif ?>
                
                <div class="position-relative">
                    <input type="file" class="form-control" name="evidence">
                </div>

                <!-- <label for="exampleFormControlInput1" class="required form-label">Icon</label>
                <input type="text" name="icon_dir" class="form-control form-control-solid" placeholder="icon_dir..." required /> -->
            </div>



            <button type="submit" class="btn btn-primary font-weight-bold"style="background-color:#183D64; color: white;">Submit</button>

        </form>

    </div>
</div>
