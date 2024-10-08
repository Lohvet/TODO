<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList display</title>
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
                
                $id = mysqli_real_escape_string($connection, $_POST['id']);
                $name = mysqli_real_escape_string($connection, $_POST['name']);
                $datetime = mysqli_real_escape_string($connection, $_POST['datetime']);
                $list = mysqli_real_escape_string($connection, $_POST['list']);

                if(empty($name)){
                    echo "Please Enter Your Name";
                }
                elseif(empty($datetime)){
                    echo "Please Choose a Date and Time";
                }
                elseif(empty($list)){
                    echo "Type a list to be edited!";
                }
                else{

                    $query = "UPDATE todolist SET Name= '$name', DateTime = '$datetime', List = '$list' WHERE ID = $id";
                    mysqli_query($connection, $query);

                    if((mysqli_errno($connection))){
                        echo(mysqli_error($connection));
                        die();
                    }
                    else{
                        echo("Your List has been updated successfully!!!");
                    }
                }

                mysqli_commit($connection);
                mysqli_rollback($connection);
                mysqli_close($connection);
            ?>
            </div>
        </div>
    </div>
</body>
</html>