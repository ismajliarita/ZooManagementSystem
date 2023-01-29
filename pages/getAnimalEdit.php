<?php
$con = mysqli_connect("localhost", "root", "", "zoo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "SELECT * FROM animals WHERE id=$id";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$type = $row['type'];
$age = $row['age'];
$description = $row['description'];
$habitat = $row['habitat'];

echo <<<"EOD"
    <ul>
        <li>$name</li>
        <li>$type</li>
        <li>$age</li>
        <li>$description</li>
        <li>$habitat</li>
    </ul>
EOD;


mysqli_close($con);



?>