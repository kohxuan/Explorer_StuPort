<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Registration</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/registrations/create" class="btn btn-light-primary">Create Form</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body"> <!--Card for tidyness-->
    <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Activity ID</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['registrations'] as $registration): ?>
                    <tr>
                        <td><?php echo $registration->activity_id; ?></td>
                        <td><?php echo $registration->link; ?></td>
                        <td><?php echo $registration->body; ?></td>
                        
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