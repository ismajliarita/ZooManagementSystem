<?php
    // $data = json_decode(file_get_contents('php://input'), true);
    // parse_str($_POST, $data);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['reg-email'];
    $password = $_POST['reg-pass'];

    // $sql = "INSERT INTO User(, surname, email, password)
	// VALUES ('$fname', '$lname', '$email', '$password')";
    $sql = "INSERT INTO users(fname, lname, email, pass) VALUES ('$fname', '$lname', '$email', '$password')";

    // Create connection
    $conn = mysqli_connect("localhost","root","","zoo");
    // Check connection
	if (!$conn) {
		die("Could not connect: " . mysqli_connect_error());
	}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // collect value of input field
        // $fname = $_REQUEST['fname'];
        echo "good";
        $result = mysqli_query($conn, "SELECT * FROM users");
        
        if (empty($email)) {
            echo "data is empty";
        } else {
            echo $email;
			while($row = mysqli_fetch_assoc($result)) {
				echo $row["fname"]." ".$row["lname"]." ".$row["email"]." ".$row["pass"]."<br>";
			}
    	}
	}

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {

        mysqli_query($conn, $sql);
    // }

	mysqli_close($conn);
?>