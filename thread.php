<?php 
    include 'connection.php'; 
    include 'helpers/card.php';
?>

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
	<div class="container text-center p-4">
        <div>
            <h1>MessageBoard</h1>
            <br>
            <a href="index.php"><button class="btn btn-primary">View all threads.</button></a>
            <br><br>
        </div>

		<?php
            $id = null;

            if(!empty($_GET["id"])) { $id = htmlspecialchars($_GET["id"]); }
            elseif (!empty($_POST["id"])) { $id = htmlspecialchars($_POST["id"]); }

            if(isset($id)) {
                $query = "SELECT username, title, body FROM threads WHERE id = {$id}";
                $result = mysqli_query($con, $query);

                $row = mysqli_fetch_assoc($result);

                $title = $row['title'];
                $body = $row['body'];
                $username = $row['username'];

                $card = render_card($username, $body);

                echo "
                    <h4 class='card-title'>{$title}</h4>

                    {$card}
                ";
            }

            if(isset($id)) {
                $query = "SELECT username, body FROM comments WHERE thread_id = {$id}";
                $result = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    $body = $row['body'];
                    $username = $row['username'];
    
                    echo render_card($username, $body);
                };
            }
		?>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $comment = null;
                $username = "Anon";

                if(!empty($_POST["username"])) {
                    $username = htmlspecialchars($_POST["username"]);
                }

                if(!empty($_POST["comment"])) { 
                    $comment = htmlspecialchars($_POST["comment"]);
                    $query = $con->prepare("INSERT INTO comments (thread_id, username, body) VALUES (?, ?, ?)");
                    $query->execute(array($id, $username, $comment));

                    echo render_card($username, $comment);
                }
            }
        ?>

        <hr>

        <h4 class="text-left">Comment</h4>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id=".$id; ?>" method="POST" class="text-left">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Anon">
            </div>

            <div class="form-group">
                <textarea required name="comment" class="form-control" placeholder="What would you like to say?"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
	</div>
</body>
</html>

