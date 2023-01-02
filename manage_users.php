<?php
require("connect.php");
require("function.php");

if(! $_SESSION["auth"]){
    header("Location: login.php");
}
?>
<html>
    <head>
    <title> users </title>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <bory>


    <div class="links_container" 
    style="margin:2em;
    background-color:white;
   border-radius:10px;
    padding:2em;
    width:fit-content;
    ">

    <a class="btn btn-light m-5 active" href="dashboard.php">manage_team</a>
    <br><br>
    <a class="btn btn-light m-5" href="add_team.php">add_team</a>
    <br><br>

    <a href="add_user.php" class="btn btn-light m-5">add_user</a>

    <br><br>
    <a href="manage_users.php" class="btn btn-light m-5">manage_user</a>
    <br><br>
    <a href="manage_comments.php" class="btn btn-light m-5">manage_comment</a>
    </div>
    </div>



<center>

<table border="1" style="margin-top:-9em">
    <thead>
        <tr>
            <th>ID</th>
            <th>USER_NAME</th>
            <th>EMAIL</th>
            <th>USER_TYPE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM admin";
        $query_run = mysqli_query($con , $query);
        $result = mysqli_num_rows($query_run);
        if($result > 0){

foreach($query_run as $row) {        
        
        ?>
        <tr>
                <td>
                    <?= $row['id']; ?>
                </td>
                <td>
                    <?= $row['user_name']; ?>
                </td>
                <td>
                    <?= $row['email']; ?>
                </td>
                
                <td>
                    <?= $row['user_type']; ?>
                </td>
                <td>

                <span style="display:flex; flex-direction:row;">

                <a class="btn btn-info" href=""
                    style="cursor:pointer;
                    background-color:green;
                    border-radius:4px;
                    padding:1.5px;
                    color:white;
                    border:none;
                    margin-right:4px;"
                    >view</a>
                    
                    <a href = "edit_user.php?id=<?= $row['id'] ?> "
                    style="cursor:pointer;
                    background-color:blue;
                    border-radius:4px;
                    padding:1.5px;
                    color:white;
                    border:none;"
                    >edit </a>
    
                    <form action="" method="post" style="margin-left:5px;">
                        <button type="submit" name="delete_user" value="<?= $row['id']; ?>"
                        style="cursor:pointer;
                    background-color:red;
                    border-radius:4px;
                    padding:2px;
                    color:white;
                    border:none;"
                        >
                         delete</button>
                    </form>
        </span>
                </td>
        </tr>
        <?php
}
}else{
    $echo("no record found");
}
?>
    </tbody>
</table>
</center>

</body>
</html>