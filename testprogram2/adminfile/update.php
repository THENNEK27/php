<?php 
include "connect.php";
$id=$_GET['updateid'];
if (isset($_POST['submit'])){
    $title = $_POST["TITLE"];
    $author = $_POST["AUTHOR"];
    $context = $_POST["CONTEXT"];

    //insert query
    $mysql="update `touristspot` set ID = '$id',title='$title',author='$author',context='$context' where ID=$id";
    $result = mysqli_query($connection,$mysql);

    if($result){
        //echo"updated success";
        header('location:display.php');

    }else{
        die(mysqli_error($connection));

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
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" class="form-control"
             placeholder="Enter title" name="TITLE" autocomplete="off">
        </div>
        <div class="mb-3">
            <label  class="form-label">Author</label>
            <input type="text" class="form-control"
             placeholder="Enter Author" name="AUTHOR" autocomplete="off">
        </div>
        <div class="mb-3">
            <label  class="form-label">Context</label>
            <input type="text" class="form-control"
             placeholder="Enter Context" name="CONTEXT" autocomplete="off">
        </div>
        <button class="btn btn-dark " name="submit" >Update</button>
        </form>
    </div>
</body>
</html>
