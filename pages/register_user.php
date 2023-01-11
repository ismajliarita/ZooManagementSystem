<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // $sql = "INSERT INTO User(, surname, email, password)
	// VALUES ('$fname', '$lname', '$email', '$password')";

    // Create connection
    $conn = mysqli_connect("localhost","root","");
    // Check connection
	if (!$conn)
		die("Could not connect: " . mysqli_connect_error());

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // collect value of input field
        // $fname = $_REQUEST['fname'];
        
        if (empty($email)) {
            echo "data is empty";
        } else {
            echo $email;
        }
    }

	mysqli_close($conn);
?>