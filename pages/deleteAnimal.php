<?php 
$con = mysqli_connect("localhost", "root", "", "zoo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "DELETE FROM images WHERE animal_id=$id";
mysqli_query($con, $sql);
$sql2 = "DELETE FROM animals WHERE id=$id";

if(mysqli_query($con, $sql2) == TRUE){
    echo 'Finished';
}
else{
    echo 'No Finish';
}
mysqli_close($con);

?>