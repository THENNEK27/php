<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $title = $_POST["TITLE"];
    $author = $_POST["AUTHOR"];
    $context = $_POST["CONTEXT"];

    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $filename = $_FILES["image"]["name"];
        $filesize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script>alert('Invalid image extension');</script>";
        } else if ($filesize > 1000000) {
            echo "<script>alert('Image size is too large');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $destination = 'img/' . $newImageName;

            if (move_uploaded_file($tmpName, $destination)) {
                $query = "INSERT INTO touristspot (TITLE, AUTHOR, CONTEXT, IMAGE) VALUES ('$title', '$author', '$context', '$newImageName')";
                mysqli_query($connection, $query);
                echo "<script>alert('Successfully added');</script>";
                header('location:index.php');
                exit;
            } else {
                echo "<script>alert('Failed to upload image');</script>";
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>
    <h1 class="text-center my-3">Add New Content</h1>
    <div class="container d-flex justify-content-center">
        <form action="" enctype="multipart/form-data" method="post" class="w-50">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Enter title" name="TITLE" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" class="form-control" placeholder="Enter Author" name="AUTHOR" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Context</label>
                <input type="text" class="form-control" placeholder="Enter Context" name="CONTEXT" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image:</label>
                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
            </div>
            <button  class="btn btn-dark " name="submit">Submit</button>
        </form>
    </div>
</body>

</html>