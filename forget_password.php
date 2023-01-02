

<?php

session_start();
include("connect.php");


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>

<div class="container" style=
    "border:2px solid blue;
    width:fit-content;
    padding:10px;
    text-align:center;
    margin-top:9em;
    border-style:outset;
    background-color:white;
    border-radius:10px">
     <?php
if(isset( $_SESSION['agree'] ))
{
    echo $_SESSION['agree'];
    unset($_SESSION['agree']);
}

?>

   <form method="post" action="forget_password_function.php">

  

<label for="email">Email</label>
<br>
<input type="email" required name="email" placeholder="enter your email">
<br><br>
<button type="submit" name="send_email"
style="cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">send</button>

<br><br>
back to login? &nbsp; 
<a href = "login.php">Login </a>

</form>
</div>
</center>
  
</body>
</html>