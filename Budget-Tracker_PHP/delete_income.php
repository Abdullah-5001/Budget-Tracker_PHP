<?php
include_once "session.php";
include_once "db_actions.php";
if(isset($_GET['delete_incomeid']))
{
 $id = $_GET['delete_incomeid'];
 $username = $_SESSION['user']['username'];
 $result=delete_income( $username,$id);
  if($result)
 {
    header("location:view_income.php");
 }else{
    die (mysqli_error($con));
 }
}
?>