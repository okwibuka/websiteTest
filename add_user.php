<?php

session_start();
include("connect.php");

if(! $_SESSION["auth"]){
    header("Location: login.php");
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="dashboard.php">dashboard</a>
<center>   <div class="container" style=
    "border:2px solid blue;
    width:fit-content;
    padding:10px;
    text-align:center;
    margin-top:2em;
    border-style:outset;
    background-color:white;
    border-radius:10px">
    
<form action="" method="post" style="text-align:center;">

<?php

if(isset($_SESSION['agree']))
{
    echo $_SESSION["agree"];
    unset($_SESSION['agree']);
}

?> 
<br>

<label for="username">user_name</label>
<br>
<input type="text" required name="name" id="">
<br><br>
<label for="email">email</label>
<br>
<input type="email" required name="email" id="">
<br><br>
<label for="password">password</label><br>
<input type="password" required name="password" id="">
<br><br>
<label for="confirm_password">confirm_password</label><br>
<input type="password" required name="confirm_password" id="">
<br><br>
<label for="">user_type:</label>
&nbsp;
<select name="user_type">
    <option value="user">user</option>
    <option value="admin">admin</option>
</select>
<br><br>
<input type="submit" value="add_user" name="add_user"
style="cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">


</form>
</center>
</body>
</html>

<?php

if(isset($_POST['add_user']))
{
    $name = mysqli_real_escape_string($con , $_POST["name"]);
    $email = mysqli_real_escape_string($con , $_POST["email"]);
    $password = mysqli_real_escape_string($con , $_POST["password"]);
    $user_type = mysqli_real_escape_string($con , $_POST["user_type"]);
    $confirm_password = filter_var($_POST['confirm_password'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    
    $passwordd = password_hash($password , PASSWORD_DEFAULT);
    

    //check if user already exist

    $check = "SELECT * FROM admin where user_name = '$name' || email='$email'";
    $check_result = mysqli_query($con,$check);
    $sql = mysqli_num_rows($check_result);
    if($sql > 0)
    {
        $_SESSION['agree'] = '<span style="color:red">user_name or email exist!</span>';
        header("Location: add_user.php");
    }
    else if($password != $confirm_password)
    {
        $_SESSION['agree'] = '<span style="color:red">password not match</span>';
        header("Location: add_user.php");

    }
    
    else
    {

        $query = "INSERT INTO admin(user_name,email,password,user_type) VALUES ('$name' ,'$email', 
        '$passwordd', '$user_type')";
    $query_run = mysqli_query($con , $query);
    
    if($query_run)
    {
      $_SESSION['agree'] = '<span style="color:green"> submitted successfully</span>';
      header("Location: dashboard.php");
    
        
    }

    }

    
}
  



?>