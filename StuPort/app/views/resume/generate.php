<?php
// Include necessary files and connect to the database
require_once('config.php');

if (isset($_GET['id'])) {
    // $userID = $_GET['user_id'];
    $userID = 1;

    // Fetch user information based on the provided user ID
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM profile WHERE id = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Include the FPDF library for PDF generation
        require('../libraries/fpdf/fpdf.php');

        // Create a new PDF instance and generate the resume
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Name: ' . $row['name'], 0, 1);
        $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
        // Add other user information as needed

        // Output the PDF (force download)
        $pdf->Output('user_resume.pdf', 'D');
        
        // Close the database connection
        $conn->close();
        exit(); // Terminate the script after generating the PDF
    } else {
        echo "No user found.";
    }

    $conn->close();
} else {
    echo "Invalid user ID.";
}
?>
