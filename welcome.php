<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-4 rounded shadow-sm">
                <h2 class="text-center mb-4">Login</h2>
                <?php
                if (isset($_GET['register'])  && $_GET['register'] == "success") {
                ?>

                    <div id="successMessage" class="alert alert-success">
                        Registration Successfull now you can login
                    </div>
                    <script>
                        setTimeout(() => {
                            let msg = document.getElementById("successMessage")
                            if (msg) {
                                msg.style.display = 'none'
                            }
                        }, 2000);
                    </script>
                <?php
                }
                ?>


                <form method="POST" action="login.php">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                 
                    <button type="submit" class="btn btn-success w-100">Login</button>
                    <p class="text-center mt-3">Don't have an account? <a href="./authentication/register.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>