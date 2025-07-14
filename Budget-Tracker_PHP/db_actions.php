<?php
include "config.php";
function save_user($username,  $email, $hash_password, $gender, $status){
    global $con;

    $stmt = $con->prepare("INSERT INTO users (username,  email, password, gender, status) VALUES (?,?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username,  $email, $hash_password, $gender, $status);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "<div class='alert alert-danger'>MySQL Error: " . $stmt->error . "</div>";
        return false;
    }
}

function save_income($username,$title,$description,$amount,$cr_date,$month,$year)
{
    global $con;
    $query = "INSERT INTO `incomes`( `username`, `title`, `description`, `amount`, `cr_date`, `month`, `year`) VALUES ('$username','$title','$description','$amount','$cr_date','$month','$year')";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
      return false;
    }else{
        return true;
    }
}
function save_expense($username,$title,$description,$amount,$cr_date,$month,$year)
{
    global $con;
    $query = "INSERT INTO `expenses`( `username`, `title`, `description`, `amount`, `cr_date`, `month`, `year`) VALUES ('$username','$title','$description','$amount','$cr_date','$month','$year')";
    $result = mysqli_query($con,$query);
    if(!$result)
    {
      return false;
    }else{
        return true;
    }
}
function view_incomes($username)
{
 global $con;
 $query ="SELECT * FROM `incomes` WHERE username='$username'";   
  return $result = $con->query($query); 
}
function view_expenses($username)
{
    global $con;
    $query = "SELECT * FROM `expenses` WHERE  username='$username'";
     return $result = $con->query($query);
}
function update_income($id,$username,$title,$description,$amount,$cr_date,$month,$year)
{
    global $con;
  $query ="UPDATE `incomes` SET `username`='$username',`title`='$title',`description`='$$description',`amount`='$$amount',`cr_date`='$$cr_date',`month`='$month',`year`='$$year' WHERE id=$id";
 return $result=mysqli_query($con,$query);
}
function update_expense($id,$username,$title,$description,$amount,$cr_date,$month,$year)
{
    global $con;
  $query ="UPDATE `expenses` SET `username`='$username',`title`='$title',`description`='$$description',`amount`='$$amount',`cr_date`='$$cr_date',`month`='$month',`year`='$$year' WHERE id=$id";
 return $result=mysqli_query($con,$query);
}
function delete_expense($username, $id)
{
    global $con;
    $username = mysqli_real_escape_string($con, $username);
    $id = intval($id); // Make sure it's an integer

    $query = "DELETE FROM `expenses` WHERE username = '$username' AND id = $id";
    return $result= $con->query($query);
}

function delete_income($username, $id)
{
    global $con;
    $username = mysqli_real_escape_string($con, $username);
    $id = intval($id);

    $query = "DELETE FROM `incomes` WHERE username = '$username' AND id = $id";
    return $result=$con->query($query);
}
function isValidUser($username, $password)
{
    global $con;
    
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true;
        }
    }

    return false;
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
}
function savings($username)
{
    global $con;
   $query="SELECT u.username,
    IFNULL(SUM(i.amount),0) AS Total_income,
    IFNULL(SUM(e.amount),0) AS Total_expense, 
    IFNULL(SUM(i.amount),0) - IFNULL(SUM(e.amount),0) AS Savings
    FROM users u
 LEFT JOIN incomes i ON u.username = i.username
  LEFT JOIN expenses e ON u.username = e.username
   WHERE u.username='$username'
    GROUP BY u.username;";
    return $result =$con->query($query); 
}
function Summary($username)
{
    global $con;
    $query ="SELECT u.username ,
     MONTH(i.cr_date) AS Month,
      YEAR(i.cr_date) AS YEAR,
       IFNULL(SUM(i.amount),0) AS Total_income,
        IFNULL(SUM(e.amount),0) AS Total_expenses
         FROM users u 
         LEFT JOIN incomes i ON u.username = i.username 
         LEFT JOIN expenses e ON u.username = e.username
          WHERE u.username='$username' 
          GROUP BY u.username,MONTH(i.cr_date),YEAR(i.cr_date);";
          return $result=$con->query($query);
}

?>