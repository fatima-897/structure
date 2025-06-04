<?php
include('./include/header.php');
include('./authentication/db.php'); 
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "editor") {
    header("Location: ./welcome.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    $updateQuery = "UPDATE users SET username='$username', role='$role' WHERE id=$id";
    if ($conn->query($updateQuery)) {
        echo "<div class='alert alert-success'>User updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to update user</div>";
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userQuery = "SELECT * FROM users WHERE id = $id";
    $userResult = $conn->query($userQuery);
    $user = $userResult->fetch_assoc();
}
?>

<div class="container mt-4">
    <h2>Edit User</h2>
    <form method="post" action="edit_user.php">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" <?php if ($user['role'] === 'admin') echo 'selected'; ?>>Admin</option>
                <option value="editor" <?php if ($user['role'] === 'editor') echo 'selected'; ?>>Editor</option>
                <option value="user" <?php if ($user['role'] === 'user') echo 'selected'; ?>>User</option>
            </select>
        </div>
        <a href="editor.php" type="submit" class="btn btn-primary">Update User</a>
        <a href="editor.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php
include('./include/footer.php');
?>