<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Registration</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/registrations/create" class="btn btn-primary">Create New Registration</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Activity ID</th>
                        <th>User ID</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Registration Date</th>
                        <th>User Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['registrations'] as $registration): ?>
                    <tr>
                        <td><?php echo $registration->activity_id; ?></td>
                        <td><?php echo $registration->user_id; ?></td> <!-- Corrected to show user_id -->
                        <td><?php echo $registration->link; ?></td>
                        <td><?php echo $registration->status; ?></td> <!-- Added status display -->
                        <td><?php echo $registration->registration_date; ?></td> <!-- Added registration_date display -->
                        <td><?php echo $registration->user_notes; ?></td> <!-- Added user_notes display -->
                        <td>
                            <!-- Action Buttons -->
                            <a href="<?php echo URLROOT . "/registrations/update/" . $registration->activity_id ?>" class="btn btn-warning">Update</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $registration->activity_id?>">
                                Delete
                            </button>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal<?php echo $registration->activity_id?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this registration?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?php echo URLROOT . "/registrations/delete/" . $registration->activity_id; ?>" method="POST">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <!-- Footer content can go here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kt_datatable_posts').DataTable({
            "pagingType": "full_numbers",
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
