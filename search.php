<?php

$LastName = "";
$FirstName = "";
$email ="";
$sql = "";
if (isset($_POST['searchlastname']))
{
    $LastName =  $_POST['searchlastname'];
    $sql = "Select * from userinfo where lastname='" .$LastName . "';";
}
else if (isset($_POST['searchfirstname']))
{
    $FirstName = $_POST['searchfirstname'];
    $sql = "Select * from userinfo where firstname='" .$FirstName . "';";
}
else if (isset($_POST['searchemail']))
{
    $email = $_POST['searchemail'];
    $sql = "Select * from userinfo where email='" .$email . "';";
}

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
    
   // $sql = "Select * from userinfo where LastName = '" .$LastName ."';";

    $query = mysqli_query($connection, $sql);
    if ($query)
    {
            echo " search query okay for lastname ".$LastName;

            //fetch row if success
            echo "
            <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Gender</th>
                </tr>
            </thead> 
            <tbody>
            ";

           while ($row = mysqli_fetch_row($query))
           {
               printf("     
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                    </tr>",  
                    $row[1], $row[2], $row[3],$row[5],$row[6]);
           }
           echo "</tbody>
           </table>";

           mysqli_free_result ($query);
           mysqli_close($connection);


    }
    else
    {
            echo "mysql_query error - couldn't search signup table";
    }
    
    ?>