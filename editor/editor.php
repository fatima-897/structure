<?php
include('./authentication/db.php'); 
include('./include/header.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "editor") {
    header("Location: welcome.php");
    exit();

}

$username = $_SESSION['user'] ?? 'Guest';
$id = $_SESSION['id'] ?? 'N/A';
$role = $_SESSION['role'] ?? 'N/A';

?>
<h1>Editor Dashboard</h1>
<div class="container mt-4">
    <div class="card text-dark mb-3" style="max-width: 22rem;">
        <div class="card-header">Editor Information</div>
        <div class="card-body">
            <h5 class="card-title">Welcome: <?php echo $username ?> !</h5>
            <p class="card-text"><strong>User ID:</strong> <?php echo $id ?></p>
            <p class="card-text text-capitalize"><strong>Role: </strong><?php echo $role ?></p>
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
                            <td><a href='edit_user.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<a href="./authentication/logout.php" class="btn btn-sm btn-danger">log out</a>
<?php
include('./include/footer.php')
    ?>