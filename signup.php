<?php

include("connect.php");
session_start();


// function random_num($length)
// {

//     $text = "";

//     if($length < 5)
//     {
//         $length = 5;
//     }

//     $len = rand(4 ,$length);

//     for($i=0 ; $i < $len ; $i++)
//     {
//        $text .=rand(0 , 9);
//     }
//     return $text;
 

// }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:whitesmoke">
 <center>   
    <div class="container" style=
    "border:2px solid blue;
    width:fit-content;
    padding:10px;
    text-align:center;
    margin-top:2em;
    border-style:outset;
    background-color:white;
    border-radius:10px">


<form action="" method="post" style="text-align:center;">

<center>
<h4>
<?php

if(isset($_SESSION['agree']))
{
    echo $_SESSION["agree"];
    unset($_SESSION['agree']);
}

?>
  </h4>  </center>

<label for="username">user_name</label>
<br>
<input type="text" required name="name" id="">
<br><br>
<label for="email">Email</label>
<br>
<input type="email" required name="email" id="">
<br><br>
<label for="password">password</label><br>
<input type="password" required name="password" id="">
<br><br>
<label for="confirm password">confirm pasword</label>
<br>
<input type="password" required name="confirm_password" id="">
<br><br>
<div 
style="
width:fit-content;
margin-left:1.6em;"
>

</div>
<input type="hidden" name="user_type" value="user"> 
<br><br>
<input type="hidden" name="checkbox" value="0">
<input type="checkbox" name="checkbox" value="1">
<label for="check box">please accept terms of <a href="#">use & privacy </a></label>
<br><br>
<input type="submit" value="sign_up" name="admin_signup"
style="cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">

<br><br>
already have an account? &nbsp; 
<a href="login.php">login</a>

</form>
</div></center>
</body>
</html>

<?php
if(isset($_POST['admin_signup']))
{
    $name = mysqli_real_escape_string($con , $_POST["name"]);
    $email = mysqli_real_escape_string($con , $_POST["email"]);
    $password = filter_var($_POST['password'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_type = mysqli_real_escape_string($con , $_POST["user_type"]);
    $confirm_password = filter_var($_POST['confirm_password'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    $checkbox = $_POST["checkbox"];
    
    $passwordd = password_hash($password , PASSWORD_DEFAULT);    
    
    if($checkbox == 1){

    //check if user already exist

    $check = "SELECT * FROM admin where user_name = '$name' || email='$email'";
    $check_result = mysqli_query($con,$check);
    $sql = mysqli_num_rows($check_result);
    if($sql > 0)
    {
        $_SESSION['agree'] = '<span style="color:red">user_name or email already exist</span>';
        header("Location: signup.php");
    }
    else if($password != $confirm_password)
    {
        $_SESSION['agree'] = '<span style="color:red">password not match</span>';
        header("Location: signup.php");

    }
    
    else
    {

        // $verify_token = random_num(20);

        $query = "INSERT INTO admin(user_name,email,password,user_type) VALUES ('$name' ,'$email',
        '$passwordd', '$user_type')";
    $query_run = mysqli_query($con , $query);
    
    if($query_run)
    {
      $_SESSION['agree'] = '<span style="color:green"> submitted successfully</span>';
      header("Location: signup.php");
    
        
    }

    }

    
}
    else
    {
    $_SESSION['agree'] = '<span style="color:red">accept terms and conditions</span>';
    header("Location: signup.php");
        
    }

}

?>