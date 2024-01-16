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


<div class="container">
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Activity Statistics</h5>
                </div>
                <div class="card-body">
                    <!-- Create a canvas for the chart with adjusted width and height -->
                    <canvas id="myChart" width="210" height="90"></canvas>
                </div>

                <!-- Script to initialize the bar chart -->
                <script>
                    // Your existing Bar Chart script
                    var ctxBar = document.getElementById('myChart').getContext('2d');
                    var myBarChart = new Chart(ctxBar, {
                        type: 'bar',
                        data: <?php echo json_encode($data); ?>,
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    maxTicksLimit: 6,
                                    title: {
                                        display: true,
                                        text: 'Type of Category' // Label for the x-axis
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    title: {
                                        display: true,
                                        text: 'Number of Activities Created' // Label for the y-axis
                                    },
                                    ticks: {
                                        display: false // Hide the tick labels
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <!--begin::Card body-->
            <div class="card h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-bookmark-check-fill" style="font-size: 3rem; color: #800000; margin-right: 1rem;"></i>
                    <div>
                        <h3 class="card-title">Manage Activity</h3>
                        <p class="card-text">YouthVentures activity which collaborate with its clients and partners</p>
                        <p class="card-text">Aimed to improve the student participation</p>
                        <a href="<?php echo URLROOT . '/activities'; ?>" class="btn btn-light-primary">Explore More</a>
                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>
    </div>