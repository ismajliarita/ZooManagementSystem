
<?php
$today = '2022-06-30 19:20:13';
// echo $today;
$date = '2022-06-30 00:00:00';
// $date = $date + '0000-00-00 00:00:10';
$newDate = date('Y-m-d H:i:s', strtotime($date . ' + 3 hours'));

if(strtotime($today) > strtotime($date)){
}
else {
    // echo $newDate;
}


$id = $_GET['id'];
$sql = '';
$con = mysqli_connect("localhost", "root", "", "zoo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if($_GET['vet'] == '1'){
    $vet = $_GET['vet'];
    $sql = "UPDATE animals SET vet_help = (case when vet_help = 0 then 1 else 0 end) WHERE id=$id";
}
if($_GET['food'] == '1'){
    $now = date('Y-m-d H:i:s', time());
    $sql = "UPDATE animals SET food_time = '$now' WHERE id=$id";
    
}
if($_GET['water'] == '1'){
    $now = date('Y-m-d H:i:s', time());
    $sql = "UPDATE animals SET water_time = '$now' WHERE id=$id";
}
if($_GET['clean'] == '1'){
    $clean = $_GET['clean'];
    $sql = "UPDATE animals SET clean_time = (case when clean_time = 0 then 1 else 0 end) WHERE id=$id";
}

mysqli_query($con, $sql);
mysqli_close($con);

echo 'Finished';

?>