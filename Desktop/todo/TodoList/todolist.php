<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <script src="https://kit.fontawesome.com/3734bae25c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br><div class="container"><br>
        <div class="one">
            <h2><i class="fa-solid fa-list"></i> My ToDoList</h2>
        </div>

        <form action="display.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter Fullname">
                    </div>

                    <div class="form-group">
                        <input type="datetime-local" class="form-control" name="datetime" placeholder="Enter Date and Time">
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <textarea name="list" placeholder="Type your to do list here"></textarea>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>