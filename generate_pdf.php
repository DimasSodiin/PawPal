<?php
require('library/fpdf.php');
include 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Transaction Reports', 0, 1, 'C');
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, 'ID', 1);
        $this->Cell(20, 10, 'Pet Name', 1);
        $this->Cell(20, 10, 'Pet Type', 1);
        $this->Cell(20, 10, 'Pet Gender', 1);
        $this->Cell(20, 10, 'Owner Name', 1);
        $this->Cell(30, 10, 'Check-in Date', 1);
        $this->Cell(30, 10, 'Check-out Date', 1);
        $this->Cell(20, 10, 'Amount', 1);
        $this->Cell(20, 10, 'Status', 1);
        $this->Ln();
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$reports_sql = "
SELECT 
    transactions.id,
    pets.pet_name,
    pets.pet_type,
    pets.pet_gender,
    pets.owner_name,
    transactions.check_in_date,
    transactions.check_out_date,
    transactions.amount,
    transactions.status
FROM 
    transactions 
JOIN 
    pets 
ON 
    transactions.pet_id = pets.id";
$reports_result = $conn->query($reports_sql);

while ($report = $reports_result->fetch_assoc()) {
    $pdf->Cell(10, 10, $report['id'], 1);
    $pdf->Cell(20, 10, $report['pet_name'], 1);
    $pdf->Cell(20, 10, $report['pet_type'], 1);
    $pdf->Cell(20, 10, $report['pet_gender'], 1);
    $pdf->Cell(20, 10, $report['owner_name'], 1);
    $pdf->Cell(30, 10, $report['check_in_date'], 1);
    $pdf->Cell(30, 10, $report['check_out_date'], 1);
    $pdf->Cell(20, 10, $report['amount'], 1);
    $pdf->Cell(20, 10, $report['status'], 1);
    $pdf->Ln();
}

// Bersihkan output buffer sebelum mengirim PDF
ob_clean();

// Output PDF
$pdf->Output('D', 'TransactionReports.pdf');
?>
