<?php
$connection = mysqli_connect("localhost","root","","mdqtourist");
if(!$connection){
    die(mysqli_error("error" + $connection));
}
?>