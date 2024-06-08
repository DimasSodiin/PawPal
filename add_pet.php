<?php
include 'db.php';
include 'navbar.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $pet_gender = $_POST['pet_gender'];
    $owner_name = $_POST['owner_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pet_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["pet_image"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check file size
    if ($_FILES["pet_image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO pets (pet_name, pet_type, pet_gender, owner_name, pet_image) VALUES ('$pet_name', '$pet_type', '$pet_gender', '$owner_name', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pet - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card p-4 shadow-lg">
        <h2 class="card-title">Add Pet</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Pet Name:</label>
                <input type="text" name="pet_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Pet Type:</label>
                <input type="text" name="pet_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Pet Gender:</label>
                <select name="pet_gender" class="form-control" required>
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                </select>
            </div>
            <div class="form-group">
                <label>Owner Name:</label>
                <input type="text" name="owner_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Pet Image:</label>
                <input type="file" name="pet_image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Pet</button>
        </form>
    </div>
</div>
</body>
</html>
