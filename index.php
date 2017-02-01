<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My BLOG</title>
</head>
<body>


	<h1>Mon blog</h1>
	<?php 
	require_once 'vendor/j4mie/idiorm/idiorm.php';

	ORM::configure('mysql:host=localhost;dbname=my_blog');
	ORM::configure('username','root');
	ORM::configure('password','simplonco');

	

	$blog = ORM::for_table('posts')->find_many();
	

	foreach ($blog as $value) {
		echo "<p>" . $value->author ."<br>".
		$value->title . " <br>".
		$value->content."<br>". 
		$value->created_at.
		"<br><form action='form.php?id=$value->id' method='post'><input value='Edit' type='submit' class='ui button'></form><br></p>";
	}
	?>

	<br>
	<a href="form.php"><button>Ajouter un article</button></a>

	
</body>
</html>