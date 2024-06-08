<?php
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$pets_sql = "SELECT id, pet_name FROM pets";
$pets_result = $conn->query($pets_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = $_POST['pet_id'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];

    $sql = "INSERT INTO transactions (pet_id, check_in_date, check_out_date, amount, status) VALUES ('$pet_id', '$check_in_date', '$check_out_date', '$amount', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: transactions.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Transaction - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 shadow-lg">
        <h2 class="card-title">Add Transaction</h2>
        <form method="post" action="">
            <div class="form-group">
                <label>Pet:</label>
                <select name="pet_id" class="form-control" required>
                    <?php while ($pet = $pets_result->fetch_assoc()) { ?>
                    <option value="<?php echo $pet['id']; ?>"><?php echo $pet['pet_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Check-in Date:</label>
                <input type="date" name="check_in_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Check-out Date:</label>
                <input type="date" name="check_out_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="number" step="0.01" name="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Transaction</button>
        </form>
    </div>
</div>
</body>
</html>
