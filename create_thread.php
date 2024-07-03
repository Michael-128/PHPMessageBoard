<?php include 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MessageBoard</title>
    <link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center h-100 d-flex flex-column justify-items-start p-4">
        <div>
            <h1>MessageBoard</h1>
            <br>
            <a href="index.php"><button class="btn btn-primary">View all threads.</button></a>
            <br><br>
            <p>Create a new thread.</p>
        </div>

        <div class="text-left col">
            <form class="h-100 d-flex flex-column" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="form-group">
                    <label for="username">Username (optional)</label>
                    <input name="username" class="form-control" placeholder="Anon">
                </div>

                <div class="form-group">
                    <label for="title">Title</label> <br>
                    <input minlength="3" required class="form-control" name='title' placeholder="Give your post a title."/>
                </div>

                <div class="form-group h-100">
                    <label>Body</label> <br>
                    <textarea name="body" required class="form-control h-100 flex-grow" placeholder="What is this thread about?"></textarea>
                </div>
                
                <div class="my-4">
                    <button class="btn btn-primary" type="submit">Post</button>
                    <button class="btn" type="reset">Clear</button>
                </div>
            </form>
        </div>
	</div>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = null;
        $title = null;
        $body = null;

        if(!empty($_POST["title"] && !empty($_POST["body"]))) { 
            $title = htmlspecialchars($_POST["title"]);
            $body = htmlspecialchars($_POST["body"]);
        }

        if(!empty($_POST["username"])) {
            $username = htmlspecialchars($_POST["username"]);
        }

        $res = false;

        if(isset($username)) {
            $query = $con->prepare("INSERT INTO threads (username, title, body) VALUES (?, ?, ?)");    
            $res = $query->execute(array($username, $title, $body));
        } else { 
            $query = $con->prepare("INSERT INTO threads (title, body) VALUES (?, ?)");    
            $res = $query->execute(array($title, $body));
        }

        if($res) { header("Location: index.php"); }
    }
?>