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
    <link rel="stylesheet" href="./css/style.css">

    <!-- <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
     crossorigin="anonymous"> -->

    <title>Document</title>
</head>
<body>

    
    <div style="float:right; padding:1em">
    <h4 class="auth_name" style="" >
   welcome &nbsp; <span style="color:green"><?php echo $_SESSION['user_name']; ?> </span>
</h4>
    <br>
    <ul class="auth_content"
    style="list-style-type:none;
    /* margin-right:1em; */
    position:relative;
    right:10%;
    width:fit-content;
    background-color:white;
    padding:1em;
    line-height:2;
    border-radius:11px;
    ">
    <li style="border-bottom:1px solid black">
    <a href="change_password.php">change password</a></li>
    <li>
    <a href="logout.php">logout</a></li>
</ul>
</div>
<center style="margin-top:2em">

<?php
if(isset( $_SESSION['password_change'] ))
{
    echo $_SESSION['password_change'];
    unset($_SESSION['password_change']);
}

?>
</center>

    <center>

    <h3 style="margin-top:2em;">Spanish league list</h3>
    
<table border="0" style="text-align:center; margin-top:5em;">
    <thead>
    <tr class="tableHead">
<th>ID</th>
<th>Teams</th>
<th>Pts</th>
<th>Gd</th>
    </tr>
    </thead>

    <tbody>

    <?php
    
    $query = "SELECT * FROM teams order by pts desc ";
    $query_run = mysqli_query($con , $query);
    $query_run_result = mysqli_num_rows($query_run);

    if($query_run_result > 0 )
    { 
        

        $no = 1;
        while($teams = mysqli_fetch_assoc($query_run)) //or foreach($query_run as $teams)
        {

            ?>
            <tr>
                <td class="tbody"><?php echo $no ?></td>
                <td class="tbody"> <?= $teams['team']; ?></td>
                <td class="tbody"> <?= $teams['pts']; ?></td>
                <td class="tbody"> <?= $teams['gd']; ?></td>
                
            </tr>
            
            <?php
            $no++;
        }
        
        
    }else{
        echo "no record found";
    }

    
?>
    
    </tbody>
</table>

<?php

include("comment.php");

?>

</center>
    
</body>
</html>


