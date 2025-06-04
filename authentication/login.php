<?php

include ('./authentication/db.php');
include ('./include/header.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role  = $_POST['role'];

    if (!empty($username) && !empty($password)) {

      $sql = "SELECT * from users where username = '$username'";

      $result = $conn->query($sql);

      if ($row = $result->fetch_assoc()) {
        if(password_verify($password ,$row['password'])){
        $_SESSION['user'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['id'];

       header("Location: ./welcome.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Error: incorrect password</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Error: user not found</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please enter username and password</div>";
    }
}


include ('./include/footer.php')
?>