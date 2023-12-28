<?php
require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Resume');
$pdf->SetSubject('Personal Resume');

// Add a page
$pdf->AddPage();

// Connect to your database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from MySQL
$sql = "SELECT * FROM profiles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Name: ' . $row['name'], 0, 1);
        $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
        $pdf->Cell(0, 10, 'Phone: ' . $row['phone'], 0, 1);
        $pdf->Cell(0, 10, 'Address: ' . $row['address'], 0, 1);
        $pdf->Ln(10); // Add some space between profiles
    }
} else {
    $pdf->Cell(0, 10, 'No profiles found.', 0, 1);
}

// Close MySQL connection
$conn->close();

// Close and output PDF
$pdf->Output('resume.pdf', 'D');
?>
