
<?php
include_once"session.php"; // Always start the session first
include_once "db_actions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (isValidUser($username, $password)) {
        // Optional: fetch more user data (like email) if needed
        $_SESSION['user'] = [
            'username' => $username,
            // 'email' => $email, // you can fetch from DB if needed
        ];

        header("Location: index.php");
        exit;
    } else {
        echo "<div class='alert alert-danger text-center'>Invalid username or password</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
   <div style="background-image: url(login1.jpg); background-size:cover; background-position: center;" class="container vh-100 d-flex justify-content-center align-items-center">
<div class="card shadow p-4" style="max-width: 500px; width:80%;height: 60%;">
    <form action="index.php?login=1" method="post">
        <div class="col-6 offset-sm-3">
            <h1 style="text-align: center;">Log In</h1>
        </div>
        <div class="mb-4">
            <label for="Username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>
        <div>
        <button type="submit"  name="login" class="btn btn-success form-control">Login</button>
        </div><br>
        <div class="mb-4" style="text-align: center;">
            <p>Dont't have an account <a href="?signup=true">Signup</a></p>
        </div>
    </form>
</div>
   </div> 
</body>
</html>
