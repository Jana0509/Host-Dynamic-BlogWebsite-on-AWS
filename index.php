<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");  // Allow all domains to access (you can restrict this to a specific domain)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, OPTIONS methods
header("Access-Control-Allow-Headers: Content-Type"); // Allow the Content-Type header
$servername = "blogdb.cpiowmcgwhjt.ap-southeast-2.rds.amazonaws.com"; // RDS endpoint
$username = "admin"; // RDS username
$password = "admin123"; // RDS password
$dbname = "my_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT title, content FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output each blog post
  while($row = $result->fetch_assoc()) {
    echo "<h2>" . $row["title"]. "</h2><p>" . $row["content"]. "</p>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>