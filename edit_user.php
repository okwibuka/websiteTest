<?php

include("connect.php");
include("function.php");

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

<?php

if(isset($_GET['id'])){
    $user_id =  mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM admin WHERE id = '$user_id' ";
    $query_run = mysqli_query($con , $query);
    if(mysqli_num_rows($query_run) > 0)
    {
        $row = mysqli_fetch_array($query_run);
    

?>
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
    
<form action="" method="post" 
style="text-align:center;">

<input type="hidden" name="user_id" value="<?= $row['id']; ?>">
<br><br>
<label for="id">ID</label> <br>
<input type="number" name="id" value="<?= $row['id']; ?>">
<br><br>

<label for="username">user_name</label>
<br>
<input type="text"  name="user_name" value="<?= $row['user_name']; ?>">
<br><br>
<label for="username">email</label>
<br>
<input type="text"  name="email" value="<?= $row['email']; ?>">
<br><br>
<label for="">user_type:</label>
&nbsp;&nbsp;
<select name="user_type">
    <option value="user">user</option>
    <option value="admin">admin</option>
</select>
<br><br>
<button type="submit" name="update_user" style=
"cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">
update_user
</button>


</form>
    </center>

<?php
}else{
    echo "no such record found";

}}
?>
</body>
</html>