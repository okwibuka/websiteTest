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

    <!-- <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
     crossorigin="anonymous"> -->

    <title>Document</title>
</head>
<body>
    <a class="btn btn-light m-5" href="dashboard.php">dashboard</a> <br><br>

    <center>   <div class="container" style=
    "border:2px solid blue;
    width:fit-content;
    padding:10px;
    text-align:center;
    margin-top:2em;
    border-style:outset;
    background-color:white;
    border-radius:10px">
    
<form action="function.php" method="post" 
style="text-align:center; "
class="w-50">

<?php

if(isset($_SESSION['add_team']))
{
echo $_SESSION['add_team'];
echo "<br/>"."<br/>";
unset($_SESSION['add_team']);
}

?>

<label class="form-label" for="id">ID</label><br>
<input class="form-control" type="number" required name="id" id="">
<br><br>
<label class="form-label" for="team">team</label><br>
<input class="form-control" type="text" required name="team" id="">
<br><br>
<label class="form-label" for="pts">points</label> <br>
<input class="form-control" type="number" required name="pts" id="">
<br><br>
<label class="form-label" for="gd">goal defended</label> <br>
<input class="form-control" type="number" required name="gd" id="">
<br><br>
<button type="submit" name="create_team" class="btn btn-primary"
style="cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">
    create_teams</button>
</form>
</center>
</body>
</html>