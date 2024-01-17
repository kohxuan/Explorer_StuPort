<div class="card shadow-sm"style="border-color: #183D64;">
    <div class="card-header" style="background-color: #183D64; color: white;">
        <h3 class="card-title"style="color: white;font-family: 'Your Special Font', gagalin;font-size: 2em;">Assign this personal activity to:</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/peractivity" class="btn btn-light-primary"><i class="fa fa-home"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/peractivity/assign/<?php echo $data['pac_id'] ?>" method="POST" enctype="multipart/form-data">
       
        <div class="mb-10">
    <label for="lecturer">Lecturer:</label>
    <select class="form-control selectpicker" id="lecturer" name="l_id" data-live-search="true" required>
        <?php foreach ($data['lc_list'] as $row): ?>
            <option value="<?php echo $row->l_id; ?>">
                <?php echo $row->l_fName; ?> [<?php echo $row->l_id; ?>]
            </option>
        <?php endforeach ?>
    </select>
</div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
        </form>
    </div>
</div>
