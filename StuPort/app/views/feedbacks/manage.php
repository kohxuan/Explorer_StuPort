<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Feedback</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/activities" class="btn btn-light-primary">Select Activity</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body"> <!--Card for tidyness-->

    <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Activity Title</th>
                        <th>Activity</th>
                        <th>Feedback Form Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['feedbacks'] as $feedback): ?>
                    <tr>
                        <td><?php echo $feedback->title; ?></td>
                        <!-- <td class="hidden-column"><?php echo $feedback->activity_id; ?></td> -->
                        <td><?php echo $feedback->activity_id; ?></td>
                        <td><?php echo '<a href="' . $feedback->link_form . '">' . $feedback->link_form . '</a>'; ?></td>
                        <td><a href="<?php echo URLROOT . "/feedbacks/edit/" . $feedback->feedback_id ?>"
                                class="btn btn-light-warning">Edit</a>
                            
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt<?php echo $feedback->feedback_id?>">
                                Delete
                                </button>

                                <div class="modal fade" tabindex="-1" id="kt<?php echo $feedback->feedback_id?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title">Delete Feedback</h3>

                                                <!--begin::Close-->
                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                            class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>

                                            <div class="modal-body">
                                                Are you sure want to delete this feedback form link for this activity?
                                            </div>

                                            <div class="modal-footer">
                                                <form action="<?php echo URLROOT . "/feedbacks/delete/" . $feedback->feedback_id; ?>"
                                                    method="POST">
                                                    <!--<input type="hidden" id="expenses" name="expenses" value="expenses">-->
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Back</button>
                                                    <button type="submit"
                                                        class="btn btn-primary font-weight-bold">Delete</button>
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