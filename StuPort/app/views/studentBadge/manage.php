<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">List of Student Badges</h3>
        <div class="card-toolbar">
            <!-- Add any buttons or links you want here -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_student_badges" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Student ID</th>
                        <th>Reward ID</th>
                        <th>Date Awarded</th>
                        <th>Activity Joined</th>
                        <th>Badge Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['studentBadges'] as $studentBadge): ?>
                        <tr>
                            <td><?php echo $studentBadge->student_id; ?></td>
                            <td><?php echo $studentBadge->reward_id; ?></td>
                            <td><?php echo $studentBadge->date_awarded; ?></td>
                            <td><?php echo $studentBadge->act_joined; ?></td>
                            <td><?php
                                $act_joined = $studentBadge->act_joined;
                                $badge_type = '';
                                if ($act_joined < 10) {
                                    $badge_type = 'Bronze';
                                } elseif ($act_joined >= 10 && $act_joined < 20) {
                                    $badge_type = 'Silver';
                                } elseif ($act_joined >= 20 && $act_joined < 40) {
                                    $badge_type = 'Gold';
                                } elseif ($act_joined >= 40) {
                                    $badge_type = 'Diamond';
                                }
                                echo $badge_type;
                            ?></td>
                            <td>
                                <!-- Add any action buttons or links you want here -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#kt_datatable_student_badges').DataTable({});
            });
        </script>
    </div>
</div>
