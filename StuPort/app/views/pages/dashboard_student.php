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
                <i class="bi bi-person-lines-fill" style="font-size: 3rem; color: black; margin-right: 1rem;"></i>
                <div>
                    <h3 class="card-title">View Profile</h3>
                    <p class="card-text">Make your profile to be completed.</p>
                    <p class="card-text">Help for internship.</p>
                    <p class="card-text">Attract clients/partners to select you as one of their employee.</p>
                    <a href="<?php echo URLROOT . '/pages/view_profile'; ?>" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-award-fill" style="font-size: 3rem; color: black; margin-right: 1rem;"></i>
                <div>
                    <h3 class="card-title">View Rewards</h3>
                    <p class="card-text">Rewards get from YouthVentures.</p>
                    <a href="<?php echo URLROOT . '/rewards'; ?>" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Registered Activity</h3>
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