                                                             
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Activities</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/activity/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body"> <!--Card for tidiness-->

        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Title</th>
                        <th>Content</th>
                        <th>Date</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['activity'] as $activities): ?>
                    <tr>
                        <td><?php echo $activities->title; ?></td>
                        <td><?php echo date('F j h:m', strtotime($activities->created_at)); ?></td>
                        <td><?php echo $activities->body; ?></td>
                        <!-- Adjust other columns as needed -->
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        $(document).ready(function() {
            var table = $('#kt_datatable_posts').DataTable({

            });
        });
        </script>

    </div>
    <div class="card-footer">
        Footer
    </div>
</div>
