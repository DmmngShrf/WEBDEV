<?php
include '../Connection/dbconn.php';

$userID = $_GET["userID"];
$email = $_GET["userEmail"];
$username = $_GET["username"];

$sql = "UPDATE `registration` SET `email` = '$email', `username` = '$username' WHERE `user_id` = '$userID'";

$update = mysqli_query($connection, $sql);

if ($update) {
    $sql = "SELECT * FROM registration";
    $selectAll = mysqli_query($connection, $sql);

    if (mysqli_num_rows($selectAll) != 0) {
        $users = array();
        while ($row = mysqli_fetch_array($selectAll)) {
            array_push($users, $row);
        }
        $result = json_encode(array("success" => true, "message" => "User updated successfully", "data" => $users));
        echo $result;
    }
} else {
    $result = json_encode(array("success" => false, "message" => "Failed to update user info"));
    echo $result;
}
?>