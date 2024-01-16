<?php
// Assuming you have a database connection established

// Replace these with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niagaped_Explorer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Query to retrieve the total number of registered users
$userSql = "SELECT COUNT(*) as userCount FROM user";
$userResult = $conn->query($userSql);

$userCount = 0;

if ($userResult->num_rows > 0) {
    $userRow = $userResult->fetch_assoc();
    $userCount = $userRow["userCount"];
}

// Query to retrieve the total number of registered students
$lecturerSql = "SELECT COUNT(*) as lecturerCount FROM lecturer";
$lecturerResult = $conn->query($lecturerSql);

$lecturerCount = 0;

if ($lecturerResult->num_rows > 0) {
    $lecturerRow = $lecturerResult->fetch_assoc();
    $lecturerCount = $lecturerRow["lecturerCount"];
}

// Query to retrieve the total number of registered students
$studentSql = "SELECT COUNT(*) as studentCount FROM student";
$studentResult = $conn->query($studentSql);

$studentCount = 0;

if ($studentResult->num_rows > 0) {
    $studentRow = $studentResult->fetch_assoc();
    $studentCount = $studentRow["studentCount"];
}

// Query to retrieve the total number of clients/partners
$clientSql = "SELECT COUNT(*) as clientCount FROM administrator";
$clientResult = $conn->query($clientSql);

$clientCount = 0;

if ($clientResult->num_rows > 0) {
    $clientRow = $clientResult->fetch_assoc();
    $clientCount = $clientRow["clientCount"];
}
?>

<?php
// Assuming you have your database connection in place
// Query to retrieve data from the Activity table
$stmt = $conn->prepare('SELECT category, COUNT(*) as num_activities FROM activity GROUP BY category');
$stmt->execute();

// Bind result variables
$stmt->bind_result($category, $num_activities);

// Fetch data into an associative array
$activityData = array();
while ($stmt->fetch()) {
    $activityData[] = array('category' => $category, 'num_activities' => $num_activities);
}

// Prepare labels and data for the chart
$labels = array_column($activityData, 'category');
$data = [
    'labels' => $labels,
    'datasets' => [
        [
            'label' => 'Number of Activities Created',
            'data' => array_column($activityData, 'num_activities'),
            'backgroundColor' => [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            'borderColor' => [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
            ],
            'borderWidth' => 1,
        ],
    ],
];

// Close the statement
$stmt->close();
// Close the database connection
$conn->close();
?>

<div class="row">
    <div class="col mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-person-lines-fill" style="font-size: 3rem; color: #4682B4; margin-right: 1rem;"></i>
                <div>
                    <h3 class="card-title">View Profile</h3>
                    <p class="card-text">Make your profile to be completed.</p>
                    <p class="card-text">Help for internship.</p>
                    <p class="card-text">Attract clients/partners to select you as one of their employee.</p>
                    <a href="<?php echo URLROOT . '/pages/view_profile'; ?>" class="btn btn-light-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-award-fill" style="font-size: 3rem; color: #DC143C; margin-right: 1rem;"></i>
                <div>
                    <h3 class="card-title">View Rewards</h3>
                    <p class="card-text">Rewards get from YouthVentures.</p>
                    <a href="<?php echo URLROOT . '/rewards'; ?>" class="btn btn-light-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Personal Activity Joined</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()) : ?>
                <a href="<?php echo URLROOT; ?>/activities/particip" class="btn btn-light-primary">View More Details</a>
            <?php endif; ?>
        </div>
    </div>
    <!--begin::Card body-->
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Activity Name</th>
                        <th>Activity Date</th>
                        <th>Venue</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "niagaped_Explorer";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $query = "SELECT name, date, venue FROM per_activity";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['venue']}</td>";
                        echo "</tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Card body-->
</div>

<?php
// Include the database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niagaped_Explorer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example query to fetch combined data from profile, student, and lecturer tables
$queryCombined = "SELECT *
                FROM profile AS p
                LEFT JOIN user AS u ON p.p_email = u.email
                LEFT JOIN student AS s ON p.p_email = s.s_email
                LEFT JOIN lecturer AS l ON p.p_email = l.l_email;
                ";

// Execute the combined query
$resultCombined = $conn->query($queryCombined);

