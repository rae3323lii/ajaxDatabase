<?php 
//    $formdata = explode('&', $_POST['data']);
//     var_dump( $formdata);

     $formdata = explode('&',$_POST['data']);
     parse_str($_POST['data'], $values);
     echo $values;

     foreach ($values as $key => $value)
        {echo " ".$key. " is ".$value.", ";}

// connecting to database

$server = 'localhost' ;
$username = 'Rae';
$password = 'moon1979';
$dbname = 'signup';

$connection = mysqli_connect($server,$username,$password,$dbname);

if (!$connection)
{
        echo "problem connecting";
}
else
{
        echo "connceted successfully";
}

$encryptedPassword =password_hash($values['password'],PASSWORD_BCRYPT);

$sql = "Insert Into userinfo(FirstName, LastName, email, password,Tel,gender) 
        values ('"
        .$values['FirstName']. "', '"
        .$values['LastName']. "', '"
        .$values['email']. "', '"
        .$encryptedPassword. "', '"
        .$values['tel']. "', '"
        .$values['gender']. "'); ";

$query = mysqli_query($connection, $sql);
if ($query)
{
        echo " 1 row inserted";
}
else
{
        echo "mysql_query error - couldn't insert to the signup table";
}

?>