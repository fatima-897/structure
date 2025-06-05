<?php 
include ('./include/header.php');
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: ./authentication/login.php");
    exit();
    
}
$user = $_SESSION['user'];

if(!isset($_SESSION['role']))
{
    header("Location: ./authentication/login.php");
    exit();
}
$role = $_SESSION['role'];

if ($role === "admin") {
    header("Location: admin/admin.php");
    exit();
} elseif($role === "editor") {
    header("Location: editor/editor.php");
    exit();
} elseif($role === "user") {
    header("Location: user/user.php");
    exit();
}else{
?>
<p class="alert alert-warning text-capitalize fs-4">User is not defined</p>
<a href="./authentication/logout.php" class="btn btn-danger btn-sm">logout</a>

<?php
}
include ('./include/footer.php')
?>