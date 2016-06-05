<?php 

if(isset($_POST['e']) && isset($_POST['p']))
{
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

/// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO usuarios VALUES ('".$_POST['e']."', '".$_POST['p']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: /");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

var_dump($_POST);

?>