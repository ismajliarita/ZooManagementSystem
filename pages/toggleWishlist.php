<?php

$conn = mysqli_connect("localhost", "root", "", "zoo");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_GET['user'];
$animal_id = $_GET['animal'];


$sql1 = "INSERT INTO wishlist(`user_id`, `animal_id`) VALUES ($user_id, $animal_id)";
$sql2 = "DELETE FROM wishlist WHERE user_id = $user_id AND animal_id = $animal_id";
$sql3 = "SELECT * FROM wishlist WHERE user_id = $user_id AND animal_id = $animal_id";

$check = mysqli_query($conn, $sql3);

// mysql_num_rows($check)==0

if(mysqli_num_rows($check)>0){
    $delete = mysqli_query($conn, $sql2);
    if($delete){
        echo 'Finished';
    }
}else{
    $add = mysqli_query($conn, $sql1);
    if($add){
        echo 'Finished';
    }
}





mysqli_close($conn);

?>