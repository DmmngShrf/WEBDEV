<?php
session_start();
include "../Connection/dbconn.php";

// if (isset($_SESSION['user_id'])) {
//     header("Location: admin/dashboard.php");
// }

// if (isset($_POST['login'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $password = md5($password);
//     $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
//     $select = mysqli_query($con, $sql);

//     if (mysqli_num_rows($select) != 0) {
//         $user = mysqli_fetch_array($select);
//         $_SESSION['user_id'] = $user['id'];
//         header("Location: admin/dashboard.php");
//     } else {
//         echo "Failed to login";
//     }
// }



//

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $sql = "SELECT * FROM `registration` WHERE username = '$username' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        // Redirect with a parameter to indicate success
        header("Location: ../Dashboard/dashboard.php?success=1");
        exit();
    } else {
        // Redirect with a parameter to indicate failure
        header("Location: login.php?error=1");
        exit();
    }
} else {
    echo "Login form submission error.";
}

$connection->close();
?>