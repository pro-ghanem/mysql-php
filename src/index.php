<?php
echo "Inside K8s with MySQL <br>";
$conn = new mysqli("mysql", "db_user","ghanem");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo $row['name']."<br>";
	}
} else {
	echo "0 results";
}
// Create database
$sql = "CREATE DATABASE my_db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
    


// Check connection
$conn = new mysqli("mysql", "db_user","ghanem","my_db");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

  

$sql = "INSERT INTO my_db (firstname, lastname, email)
VALUES ('ahmed', 'ghanem', 'pro.ahmedghanem@gmail.com')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
