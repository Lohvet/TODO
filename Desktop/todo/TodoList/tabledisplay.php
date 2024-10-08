<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Display</title>
    <script src="https://kit.fontawesome.com/3734bae25c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br><div class="container"><br>
        <div class="row">
            <div class="col-md-12">
            <?php
                $username = "store_admin";
                $host = "localhost";
                $password = "password1#";
                $database = "store_data";

                $connection = mysqli_connect($host, $username, $password, $database);
                if(mysqli_connect_errno()){
                    echo(mysqli_connect_error());
                    die();
                }
                mysqli_select_db($connection, $database);
                if ((mysqli_errno($connection))){
                    echo(mysqli_error($connection));
                    die();
                }
                mysqli_autocommit($connection, FALSE);

                
                $query = "SELECT * FROM todolist";
                $result = mysqli_query($connection, $query);

                if((mysqli_errno($connection))){
                    echo(mysqli_error($connection));
                    die();
                }
                $list = array();
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                    $list[] = $row;             
                }
            ?>

            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date and Time</th>
                    <th>List</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

            <?php    
                for ($a = 0; $a < count($list); $a++){
            ?>
                <tr>
                <td>
                    <?php 
                        echo($list[$a]['ID']); 
                    ?>
                </td>
                <td>
                    <?php 
                        echo($list[$a]['Name']); 
                    ?>
                </td>
                <td>
                    <?php 
                        echo($list[$a]['DateTime']);
                    ?>
                </td>
                <td>
                    <?php 
                        echo($list[$a]['List']); 
                    ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo ($list[$a]['ID']);?>
                    ">Edit</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo ($list[$a]['ID']);?>
                    ">Delete</a>
                </td>
                </tr>
                <?php 
                } 

                mysqli_commit($connection);
                mysqli_rollback($connection);
                mysqli_close($connection);
            ?>
            </table>  
            </div>
        </div>
    </div>
</body>
</html>