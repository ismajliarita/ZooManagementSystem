<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="text" name="type">
    <input type="number" name="age">
    <input type="text" name="description">
    <input type="text" name="habitat">
	<input type="file" id="detail-docs" name="lmao[]" multiple />
    <input type="submit" value="Submit" name="upload">
</form>
<?php
if (isset($_POST['upload'])) {
    echo $_POST['edon'];
    foreach ($_FILES['lmao']['name'] as $id => $val) {
        // Get files upload path
        echo '<h1>'.$_FILES['lmao']['name'][$id].'</h1>';
        $tempLocation = $_FILES['lmao']['tmp_name'][$id];

    }
}

?>
</body>
</html>