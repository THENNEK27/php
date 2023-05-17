<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
    $number=$_GET['deleteid'];

    $sql="delete from `touristspot` where ID=$number";
    $result = mysqli_query($connection,$sql);
    if($result){
        //echo "Deleted succesfully";
        header('location:display.php');
    }else{
        die(mysqli_error($connection));
    }
}
?>
