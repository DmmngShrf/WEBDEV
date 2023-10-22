<?php

include "../Connection/dbconn.php";


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['Email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        // Check if gender is set in the POST data
        if (isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        } else {
            $gender = ''; // Set a default value or handle it as needed
        }
    
        // TODO: Validate and sanitize user input

    $sql = "INSERT INTO `registration`(`user_id`, `first_name`, `last_name`, `gender`, `email`, `username`, `password`) VALUES
    ('$user_id', '$first_name', '$last_name', '$gender', '$email', '$username', '$password')";

    if ($connection->query($sql) === TRUE) {
        echo "Registered Successfully";
    } else {
        echo "Error: " . $connection->error;
    }
    $connection->close();
}


?>