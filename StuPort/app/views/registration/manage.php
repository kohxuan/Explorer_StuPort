<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Registration</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/posts/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body"> <!--Card for tidyness-->
        
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>