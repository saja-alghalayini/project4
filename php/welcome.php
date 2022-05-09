

<?php


      ///////////////////////////////////// Start Session /////////////////////////////////////

      session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>

    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>

    <div class="user-welcome">

        <h2> Welcome <?php echo$_SESSION['firstName'] ." ". $_SESSION['familyName']; ?></h2>

        <p class="text-center"> That's your email: <?php echo $_SESSION['email']; ?> 
        <?php echo '<br>'; ?>
        your phone number: <?php echo $_SESSION['phoneNumber']; ?> </p>


    </div>
</video>
</body>
</html>