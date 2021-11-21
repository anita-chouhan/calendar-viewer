<?php
/**
 *
 * @package     Demo
 *
 */

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/**
 * GET Events
 * Summary: Method to fetch all events from database
 * Output-Formats: [application/json]
 */
function getData(){}
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $alldata = array();	
  while($row = $result->fetch_assoc()) {
    // Convert data to required format
  	$row['start'] = date(DATE_ISO8601, strtotime($row['start']));
  	$row['end'] = date(DATE_ISO8601, strtotime($row['end']));
  	$row['description'] = date(DATE_ISO8601, strtotime($row['blurb']));
    $row['className'] = 'red';
    $row['rendering'] = 'background';
    $row['backgroundColor'] = 'green';
    array_push($alldata, $row);
  }
} 
$conn->close();

echo json_encode($alldata);
?>