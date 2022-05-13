

<?php


///////////////////////////////////// Start Session /////////////////////////////////////

session_start();

if (isset($_POST['submit']))
{
     
    $_SESSION['loginEmail']=$_POST['loginEmail'];
    $_SESSION['loginPassword']=$_POST['loginPassword'];
    $adminEmail_correct=true;
    $adminPass_correct=true;

    foreach ($_SESSION['array'] as $arr) 
    {


        ///////////////////////////////////// email /////////////////////////////////////
      
            if($_SESSION['loginEmail']==($arr['Email']||'saj@gmail.com'))
            {
                $loginEmail_result="<span style=' color:#99B898'>your email is correct</span><br>";
                $loginEmail_correct=true;
            }
            
            else
            {
                $loginEmail_result="<span style=' color:#FF847C'>your email is incorrect</span><br>";
                $loginEmail_correct=false;
            }
        



        ///////////////////////////////////// password /////////////////////////////////////
    
            if($_SESSION['loginPassword']==$arr['Password'])
            {
                $loginPassword_result="<span style=' color:#99B898'>Correct Password</span>";
                $loginPassword_correct=true;
            }
            
            else
            {
                $loginPassword_result="<span style=' color:#FF847C'>Incorrect Password</span>";
                $loginPassword_correct=false;
            }
        }
    

    if($loginEmail_correct && $loginPassword_correct)
        header('location:welcome.php');

    else

    echo 'Incorrect Information'; 
     



    ///////////////////////////////////// admin ///////////////////////////////////// 

    if($_SESSION['loginEmail']=="saj@gmail.com")
    {
		if($_SESSION['loginPassword']== "Sajaz-02")
        {
            $loginEmail_result="<span style= 'color:#99B898'> your email is correct </span><br>";
			$adminEmail_correct=true;
			$adminPass_correct=true;
	
		}
        
        else
        {
			$loginPassword_result="<span style= 'color:#FF847C'> your password is incorrect </span><br>";
	    	$adminPass_correct=false;
		}


	}
    
    else
    {
		$loginEmail_result="<span style= 'color:#FF847C'>Incorrect Email </span><br>";
		$adminEmail_correct=false;
	}

	if ($adminEmail_correct && $adminPass_correct )
    {
		header('location:admin.php');
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>

</head>
<body>

    <div class="container">
        <form method="post">
            <div>


                <h1 class="login">Login</h1>
                <p class="wlcm">Welcome back! Login with your credentials</p>


                <!--*********Email*********-->
                <label for="logEmail">Email</label>
                <br>
                <input type="email" name="loginEmail" class="login-form" placeholder="Email" required>
                <?php if(isset($loginEmail_result)){echo $loginEmail_result;}?>
                <br>



                <!--*********Password*********-->
                <label for="logpassword">Password</label>
                <br>
                <input type="password" name="loginPassword" placeholder="Password" required class="login-form">
                <?php if(isset($loginPassword_result)){echo $loginPassword_result;}?>
                <br>
                <br>



                <!--*********Submit Button*********-->
                <input type="submit" value="Submit" name="submit">
                <div class="text">Don't have an account? <a href="signup.php">Sign Up</a></div>
                <button type="reset" class="btn btn-light btn-lg">Reset all</button>


            </div>
        </form>
       
    </div>

</body>
</html>