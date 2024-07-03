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
	<div class="container text-center p-4">
		<h1>MessageBoard</h1>
		<br>
		<a href="create_thread.php"><button class="btn btn-primary">Start a new thread.</button></a>
		<br><br>
		<p>Here are the lastest threads.</p>

		

		<?php
			$query = "SELECT id, title, body, updated FROM threads ORDER BY updated DESC";
			$result = mysqli_query($con, $query);

			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row["id"];
				$title = $row['title'];
				$body = substr($row['body'],0,100);

				echo "
					<div class='card my-4'>
						<div class='card-body text-left'>
							<h4 class='card-title'>{$title}</h4>
							<p class='card-text'>{$body}</p>
							<a href='thread.php?id={$id}' class='btn btn-primary'>Go to thread</a>
						</div>
					</div>
				";
			}
		?>
	</div>
</body>
</html>