<?php

$con = new mysqli("localhost", "root", "", "zoo");
if ($con->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];
$name = $_POST['addName'];
$type = $_POST['addType'];
$age = $_POST['addAge'];
$description = $_POST['addDescription'];
$habitat = $_POST['addHabitat'];

$sql = "UPDATE animals SET `name` = ?, `type` = ?, `age` = ?, `description` = ?, `habitat` = ? WHERE `id` = ?";
$stmt = $con->prepare($sql);

// Bind the values to the statement
$stmt->bind_param("ssisss", $name, $type, $age, $description, $habitat, $id);

// Execute the statement
$stmt->execute();
// if ($con->query($sql) === TRUE) {
//     $sql2 = "INSERT INTO `images` (`url`, `animal_id`)edit- VALUES ('dsfsdf', $lastId);";
// }

// $lastId = $con->insert_id;
$stmt->close();

foreach ($_FILES['photos']['name'] as $idi => $val) {
    // Get files upload path
    $fileName = $_FILES['photos']['name'][$idi];
    $file_tmp = $_FILES['photos']['tmp_name'][$idi];
    if ($fileName != '') {
        $path = "./../images/" . $fileName;
        move_uploaded_file($file_tmp, $path);


        $stmt2 = $con->prepare("INSERT INTO images (`url`, `animal_id`) VALUES (?, ?)");
        $stmt2->bind_param("si", $path, $id);
        $stmt2->execute();
        $stmt2->close();
    }
}
$con->close();

$newURL = './viewAnimal.php?id=' . $id;
header("Location: " . $newURL);

?>