<?php
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$index = 0;

$reports_sql = "
SELECT 
    transactions.id,
    pets.pet_name,
    pets.pet_type,
    pets.pet_gender,
    pets.owner_name,
    pets.pet_image,
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reports - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2>Transaction Reports</h2>
        </div>
        <div class="card-body">
            <a href="generate_pdf.php" class="btn btn-danger mb-3">Generate PDF</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Gender</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($report = $reports_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $report['pet_name']; ?></td>
                        <td><?php echo $report['pet_type']; ?></td>
                        <td><?php echo $report['pet_gender']; ?></td>
                        <td><?php echo $report['owner_name']; ?></td>
                        <td><img src="<?php echo $report['pet_image']; ?>" alt="<?php echo $report['pet_name']; ?>" width="50"></td>
                        <td><?php echo $report['check_in_date']; ?></td>
                        <td><?php echo $report['check_out_date']; ?></td>
                        <td><?php echo $report['amount']; ?></td>
                        <td><?php echo $report['status']; ?></td>
                        <td>
                            <a href="edit_pet.php?id=<?php echo $report['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_pet.php?id=<?php echo $report['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
