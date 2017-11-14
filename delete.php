<?php

$LastName = "";
$FirstName = "";
$email ="";
$sql = "";
if (isset($_POST['searchlastname']))
{
    $LastName =  $_POST['searchlastname'];
    $sql = "Delete  from userinfo where lastname='" .$LastName . "';";
}
else if (isset($_POST['searchfirstname']))
{
    $FirstName = $_POST['searchfirstname'];
    $sql = "Delete  from userinfo where firstname='" .$FirstName . "';";
}
else if (isset($_POST['searchemail']))
{
    $email = $_POST['searchemail'];
    $sql = "Delete  from userinfo where email='" .$email . "';";
}
//echo $sql;
$server = 'localhost' ;
$username = 'Rae';
$password = 'moon1979';
$dbname = 'signup';

$connection = mysqli_connect($server,$username,$password,$dbname);

if (!$connection){
    echo "problem connecting";
} 
else {
    //echo "connected successfully, ";
}

$query = mysqli_query($connection, $sql);

if ($query){
    echo "Records Deleted: " . mysqli_affected_rows($connection);
   
    mysqli_close($connection);
} else {
    echo "mysql_query error - couldn't delete rows from signup table";
    mysqli_close($connection);
}

?>