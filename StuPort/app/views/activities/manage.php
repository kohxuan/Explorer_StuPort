                                                             
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Activities</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/activities/create" class="btn btn-light-primary">Create</a>


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
                        <th>Feedback given</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($data['activity']) && is_array($data['activity'])): ?>
                    <?php foreach($data['activity'] as $activities): ?>  
                        <tr>
                            <td><?php echo $activities->title; ?></td>
                            <td><?php echo $activities->activity_desc; ?></td>
                            <td><?php echo date('F j h:m', strtotime($activities->date_time)); ?></td>
                            <td>
                            <?php
                            if (!empty($activities->link_form)) {
                                // Display as a hyperlink
                                echo '<a href="' . $activities->link_form . '">' . $activities->link_form . '</a>';
                            } else {
                                // Display the "Add Feedback" button
                                echo '<a href="' . URLROOT . '/feedbacks/create" class="btn btn-light-primary">Add Feedback</a>';
                            }
                            ?>  
                        </td>

                            <td><?php echo $activities->review; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No activities found.</td>
                    </tr>
                <?php endif; ?>


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
