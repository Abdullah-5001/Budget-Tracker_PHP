
<?php
include_once "session.php";
include_once "db_actions.php";
if(isset($_POST['signup']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $status ="active";
    try{
        $hash_password=password_hash($password,PASSWORD_DEFAULT);
        $result = save_user($username,$email,$hash_password,$gender,$status);
        if($result)
        {
            $_SESSION['user']=['username'=>$username,'email'=>$email];
            header("location:\DemoWebsite\index.php");
            exit();
        }
        else{
            echo "user not saved";
        }
    }catch(Exception $e)
    {
        echo " An error occured". $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
   <div style="background-image:url(register.jpg);background-size:cover; background-position:center;" class="container vh-100 d-flex justify-content-center align-items-center">
<div class="card shadow p-4 "style="max-width:500px; width:100%; height:90%;">
<div class="col-6 offset-sm-3 heading"><h1 style="text-align: center; box-sizing:border-box">Sign up</h1></div>
<form action="registeration.php" method="post" >
    <div class="sm-3 margin-bottom-15">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" name="username" placeholder="Enter Username"><br>
    </div>
     <div class="sm-3 margin-bottom-15" >
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email"><br>
    </div>
     <div class="sm-3 margin-bottom-15">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password"><br>
    </div>
    <label for="Gender" class="form-label">Gender</label>
    <div class="sm-3 margin-bottom-15">
   <select class="form-select" name="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
  <option value="To be discovered">To be discovered</option>
</select><br>
</div>
    <div class="sm-3 margin-bottom-15">
    <button type="submit" name="signup" class="form-control btn-primary w-100" >Sign Up</button></div>
    <div style="text-align: center;" class="sm-3 margin-bottom-15"><br>
        <p>Already have an account? <a href="?login=true">Log In</a></p>
    </div>
    </div>
</form>
</div>
</body>
</html>
