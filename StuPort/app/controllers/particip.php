<div class="card shadow-sm"style="border-color: #FCBD32;">
    <div class="card-header"style="background-color: #FCBD32; color: white;">
        <h3 class="card-title"style="color: white;font-family: 'Your Special Font', gagalin;font-size: 2em;">Activity Joined</h3>
        <div class="card-toolbar">
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
                        <th>No.</th>
                        <th>Category</th>
                        <th>Activity's Name</th>
                        <th>Activity Date</th>
                        <th>Venue</th>
                        <th>Description</th>  
                        <th>Action</th>
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
                            <td> <button class="btn btn-success" disabled>Joined</button></td>
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

        <!-- <script>
            function addComment(activityId) {
                var commentInput = document.getElementById('commentInput_' + activityId);
                var commentText = commentInput.value;

                var reviewText = document.getElementById('reviewText_' + activityId);
                reviewText.innerHTML = commentText;
                commentInput.value = '';
            }
        </script> -->
    </div>
</div>