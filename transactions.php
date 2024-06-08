<?php
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$transactions_sql = "SELECT transactions.id, pets.pet_name, transactions.check_in_date, transactions.check_out_date, transactions.amount 
                     FROM transactions 
                     JOIN pets ON transactions.pet_id = pets.id";
$transactions_result = $conn->query($transactions_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2>Transactions</h2>
            <a href="add_transaction.php" class="btn btn-primary">Add Transaction</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pet Name</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($transaction = $transactions_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $transaction['pet_name']; ?></td>
                        <td><?php echo $transaction['check_in_date']; ?></td>
                        <td><?php echo $transaction['check_out_date']; ?></td>
                        <td><?php echo $transaction['amount']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
