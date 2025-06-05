<?php 
include '../authentication/db.php'; 
include '../include/header.php';
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] !== "admin" ){
    header("Location: ../login.php");
    exit();
}

$sql = "SELECT role, COUNT(*) as count FROM users GROUP BY role";
$result = $conn->query($sql);

$counts = [
    'admin' => 0,
    'editor' => 0,
    'user' => 0,
];

// Fetch counts into the array
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $role = $row['role'];
        $counts[$role] = $row['count'];
    }
}

$username = $_SESSION['user'];
$id = $_SESSION['id'];
$role = $_SESSION['role'] ;

?>
<h1>Admin Dashboard</h1>
<div class="container mt-4">
    <div class="card text-dark mb-3" style="max-width: 22rem;">
        <div class="card-header">Admin Information</div>
        <div class="card-body">
            <h5 class="card-title">Welcome: <?php echo $username ?> !</h5>
            <p class="card-text"><strong>User ID:</strong> <?php echo $id ?></p>
            <p class="card-text text-capitalize"><strong>Role: </strong><?php echo $role ?></p>
        </div>
    </div>
</div>

<!-- Counting Roles -->

<div class="container mt-4">
    <h2>Dashboard Summary</h2>
    <div class="row">

        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Admins</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['admin']; ?></h5>
                    <p class="card-text">Total Admin Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Editors</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['editor']; ?></h5>
                    <p class="card-text">Total Editor Users</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $counts['user']; ?></h5>
                    <p class="card-text">Total Regular Users</p>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- User Table -->
<div class="container mt-4">
    <h2>All Users</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM users";
            $result = $conn->query($query);

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['role']}</td>
                            <td><a href='./editor/editor.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<a href="../authentication/logout.php" class="btn btn-sm btn-danger">log out</a>
<p></p>
<?php 
include ('../include/footer.php')
?>