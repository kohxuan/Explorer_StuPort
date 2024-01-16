<div class="card shadow-sm"style="border-color: #FCBD32;">
    <div class="card-header"style="background-color: #FCBD32; color: white;">
        <h3 class="card-title"style="color: white;font-family: 'Your Special Font', gagalin;font-size: 2em;">Manage Personal Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn() && $_SESSION['user_role'] == "Student"): ?>
                <a href="<?php echo URLROOT;?>/peractivity/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">

    <style>
/* Common table styles for both tables */
/* Common table styles for both tables */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 20px;
    border: 20px solid #dcdcdc; /* Border style for both tables */
    text-align: left;
}

.table th {
    background-color: #183D64; /* Blue */
    color: #ffffff;
}

/* Style for the first table (Administrator and Master Administrator) */
.card-header {
    background-color: #FCBD32; /* Yellow */
    color: white;
}

.btn-light-primary {
    background-color: #183D64 !important; /* Blue */
    color: white !important;
}

/* Style for the second table (Student) */
.card-header {
    background-color: #7C1C2B; /* Red */
    color: white;
}

.btn-light-warning {
    background-color: #7C1C2B !important; /* Red */
    color: white !important;
}

.btn-success[disabled] {
    background-color: #FCBD32 !important; /* Yellow */
    color: white !important;
}


    </style>
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Personal Activity's Name</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Description</th>
                        <th>Evidence</th>
                        <?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Administrator"): ?>
                            <th>Student</th>
                        <?php elseif($_SESSION['user_role'] == "Student"): ?>
                            <th>Lecturer</th>   
                        <?php endif; ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data['perActivity'] as $peractivities): ?>
    <tr>
        <td><?php echo $peractivities->name; ?></td>
        <td><?php echo date('F j h:m', strtotime($peractivities->date)); ?></td>
        <td><?php echo $peractivities->venue; ?></td>
        <td><?php echo $peractivities->description; ?></td>
        <td>    <?php

if ($peractivities->evidence != null) {
    echo '<a href="' . URLROOT . '/public/' . $peractivities->evidence . '" target="_blank">View</a>';
} else {
    echo 'No evidence';
}

    ?>
</td></td>
        <?php if ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Administrator"): ?>
            <td> 
                <?php
                $studentFullName = $this->peractivityModel->getStudentFullName($peractivities->s_id);
                echo is_string($studentFullName) ? $studentFullName : '';
                ?>
            </td>
        <?php elseif ($_SESSION['user_role'] == "Student"): ?>
            <td> <?php
                $lecturerFullName = $this->peractivityModel->getLecturerFullName($peractivities->l_id);
                echo is_string($lecturerFullName) ? $lecturerFullName : '';
                ?></td>
            <?php endif ?>
        <td>
            <?php if ($_SESSION['user_role'] == "Student"): ?>
                <!-- Student actions -->
                <a href="<?php echo URLROOT . "/peractivity/update/" . $peractivities->pac_id ?>"
                    class="btn btn-light-warning">Update</a>
                <a href="<?php echo URLROOT . "/peractivity/assign/" . $peractivities->pac_id ?>"
                    class="btn btn-light-primary">Assign</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt<?php echo $peractivities->pac_id?>">
                    Delete
                </button>
            <?php elseif ($_SESSION['user_role'] == "Lecturer" || $_SESSION['user_role'] == "Administrator"): ?>
                <!-- Lecturer actions -->
                <a href="<?php echo URLROOT . "/peractivity/approve/" . $peractivities->pac_id ?>" 
                    class="btn btn-light-warning">Approve</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt<?php echo $peractivities->pac_id?>">
                    Reject
                </button>
                <!-- Add additional code for assigning to lecturers if needed -->
            <?php endif; ?>
            
            <!-- approve or approved ???-->


            <!-- Delete modal -->
           
                <!-- ... modal content ... -->
                <?php if ($_SESSION['user_role'] === "Student"): ?>
                <div class="modal fade" tabindex="-1" id="kt<?php echo $peractivities->pac_id?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Reject</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                Are you sure want to delete this personal activity?
                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/peractivity/delete/" . $peractivities->pac_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    
                                    <button type="submit" class="btn btn-primary font-weight-bold">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

<!-- Lecturer reject modal -->
                <?php if ($_SESSION['user_role'] === "Lecturer"): ?>
                <div class="modal fade" tabindex="-1" id="kt<?php echo $peractivities->pac_id?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Reject</h3>

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>

                            <div class="modal-body">
                                Are you sure want to reject this personal activity?
                            </div>

                            <div class="modal-footer">
                                <form action="<?php echo URLROOT . "/peractivity/delete/" . $peractivities->pac_id; ?>" method="POST">
                                    <input type="hidden" id="expenses" name="expenses" value="expenses">
                                    
                                    <button type="submit" class="btn btn-primary font-weight-bold">Reject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>


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
                var table = $('#kt_datatable_posts').DataTable({});
            });
        </script>
    </div>
</div>
