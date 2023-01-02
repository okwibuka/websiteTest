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
    


<form action="change_password_function.php" method="post" style="text-align:center;">

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


<label for="old password">old password</label>
<br>
<input type="password" required name="old_password">
<br><br>
<label for="new password">new password</label><br>
<input type="password" required name="new_password">
<br><br>
<label for="confirm password">confirm new pasword</label>
<br>
<input type="password" required name="confirm_password" id="">
<br><br>
<button type="submit" name="change_password"
style="cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">confirm</button>

<br><br>


</form>
</div></center>



</body>
</html>



