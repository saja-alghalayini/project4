

<?php

session_start();
setCookie('FirstName', date("m/d/y"), 60*24*60*60+time());

?>


<!DOCTYPE html>
<html lang="en">
<head
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title> Admin Page </title>
    
    
</head>
<body>
    <h2 class="text-center admin-h1"> Welcome Admin </h2>
    <h3> That's a table contains registers information :</h3>
    
      
    <table class="table table-striped admin-table">

        <thead>

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Created Date</th>
                <th scope="col">Last Login Date</th>
            </tr>

        </thead>


        <tbody>
                <?php
                     $reg= 1;
                     foreach ($_SESSION['array'] as $arr) 
                    {
                         echo 
                         "<tr>
                            <td>".$reg."</td>
                            <td>".$table['First Name']." </td>
                            <td>".$table['Email']." </td>
                            <td>".$table['Password']." </td>
                            <td>".$table['Create Date']." </td>
                            <td>".$_COOKIE['FirstName']." </td>

                         </tr>";
                        
                         $reg++;
                         
                    }

                     ?>
           
        </tbody>
    </table>
</body>
</html>