
<?php

include("connect.php");
include("comment_function.php");
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
<body style="background-color:whitesmoke;" >
<div style="">
    <div class="container mt-5" >
    <form action="" method="post">
<textarea name="comment" required placeholder="enter comment" class="form-control w-50"
style="position:absolute;
margin-top:10px;
right:44%;
width:25em;
text-align:center;
border-radius:7px;

"
>
</textarea>        
<br>
<br>
<input type="submit" value="submit" name="submit" class="btn btn-primary"
style="
margin-top:1.5em;
margin-left:-13em;
cursor:pointer;
background-color:blue;
border-radius:4px;
padding:5px;
color:white;
border:none;">
    </form>
    </div>

    <div class="container" style="
    background-color:white;
    width:50%">
        <div class="row">
            <div class="col md-12">
                <div class="card w-50"
                 style="margin-top:30px;
                 "
                 >
                    <div class="card-header" style=
                    "font-weight:bolder;
                    background-color:whitesmoke;
                    border:1px solid black;
                    padding:10px;
                    border-radius:5px">
                     comments   
                    </div>
                    <div class="card-body " style=
                    "font-family:italic;
                    border:1px solid whitesmoke;
                    padding:10px;">
                        <?php

                        
                        $query =" select * from data order by date desc";
                        $result = mysqli_query($con , $query);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0)
                        {

                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo $row['date']. "<br>";
                                echo  $row['comment'] . "<br>"; 
                                echo "<br>";
                                
                            }
                        }
                        else
                        {
                            echo "no comment found";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>