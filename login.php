<?php

include("connect.php");
session_start();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:whitesmoke">

<center>   <div class="container" style=
    "border:2px solid blue;
    width:fit-content;
    padding:1em;
    text-align:center;
    margin-top:8em;
    border-style:outset;
    background-color:white;
    border-radius:10px">
    <center>
    
<form action="" method="post" style="text-align:center; margin-top:-5em">

<h4 style="margin-top:6em;">
            <?php

            if(isset($_SESSION['logins']))
            {
            echo $_SESSION['logins'];
            unset($_SESSION['logins']);
            }

            ?>
        </h4>
</center>

<label for="username">user_name</label>
<br>
<input type="text" required name="name" id="">
<br><br>
<label for="password">password</label><br>
<input type="password" required name="password" id="">
<br><br>
<a href="forget_password.php" style="text-decoration:none"> 
<!-- &nbsp;&nbsp; forget your password?</a>
<br/><br/> -->
<input type="submit" value="login" name="admin_login"
style="cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">

<br><br>
not have an account?  <a href="signup.php">sign_up</a>


</form>
        </div>
</body>
</html>

<?php


if(isset($_POST['admin_login']))
{
    $name = mysqli_real_escape_string($con , $_POST["name"]);
    $password = mysqli_real_escape_string($con , $_POST["password"]);

    $query = "SELECT * FROM admin where user_name = '$name' limit 1";
    $query_run = mysqli_query($con , $query);

    if($query_run && mysqli_num_rows($query_run) > 0)
    {
        
       while( $result  = mysqli_fetch_assoc($query_run))
       {
        if(password_verify($password , $result["password"]))
        {
            
            if($result['user_type'] === 'admin')
            {

                $_SESSION['auth'] = true;
                header('Location: dashboard.php');

            

            }
            else if($result['user_type'] === 'user')
            {
                $_SESSION['auth'] = true;
                $_SESSION['login_id'] = $result['id'];
                $_SESSION['user_name'] = $result['user_name'];
                header('Location: index.php');
                
            }
        }
        else
        {
    
            $_SESSION['logins'] = '<span style="color:red;">wrong user_name or password</span>';
            header("Location: login.php");
        }
        
}

}
        else{
            $_SESSION['logins'] = '<span style="color:red;">wrong user_name or password</span>';
             header("Location: login.php");
            
    }


}

?>

