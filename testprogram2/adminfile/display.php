<?php 
include 'connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <title>Display & Edit</title>
</head>
<body>
    <div class="container my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Context</th>
                    <th scope="col">Image</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // select query
                $mysql = "SELECT * FROM touristspot";
                $result = mysqli_query($connection, $mysql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $number = $row['ID'];
                    $title = $row['TITLE'];
                    $author = $row['AUTHOR'];
                    $context = $row['CONTEXT'];
                    $image = $row['IMAGE'];
                    echo '<tr>
                        <th scope="row">' . $row['ID'] . '</th>
                        <td>' . $title . '</td>
                        <td>' . $author . '</td>
                        <td>' . $context . '</td>
                        <td><img src="img/' . $image . '" width="100" height="100" alt="Image"></td>
                        <td>
                            <a href="update.php?updateid=' . $number . '" class="btn btn-dark">Update</a>
                            <a href="delete.php?deleteid=' . $number . '" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
