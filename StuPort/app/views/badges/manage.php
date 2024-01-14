<?php if ($_SESSION['user_role'] == 'Student') : ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Badges</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <!-- Need to change later -->
                
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Badge Icon</th>
                        <th>Bagde Name</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Organizer Name</th>
                        <th>Skill Acquired</th>
                        <th>Attachment</th>
                        <th>Action</th>
                        <th>Feedback need to filled after event</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['activities'] as $activity): ?>
                        <tr>
                            <td><?php echo $activity->title; ?></td>
                            <td><?php echo $activity->category; ?></td>
                            <td><?php echo $activity->activity_desc; ?></td>
                            <td><?php echo date('F j h:m', strtotime($activity->act_datetime)); ?></td>
                            <td><?php echo $activity->location; ?></td>
                            <td><?php echo $activity->organizer_name; ?></td>
                            <td><?php echo $activity->skill_acquired; ?></td>
                            <td>
                                <img src="<?php echo $activity->attachment; ?>" alt="Attachment">
                            </td>
                            <td>
                                    <?php if ($this->activityModel->isStudentJoined($_SESSION['user_id'], $activity->activity_id)) : ?>
                                        <button class="btn btn-success" disabled>Join</button>
                                    <?php else : ?>
                                        <a href="<?php echo URLROOT . "/activities/join/" . $activity->activity_id ?>" class="btn btn-light-warning">Join</a>
                                    <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($activity->link_form)) {
                                    echo '<a href="' . $activity->link_form . '">' . $activity->link_form . '</a>';
                                } else {
                                    echo 'Feedback is not given yet.';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                var table = $('#kt_datatable_posts').DataTable({});
            });
        </script>
</div>
<?php endif; ?>
