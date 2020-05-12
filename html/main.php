<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$servername = "db";
$username = "ami";
$password = "it635";
$dbname = "meds";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
	die("Error connecting to the Database: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT name, quantity FROM med_info WHERE id=?");
$id = $_GET["id"];
//$abbrev = $_GET["abbrev"];
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

print("<html>");
if ($result->num_rows > 0) {
	// output of each row
	while($row = $result->fetch_assoc()) {
		printf("<div>%s: %s</div>", $row["name"], $row["quantity"]);
	}
} else {
	print("<div>Warning: There was no medicine found with this input!</div>");
	print("<div>Try Again.</div>");
}
print("</html>");
$conn->close();

?>
