
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

    <!-- <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
     crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
    <center>
        <a href="logout.php" style="position:absolute;
        right:7%">logout</a>

    <section style="width:fit-content;"
     > 
    <?php
if(isset( $_SESSION['add_team'] ))
{
    echo $_SESSION['add_team'];
    unset($_SESSION['add_team']);
}

?>
</section>  
</center>
    <div class="links_container" 
    style="margin:2em;
    background-color:white;
    padding:2em;
    border-radius:10px;
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

    
    <center >
     
    
<table  style="margin-top:-9em">
    <thead>
    <tr>
<th scope="col">ID</th>
<Th scope="col">Team</th>
<th scope="col">Pts</th>
<th scope="col">Gd</th>
<th scope="col">Action</th>
    </tr>
    </thead>

    <tbody>

    <?php
    $query = "SELECT * FROM teams";
    $query_run = mysqli_query($con , $query);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $teams)
        {
            ?>
            <tr>
                <td scope="row"> <?= $teams['id']; ?></td>
                <td> <?= $teams['team']; ?></td>
                <td> <?= $teams['pts']; ?></td>
                <td> <?= $teams['gd']; ?></td>
                <td>
                    <a class="btn btn-info" href=""
                    style="cursor:pointer;
                    background-color:green;
                    border-radius:4px;
                    padding:1.5px;
                    color:white;
                    border:none;"
                    >view</a>
                    <a class="btn btn-success" href="edit_team.php?id=<?= $teams['id']; ?>"
                    style="cursor:pointer;
                    background-color:blue;
                    border-radius:4px;
                    padding:1.5px;
                    color:white;
                    border:none;"
                    >edit</a>

                    <form action="dashboard.php" method="post" style="display:inline;">
                    <button class="btn btn-danger" type="submit" name="delete_team" value="<?= $teams['id']; ?>"
                    style="cursor:pointer;
                    background-color:red;
                    border-radius:4px;
                    padding:1.5px;
                    color:white;
                    border:none;
                    ">
                    delete</button>
                    </form>
                </td>
            </tr>
            
            <?php
        }
        
    }else{
        echo "no record found";
    }


?>
    
    </tbody>
</table>

</center>


</body>
</html>


