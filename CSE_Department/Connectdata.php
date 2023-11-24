<?php
$host="localhost";
$user="root";
$pass="";
$db="cse_department";
$conn=new mysqli($host, $user, $pass, $db);

if($conn->connect_errno)
{
    die("Error :".$conn->connect_errno);
    
}
 else {
    
}
?>

