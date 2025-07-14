<?php
$username= "root";
$password= "";
$_server= "localhost";
$database= "mybudgettracker";
$con = mysqli_connect($_server,$username,$password,$database);
if(!$con)
{
    echo ("Connecion Failed");
}
// else
// {
//     echo("Connection Successful");
// }
?>