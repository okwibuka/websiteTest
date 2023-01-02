<?php

session_start();
include("connect.php");


//delete team

if(isset($_POST["delete_team"]))
{
    $team_id = mysqli_real_escape_string($con , $_POST['delete_team']);
    $query = "DELETE FROM teams WHERE id = $team_id";
    $query_run = mysqli_query($con , $query);
    if($query_run)
    {
        echo "team successfully deleted";
        header("Location: dashboard.php");
        die;
    }
    else
    {
        echo "team not successfully deleted";
        header("Location: dashboard.php");
        die;
    }
}

//update or edit team


if(isset($_POST["update_team"]))
{
     
    $team_id = mysqli_real_escape_string($con , $_POST['team_id']);
    $id =  mysqli_real_escape_string($con ,$_POST['id']);
    $team = mysqli_real_escape_string($con ,$_POST['team']);
    $pts = mysqli_real_escape_string($con ,$_POST['pts']);
    $gd = mysqli_real_escape_string($con ,$_POST['gd']);

    $query = "UPDATE teams SET id = '$id', team ='$team' , pts='$pts' , gd='$gd'
    WHERE id='$team_id ' ";

    $query_run = mysqli_query($con , $query);
    if($query_run)
    {
       echo"student updated successfully";
    header("Location: dashboard.php");
    exit(0); 
    }
    else
    {
       echo "student not updated successfully";
        header("Location: dashboard.php");
        exit(0);
    }

}

// create team

if(isset($_POST["create_team"]))
{
    $id = mysqli_real_escape_string($con ,$_POST['id']);
    $team = mysqli_real_escape_string($con ,$_POST['team']);
    $pts = mysqli_real_escape_string($con ,$_POST['pts']);
    $gd = mysqli_real_escape_string($con ,$_POST['gd']);

    $query = "SELECT * FROM teams WHERE team='$team'";
    $query_run= mysqli_query($con , $query);
    $sql = mysqli_fetch_assoc($query_run);

    if($sql > 0)
    {

        $_SESSION['add_team'] = '<span style="color:red">such team exist</span>';
              header("Location: add_team.php");

    } 
    else

    {
        
    $query = "INSERT INTO teams(id,team,pts,gd) VALUES ('$id','$team','$pts','$gd')";
    $query_run = mysqli_query($con , $query);
    if($query_run)
    {

        $_SESSION['add_team'] = '<span style="color:green">team created successful</span>';
        header("Location: dashboard.php");
        
    }
    else
    {
        
            
                $_SESSION['add_team'] = '<span style="color:red"> such ID exist</span>';
                header("Location: add_team.php");
               
            
    }

    }
}

//update or edit user


if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con , $_POST['user_id']);
    $id = mysqli_real_escape_string($con , $_POST['id']);
    $user_name = mysqli_real_escape_string($con , $_POST['user_name']);
    $email = mysqli_real_escape_string($con , $_POST['email']);
    $user_type = mysqli_real_escape_string($con , $_POST['user_type']);

    $passwordd = password_hash($password , PASSWORD_DEFAULT);

    $query = "UPDATE admin SET id = '$id' , user_name = '$user_name' , email = '$email',
     user_type = '$user_type'
     WHERE id = '$user_id' ";

$query_run = mysqli_query($con , $query);

if($query_run)
{
    echo"student updated successfully";
    header("Location: manage_users.php");
    exit(0); 
    }
    else
    {
       echo "student not updated successfully";
        header("Location: manage_users.php");
        exit(0);
    }
}


// delete user

if(isset($_POST['delete_user'])){
    $user_id = mysqli_real_escape_string($con , $_POST['delete_user']);
    $query = "DELETE FROM admin WHERE id = $user_id";
    $query_run = mysqli_query($con , $query);
    if($query_run)
    {
        echo "team successfully deleted";
        header("Location: manage_users.php");
        die;
    }
    else
    {
        echo "team not successfully deleted";
        header("Location: manage_users.php");
        die;
    }
}


//comment





?>