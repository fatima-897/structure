<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-4 rounded shadow-sm">
            <h2 class="text-center mb-4">Register</h2>
            <form method="POST" action="register_process.php">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select"  required>
                            <option  value="" selected disabled>-- Select the role --</option>
                            <option value="admin">admin</option>
                            <option value="editor">editor</option>
                            <option value="user">user</option>
                        </select>

                    </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <p class="text-center mt-3">Already have an account? <a href="index.php">Login</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>