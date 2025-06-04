<?php
include('./include/header.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "user") {
    header("Location: ./welcome.php");
    exit();
}

$username = $_SESSION['user'] ?? 'Guest';
$id = $_SESSION['id'] ?? 'N/A';
$role = $_SESSION['role'] ?? 'N/A';
?>

<div class="container mt-4">
<div class="d-flex">
<h1 class="">User Dashboard</h1>
<a href="./authentication/logout.php" class="btn btn-outline-danger align-self-end offset-md-7">log out</a>
</div>
    <div class="card text-dark mb-3" style="max-width: 40rem;">
        <div class="card-header bg-primary text-light text-capitalize fw-bold">Welcome, <?php echo $username ?> !</div>
        <div class="card-body">
            <h5 class="card-title"> <strong> User ID: </strong><?php echo $_SESSION['id'] ?></h5>
            <p class="card-text"> <strong>Username</strong> <?php echo $username ?> </p>
            <p class="card-text text-capitalize"><strong> Role: </strong><span class="badge text-bg-primary"><?php echo $role ?></span></p>
        </div>
    </div>
</div>
<?php
include('./include/footer.php')
    ?>