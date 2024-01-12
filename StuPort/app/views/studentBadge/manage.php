<!-- manage.php (View) -->
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Student Badges</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="path_to_favicon.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS for styling the table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>

    <!-- Custom CSS for your application -->
    <link rel="stylesheet" href="path_to_your_custom_stylesheet.css">

    <!-- Responsive meta tag for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO meta tags -->
    <meta name="description" content="A list of badges earned by students based on activities.">
    <meta name="author" content="Your Name or Organization">
    
    <!-- Additional scripts like jQuery should go at the end of the body for performance reasons -->
</head>
    <title>List of Student Badges</title>
</head>
<body>
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">List of Student Badges</h3>
            <!-- Toolbars or other header content -->
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
                                <td><?php echo $studentBadge->badge_type; ?></td>
                                <td>
                                    <!-- Action buttons or links -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Script for DataTables functionality -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    var table = $('#kt_datatable_student_badges').DataTable({});
                });
            </script>
        </div>
    </div>
</body>
</html>
