
<?php
include("connect.php");
$query = "select * from data order by date desc";
$result = mysqli_query($con,$query);

if(isset($_POST['delete']))
{
$comment_id = mysqli_real_escape_string($con , $_POST['delete']);
$query = "DELETE FROM data WHERE id='$comment_id' ";
$query_run= mysqli_query($con , $query);

if($query_run)
    {
        echo "comment deleted successfully";
        header("Location: manage_comments.php");
        exit(0); 
    }
    else
    {
       echo "comment not deleted successfully";
        header("Location: manage_comments.php");
        exit(0); 
    }


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

    <title>comments_dashboard</title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    

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
    <div class="container mt-5">

    <center>

    <form action="" method="post">
    <table border="1" style="margin-top:-9em">
        
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">COMMENT</th>
            <th scope="col">DATE</th>
            <th>ACTION</th>
        </tr>
</thead>

        <?php
        

        if(mysqli_num_rows($result)>0)
        {
            $no = 1;
            while($rows = mysqli_fetch_assoc($result))
            {
                
                ?>
                <tbody>

                <tr>
                    <td scope="row"> <?php echo $no; ?> </td>
                    <td> <?php echo $rows['comment']; ?> </td>
                    <td> <?php echo $rows['date']; ?> </td>
                    <td>
                        <button style="cursor:pointer;
                    background-color:red;
                    border-radius:4px;
                    padding:2px;
                    color:white;
                    border:none;"
                         name="delete" type="submit" class="btn btn-danger" 
                        value="<?= $rows['id']; ?>"> delete </button>
                    </td>

                </tr>
            </tbody>
                
               
        <?php
        $no++;
        
            }
            
            }
           
            else
            {
                echo "no comment found"."</br>" ."</br>";
                // echo "</br>";
            }
            
            
            ?>
            
            </form>
           
    </table>
    </div>
        </center>
</body>
</html>