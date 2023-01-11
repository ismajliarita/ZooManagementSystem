<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $fname = $data['fname'];
    $lname = $data['lname'];
    $email = $data['reg-email'];
    $password = $data['reg-pass'];

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