// Fetch data from the result set
$combinedData = [];
while ($row = $resultCombined->fetch_assoc()) {
    // Combine student and lecturer names into a single column
    $row['full_name'] = $row['s_fName'] ?: $row['l_fName'];
    $row['telephone_no'] = isset($row['s_telephone_no']) ? $row['s_telephone_no'] : (isset($row['l_telephone_no']) ? $row['l_telephone_no'] : null);
    $row['address'] = isset($row['s_address']) ? $row['s_address'] : (isset($row['l_address']) ? $row['l_address'] : null);
    $row['age'] = isset($row['s_age']) ? $row['s_age'] : (isset($row['l_age']) ? $row['l_age'] : null);
    $row['gender'] = isset($row['s_gender']) ? $row['s_gender'] : (isset($row['l_gender']) ? $row['l_gender'] : null);
    $row['race'] = isset($row['s_race']) ? $row['s_race'] : (isset($row['l_race']) ? $row['l_race'] : null);
    $combinedData[] = $row;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.4.4/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/searchpanes/1.4.4/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

    <!-- DataTable initialization script -->
    <script>
        $(document).ready(function() {
            var table = $('#userTable').DataTable({
                data: <?php echo json_encode($combinedData); ?>,
                columns: [{
                        data: 'username'
                    },
                    {
                        data: 'full_name'
                    },
                    {
                        data: 'position'
                    },
                    {
                        data: 'p_email'
                    },
                ],
                // Enable searching and set up the SearchPanes plugin
                searchPanes: {
                    layout: 'columns-3'
                },
                dom: 'Plfrtip',
                select: true
            });

            // Row click event
            $('#userTable tbody').on('click', 'tr', function() {
                var data = table.row(this).data();
                console.log('Row clicked. Data:', data);
                showModal(data);
                console.log('Image Path:', data.profileimage);
            });

            // Show modal with user details
            function showModal(data) {
                var baseUrl = "<?php echo URLROOT . '/public/'; ?>";
                var imageUrl = baseUrl + data.profileimage;

                function isEmpty(value) {
                    return value !== '' ? value : '-';
                }

                $('#userDetailsModalLabel').text(isEmpty(data.full_name));
                $('#profileImage').attr('src', imageUrl);
                $('#nameDetails').text(isEmpty(data.full_name));
                $('#positionDetails').text(isEmpty(data.position));
                $('#emailDetails').text(isEmpty(data.p_email));
                $('#telephoneDetails').text(isEmpty(data.telephone_no));
                $('#addressDetails').text(isEmpty(data.address));
                $('#cityStateDetails').text(isEmpty(data.citystate));
                $('#countryDetails').text(isEmpty(data.country));
                $('#ageDetails').text(isEmpty(data.age));
                $('#genderDetails').text(isEmpty(data.gender));
                $('#raceDetails').text(isEmpty(data.race));
                $('#aboutDetails').text(isEmpty(data.about));
                $('#headlineDetails').text(isEmpty(data.headline));

                $('#userDetailsModal').modal('show');
            }
        });
    </script>

    <style>
        .card {
            margin-top: 20px;
        }

        .modal-content {
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .modal-header {
            background-color: #7C1C2B;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: none;
            background-color: #f8f9fa;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>

<body>
    <!-- Card structure for user profiles -->

    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Connect with Others</h3>
            <!-- Add any additional buttons or controls here -->
        </div>
        <!-- Card body for user profiles DataTable -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="userTable" class="table table-row-bordered gy-5">
                    <thead>
                        <tr class="fw-semibold fs-6 text-muted">
                            <th>Username</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody style="cursor: pointer;">
                        <!-- DataTable will populate rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal for User Details -->
    <div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: white;">Details of <span id="userDetailsModalLabel"></span></h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img id="profileImage" src="" alt="Profile Image" style="max-width: 150px; border-radius: 50%;">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Name:</strong> <span id="nameDetails"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Position:</strong> <span id="positionDetails"></span></p>
                                        <p><strong>Email:</strong> <span id="emailDetails" class="clickable-email" style="cursor: pointer; color:#1b84ff"></span></p>
                                        <p><strong>Telephone No:</strong> <span id="telephoneDetails" class="clickable-telephone" style="cursor: pointer; color:#1b84ff"></span></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Age:</strong> <span id="ageDetails"></span></p>
                                        <p><strong>Gender:</strong> <span id="genderDetails"></span></p>
                                        <p><strong>Race:</strong> <span id="raceDetails"></span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <p><strong>Address:</strong> <span id="addressDetails"></span></p>
                                        <p><strong>City/State:</strong> <span id="cityStateDetails"></span></p>
                                        <p><strong>Country:</strong> <span id="countryDetails"></span></p>
                                    </div>
                                    <div class="col-md-12">
                                        <p><strong>About:</strong> <span id="aboutDetails"></span></p>
                                        <p><strong>Headline:</strong> <span id="headlineDetails"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Add click event listeners for email and telephone
                    document.getElementById('emailDetails').addEventListener('click', function() {
                        var email = document.getElementById('emailDetails').innerText;
                        window.location.href = 'mailto:' + email;
                    });

                    document.getElementById('telephoneDetails').addEventListener('click', function() {
                        var telephone = document.getElementById('telephoneDetails').innerText;
                        window.location.href = 'tel:' + telephone;
                    });
                </script>

                <!-- <div class="modal-footer">
                You can add additional buttons here if needed
            </div> -->
            </div>
        </div>
    </div>


</body>

</html>