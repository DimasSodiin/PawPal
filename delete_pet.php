<?php
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$pet_id = $_GET['id'];

// Mulai transaksi
$conn->begin_transaction();

try {
    // Hapus baris terkait di tabel transactions
    $sql_transactions = "DELETE FROM transactions WHERE pet_id=$pet_id";
    if ($conn->query($sql_transactions) === FALSE) {
        throw new Exception("Error deleting related transactions: " . $conn->error);
    }

    // Hapus baris di tabel pets
    $sql_pets = "DELETE FROM pets WHERE id=$pet_id";
    if ($conn->query($sql_pets) === TRUE) {
        // Commit transaksi
        $conn->commit();
        header("Location: dashboard.php");
    } else {
        throw new Exception("Error deleting pet record: " . $conn->error);
    }
} catch (Exception $e) {
    // Rollback transaksi jika ada kesalahan
    $conn->rollback();
    echo $e->getMessage();
}
?>
