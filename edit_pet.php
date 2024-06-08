<?php
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$pet_id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_gender = $_POST['pet_gender'];
    $owner_name = $_POST['owner_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pet_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_FILES["pet_image"]["tmp_name"]) && !empty($_FILES["pet_image"]["tmp_name"])) {
        $check = getimagesize($_FILES["pet_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["pet_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file)) {
                $image_uploaded = true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                $image_uploaded = false;
            }
        }
    } else {
        $image_uploaded = false;
    }

    if ($image_uploaded) {
        $sql = "UPDATE pets SET pet_name='$pet_name', pet_type='$pet_type', pet_gender='$pet_gender', owner_name='$owner_name', pet_image='$target_file' WHERE id=$pet_id";
    } else {
        $sql = "UPDATE pets SET pet_name='$pet_name', pet_type='$pet_type', pet_gender='$pet_gender', owner_name='$owner_name' WHERE id=$pet_id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM pets WHERE id=$pet_id";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
        exit();
    }

    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
    } else {
        echo "No pet found with the given ID.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pet - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 shadow-lg">
        <h2 class="card-title">Edit Pet</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pet Name:</label>
                <input type="text" name="pet_name" class="form-control" value="<?php echo htmlspecialchars($pet['pet_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Pet Type:</label>
                <input type="text" name="pet_type" class="form-control" value="<?php echo htmlspecialchars($pet['pet_type']); ?>" required>
            </div>
            <div class="form-group">
                <label>Pet Gender:</label>
                <select name="pet_gender" class="form-control" required>
                    <option value="Jantan" <?php echo ($pet['pet_gender'] == 'Jantan') ? 'selected' : ''; ?>>Jantan</option>
                    <option value="Betina" <?php echo ($pet['pet_gender'] == 'Betina') ? 'selected' : ''; ?>>Betina</option>
                </select>
            </div>
            <div class="form-group">
                <label>Owner Name:</label>
                <input type="text" name="owner_name" class="form-control" value="<?php echo htmlspecialchars($pet['owner_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Pet Image:</label>
                <input type="file" name="pet_image" class="form-control">
                <?php if (!empty($pet['pet_image'])): ?>
                    <img src="<?php echo htmlspecialchars($pet['pet_image']); ?>" alt="Pet Image" width="100">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update Pet</button>
        </form>
    </div>
</div>
</body>
</html>