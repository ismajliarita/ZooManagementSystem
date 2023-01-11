<?php
    parse_str($_POST, $data);
    $fname = $data['fname'];
    $lname = $data['lname'];
    $email = $data['reg-email'];
    $password = $data['reg-pass'];

    $sql = "INSERT INTO user(fname, lname, email, pass) VALUES ('$fname', '$lname', '$email', '$password')";

    // Create connection
    $conn = mysqli_connect("localhost","root","","zoo");
    // Check connection
	if (!$conn) {
        echo "eror";
		die("Could not connect: " . mysqli_connect_error());
    }
    else{
        echo "good";
        $result = mysqli_query($conn, "SELECT * FROM user");
        
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["fname"]." ".$row["lname"]." ".$row["email"]." ".$row["pass"]."<br>";
        }
    }

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {

        mysqli_query($conn, $sql);
    // }

	mysqli_close($conn);
?>