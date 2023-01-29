<?php
if (isset($_POST['upload'])) {

    $con = new mysqli("localhost", "root", "", "zoo");
    if ($con->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST['addName'];
    $type = $_POST['addType'];
    $age = $_POST['addAge'];
    $description = $_POST['addDescription'];
    $habitat = $_POST['addHabitat'];
    $sql = "INSERT INTO animals (`name`, `type`, `age`, `description`, `habitat`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    // Bind the values to the statement
    $stmt->bind_param("ssiss", $name, $type, $age, $description, $habitat);

    // Execute the statement
    $stmt->execute();
    // if ($con->query($sql) === TRUE) {
    //     $sql2 = "INSERT INTO `images` (`url`, `animal_id`)edit- VALUES ('dsfsdf', $lastId);";
    // }

    $lastId = $con->insert_id;
    $stmt->close();



    foreach ($_FILES['photos']['name'] as $id => $val) {
        // Get files upload path
        $fileName = $_FILES['photos']['name'][$id];
        $file_tmp = $_FILES['photos']['tmp_name'][$id];
        if ($fileName != '') {
            $path = "./../images/" . $fileName;
            move_uploaded_file($file_tmp, $path);


            $stmt2 = $con->prepare("INSERT INTO images (`url`, `animal_id`) VALUES (?, ?)");
            $stmt2->bind_param("si", $path, $lastId);
            $stmt2->execute();
            $stmt2->close();
        }
    }
    $con->close();

    $newURL = './viewAnimal.php?id=' . $lastId;
    header("Location: " . $newURL);
}
