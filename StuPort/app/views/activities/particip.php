<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Activity Joined</h3>
        <div class="card-toolbar">
        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>No.</th>
                        <th>Category</th>
                        <th>Activity's Name</th>
                        <th>Activity Date</th>
                        <th>Venue</th>
                        <th>Description</th>  
                        <th>Action</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    <?php foreach ($data['joinedActivities'] as $activity): ?>
                    
                        <tr>
                            <td><?php echo $index++; ?></td>
                            <td><?php echo $activity->category; ?></td>
                            <td><?php echo $activity->title; ?></td>
                            <td><?php echo date('F j h:m', strtotime($activity->act_datetime)); ?> </td>
                            <td><?php echo $activity->location; ?></td>
                            <td><?php echo $activity->activity_desc; ?></td>
                            
                            <td> <button class="btn btn-success" disabled>Joined</button>
                           
                            <a href="<?php echo URLROOT . "/activities/form/" . $activity->activity_id ?>" class="btn btn-light-warning">Feedback</a></td>
                            
                            <td>
                            <form id="commentForm_<?php echo $activity->activity_id; ?>">
                                    <div class="comment-container">
                                        <textarea id="commentInput_<?php echo $activity->activity_id; ?>" placeholder="Type your comment here"></textarea>
                                        <button type="button" onclick="addComment(<?php echo $activity->activity_id; ?>)">Enter</button>
                                    </div>
                                    <div id="reviewText_<?php echo $activity->activity_id; ?>" class="review-text">
                                        <?php if (!empty($activity->review)) echo $activity->review; ?>
                                    </div>
                                </form>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                var table = $('#kt_datatable_posts').DataTable({
                    "pageLength": 10, // set the initial page length as desired
                });

                // Add event listener for category filter change
                $('#categoryFilter').on('change', function () {
                    var selectedCategory = $(this).val();
                    table.columns(1).search(selectedCategory).draw(); // assuming category is in the second column
                });
            });
        </script>

        <script>
            function addComment(activityId) {
                var commentInput = document.getElementById('commentInput_' + activityId);
                var commentText = commentInput.value;

                var reviewText = document.getElementById('reviewText_' + activityId);
                reviewText.innerHTML = commentText;
                commentInput.value = '';
            }
        </script>
    </div>
</div>