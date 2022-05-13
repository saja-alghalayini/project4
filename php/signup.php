

<?php


      ///////////////////////////////////// Start Session /////////////////////////////////////

session_start();

$name_regex="/^([a-zA-Z' ]+)$/";

$email_regex="/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9]
              (?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";

$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

$phoneNumber_regex="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";

if (isset($_POST['submit']))
{
    $firstName=$_POST['firstName'];
    $_SESSION['firstName']=$_POST['firstName'];
    $_SESSION['middleName']=$_POST['middleName'];
    $_SESSION['familyName']=$_POST['familyName'];
    $_SESSION['email']=$_POST['Email'];
    $_SESSION['password']=$_POST['Password'];
    $_SESSION['confirmPassword']=$_POST['ConfirmPassword'];
    $_SESSION['phoneNumber']=$_POST['phoneNumber'];
    $_SESSION['date_Create']=date("Y-m-d");
    $_SESSION['dateOfBirth']=$_POST['DOB'];
     


      ///////////////////////////////////// firstName /////////////////////////////////////

    if(preg_match($name_regex,$_SESSION['firstName']))
    {
        $firstName_result="<span  class='form1' style=' color:#99B898'>your first name is correct</span> <br>";
        $firstName_correct=true;
    }


    else
    {
        $firstName_result="<span  class='form1' style=' color:#FF847C'>InCorrect value, your first name should contain letters only</span> <br>";
        $firstName_correct=false;
    }


    ///////////////////////////////////// middleName /////////////////////////////////////

    if(preg_match($name_regex,$_SESSION['middleName']))
    {
        $middleName_result="<span  class='form1' style=' color:#99B898'>your middle name is correct</span> <br>";
        $middleName_correct=true;
    }


    else
    {
        $middleName_result="<span  class='form1' style=' color:#FF847C'>InCorrect value, your middle name should contain letters only</span> <br>";
        $middleName_correct=false;
    }


    ///////////////////////////////////// familyName /////////////////////////////////////

    if(preg_match($name_regex,$_SESSION['familyName']))
    {
        $familyName_result="<span  class='form1' style=' color:#99B898'>your family name is correct</span> <br>";
        $familyName_correct=true;
    }


    else
    {
        $familyName_result="<span class='form1'  style=' color:#FF847C'>InCorrect value, your family name should contain letters only</span> <br>";
        $familyName_correct=false;
    }


    ///////////////////////////////////// email /////////////////////////////////////

    if(preg_match($email_regex,$_SESSION['email']))
    {
        $email_result="<span  class='form1' style=' color:#99B898'>your email is correct</span> <br>";
        $email_correct=true;
    }


    else
    {
        $email_result="<span  class='form1' style=' color:#FF847C'>Incorrect Email</span> <br>";
        $email_correct=false;
    }


    ///////////////////////////////////// password /////////////////////////////////////

    if(preg_match($password_regex,$_SESSION['password']))
    {
        $password_result="<span  class='form1' style=' color:#99B898'>Correct Password</span> <br>";
        $password_correct=true;
    }


    else
    {
        $password_result="<span  class='form1' style=' color:#FF847C'>Incorrect Password, 
        your password must contain:
        <br>* minimum 8 characters
        <br>* At least one lowercase
        <br>* At least one uppercase
        <br>* At least one special character </span> <br>";

        $password_correct=false;
    }
    ///////////////////////////////////// confirm Password /////////////////////////////////////

    if(preg_match($password_regex,$_SESSION['confirmPassword']))
    {

        if ($_SESSION['confirmPassword'] == $_SESSION['password'])
        {
            $password_match=true;
            $confirmPassword_correct=true;
            $confirmPassword_result="<span  class='form1' style=' color:#99B898'>Correct Password</span> <br>";
        }


        else
        {
            $password_match=false;
            $confirmPassword_result="<span  class='form1' style=' color:#FF847C'> the passwords does not match</span> <br>";
        }
    }


    else
    {
        $confirmPassword_result="<span  class='form1' style=' color:#FF847C'>Incorrect Password, please check if the two passwords match </span> <br>";
        $confirmPassword_correct=false;
    }



    ///////////////////////////////////// phone Number /////////////////////////////////////

    if(preg_match($phoneNumber_regex,$_SESSION['phoneNumber']))
    {
        $phoneNumber_result="<span class='form1'  style=' color:#99B898'>Correct Phone Number</span> <br>";
        $confirmPhone_correct=true;
    }


    else
    {
        $phoneNumber_result="<span  class='form1' style=' color:#FF847C'>Incorrect! your phone number must be 14 digits</span> <br>";
        $confirmPhone_correct=false;
    }


    ///////////////////////////////////// Date Of Birth /////////////////////////////////////

    if((floor((time() - strtotime($_SESSION['dateOfBirth'])) / 31556926)) >16)
    {
        $dob_result="<span class='form1'  style=' color:#99B898'>you're older than 16 yrs</span> <br>";
        $confirmDob_correct=true;
    }
    
    else
    {
        $dob_result="<span class='form1'  style=' color:#FF847C'>you're younger than 16 yrs</span> <br>";
        $confirmDob_correct=false;
    }
}


    $_SESSION["array"];
    
    if(empty($_SESSION["array"]))
    {
        $_SESSION["array"]= [];
    }


    if
    (
        $firstName_correct && $middleName_correct  && $familyName_correct && $email_correct && $confirmPassword_correct && $confirmPhone_correct && $confirmDob_correct
    )
    
    {
        $data=[
            'First Name'=> $_SESSION['firstName'],
            'Middle Name'=> $_SESSION['middleName'],
            'Family Name'=> $_SESSION['familyName'],
            'Email'=> $_SESSION['email'],
            'Password'=> $_SESSION['password'],
            'Password Confirmation'=> $_SESSION['confirmPassword'],
            'Phone Number'=> $_SESSION['phoneNumber'],
            'Date Of Birth'=>$_SESSION['DOB'],
            'Create Date'=>$_SESSION['date_Create']
        ];
        array_push($_SESSION["array"],$data);
        header('location:welcome.php');
    }

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>


    <div class="container">

        <form method="post" class="signup-form">


            <h1 class="text-center">Sign Up</h1>
            <p class="text-center">Creat an account. It's free</p>


            <div>

                <div>



                    <!-- first name -->
                    <label for="firstName" class="form">First Name</label>
                    <br>
                    <input type="text" name="firstName"  placeholder="First Name"  class="inputs"
                    value="<?php if(isset( $firstName)) echo  $firstName?>" required>
                    <br>
                    <?php if(isset($firstName_result)){echo $firstName_result;}?>
                    <br>

                    <!-- middle name -->
                    <label for="mName" class="form">Middle Name</label>
                    <br>
                    <input type="text" name="middleName" placeholder="Middle Name" class="inputs"
                    value="<?php if(isset($_POST['middleName']))echo $_POST['middleName']?>" required>
                    <br>
                    <?php if(isset($middleName_result)){echo $middleName_result;}?>
                    <br>
                

                    <!-- family name -->
                    <label for="family_Name" class="form">Family Name</label>
                    <br>
                    <input type="text" name="familyName" placeholder="Family Name" class="inputs"
                    value="<?php if(isset($_POST['familyName']))echo $_POST['familyName']?>"required>
                    <br>
                    <?php if(isset($familyName_result)){echo $familyName_result;}?>
                    <br>



                    <!-- email -->
                    <label for="Email" class="form">Email</label>
                    <br>
                    <input type="email" name="Email" placeholder="Your Email" class="inputs"
                    value="<?php if(isset($_POST['email']))echo $_POST['email']?>" required>
                    <br>
                    <?php if(isset($email_result)){echo $email_result;}?>
                    <br>




                    <!--Password-->
                    <label for="loginPassword" class="form">Password</label>
                    <br>
                    <input type="password" name="Password" placeholder="Password" class="inputs"
                    value="<?php if(isset($_POST['password']))echo $_POST['password']?>" required>
                    <br>
                    <?php if(isset($password_result)){echo $password_result;}?>
                    <br>



                    <!--Confirm Password-->
                    <label for="ConfirmPassword" class="form">Confirm Password</label>
                    <br>
                    <input type="password" name="ConfirmPassword" placeholder="Confirm Password" class="inputs"
                    value="<?php if(isset($_POST['confirmPassword']))echo $_POST['confirmPassword']?>" required>
                    <br>
                    <?php if(isset($confirmPassword_result)){echo $confirmPassword_result;}?>
                    <br>




                    <!-- Phone Number  -->
                    <label for="phoneNumber" class="form">Phone Number</label>
                    <br>
                    <input type="number" name="phoneNumber" placeholder="Phone Number" class="inputs"
                    value="<?php if(isset($_POST['phoneNumber']))echo $_POST['phoneNumber']?>" required>
                    <br>
                    <?php if(isset($phoneNumber_result)){echo $phoneNumber_result;}?>
                    <br>
                    



                    <!--Date Of Birth-->
                    <label for="DOB" class="form">Date Of Birth</label>
                    <br>
                    <input type="date" name="DOB"  placeholder="Date Of Birth" class="inputs"
                    value="<?php if(isset($_POST['DOB']))echo $_POST['DOB']?>" required>
                    <br>
                    <?php if(isset($dob_result)){echo $dob_result;}?>
                    <br>
                    <br>  
                    
                    
                </div>
                
            </div>


            <input type="submit" value="Submit" name="submit"> <button type="reset" class="btn btn-light btn-lg">Reset all</button>
            <br>
            <br>
            <div class="form">Already have an account?<a href="login.php">Login</a></div>


        </form>
    </div>
</body>
</html>