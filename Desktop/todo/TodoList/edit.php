<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script src="https://kit.fontawesome.com/3734bae25c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br><div class="container"><br>
        <div class="one">
            <h2><i class="fa-solid fa-list"></i> Update ToDoList</h2>
        </div>

        <form action="update.php" method="POST">
            <div class="row">
                <div class="col-md-6">
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

                        $id = mysqli_real_escape_string($connection, $_GET['id']);

                        $query = "SELECT * FROM todolist WHERE ID = $id";
                        $result = mysqli_query($connection, $query);

                        if((mysqli_errno($connection))){
                            echo(mysqli_error($connection));
                            die();
                        }
                        while($list = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo ($list['ID']); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php echo ($list['Name']);?>">
                        </div>

                        <div class="form-group">
                            <input type="datetime-local" class="form-control" name="datetime" value="<?php echo ($list['DateTime']);?>">
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <textarea name="list" value="<?php echo ($list['List']);?>"></textarea>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>
                    <?php }
                        mysqli_commit($connection);
                        mysqli_rollback($connection);
                        mysqli_close($connection);
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>




