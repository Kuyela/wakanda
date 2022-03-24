<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$date = $_POST['date'];
    $time = $_POST['time'];
    $hair = $_POST['hair'];
    

    // Database connection
    $servername = "localhost";
    $username = "username";
    $password = "";
    $dbname ="wakanda1";
    $port ="3306";

	$conn = new mysqli($servername, $username, $password, $dbname, $port);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    } 
    else {
		$stmt = $conn->prepare("insert into gracious(firstName, lastName, email, date, time,hair) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssis", $firstName, $lastName, $email, $date, $time, $hair);
		$execval = $stmt->execute();
		echo $execval;
		echo "booked successfully, we will email you for approval...";
		$stmt->close();
		$conn->close();
	}
?>