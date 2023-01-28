<?php 
$con = mysqli_connect("localhost", "root", "", "zoo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "DELETE FROM animals WHERE id=$id";

if(mysqli_query($con, $sql) === TRUE){
    echo 'Finished';
}
else{
    echo 'No Finish';
}
mysqli_close($con);

?>