<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">List of Your Rewards</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/pages/index" class="btn btn-light-primary">Main Page</a>
            <?php endif; ?>
        </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Badge Icon</th>
                        <th>Badge Name</th>
                        <th>Badge Description</th>
                        <th>Activities Joined</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['rewards'] as $badge): ?>
                    <tr>
                        <td><?php echo $badge->badge_icon_; ?></td>
                        <td><?php echo $badge->badge_name; ?></td>
                        <td><?php echo $badge->badge_description; ?></td>
                        <td><?php echo $badge->points_required; ?></td>
                        <td>
                            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $badge->user_id): ?>

                            <a href="<?php echo URLROOT . "/badges/view/" . $badge->id ?>" class="btn btn-light-warning">Update</a>


                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#kt_datatable_posts').DataTable({});
            });
        </script>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
