<?php

include './db.php';
include ('./include/header.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $id = $_POST['id'];

    $sql = "INSERT INTO users (username , password, role , id) values ('$username', '$password' , '$role', '$id')";

    $result = $conn->query($sql);

    if ($result) {
        header("Location: index.php?register=success");
    } else {
        echo "<div class='alert alert-danger>Error:  Registration failed</div>";
    }
}
?>