<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "webdev";
$con = mysqli_connect($host, $username, $password, $db_name);

$userID = $_GET["userID"];

$sql = "SELECT * FROM `registration` WHERE `user_id` = '$userID'";

$edit = mysqli_query($con, $sql);

if ($edit) {
    if (mysqli_num_rows($edit) > 0) {
        $row = mysqli_fetch_assoc($edit);
        echo json_encode($row);
    } else {
        echo json_encode([]); // Return an empty array if the user is not found
    }
} else {
    echo json_encode(["error" => "Database error: " . mysqli_error($con)]);
}
?>
