<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "webdev";
$con = mysqli_connect($host, $username, $password, $db_name);

$userID = $_GET["userID"]; // Corrected variable name

$sql = "DELETE FROM registration WHERE `user_id` = '$userID' LIMIT 1";
$delete = mysqli_query($con, $sql);

if ($delete) {
    // Return a success response as JSON
    $response = array('message' => 'User deleted successfully');
    echo json_encode($response);
} else {
    // Return an error message as JSON
    $response = array('error' => 'Failed to delete user Info');
    echo json_encode($response);
}
?>
