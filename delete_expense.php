<?php
include_once "db_actions.php";
include_once "session.php";
if(isset($_GET['delete_expenseid']))
{
 $id = $_GET['delete_expenseid'];
 $username = $_SESSION['user']['username'];
 $result=delete_expense( $username,$id);
 if($result)
 {
    header("location:view_expense.php");
 }else{
    die (mysqli_error($con));
 }
}
?>