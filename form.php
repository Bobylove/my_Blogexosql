<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulaire</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
</head>
<body>
	<a href="index.php"><button>Home</button></a>
	<br>

	
	<?php  
	if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['content'])) {
		echo "<h1>Champs non remplis<h1>";
	
	?>

		<form class="ui form" action="submit_post.php" method="post">

			<input type="hidden" name="id" id="id" value="">
			<label for="author">Auteur</label>
			<div class="ui input">
				<input type="text" id="author"  name="author">
			</div>
			<br>
			<br>
			<label for="title">Titre</label>
			<div class="ui input">
				<input type="text" id="title"  name="title">
			</div>
			<br>
			<br>
			<label for="content">Contenu</label>

			<textarea  cols="10" rows="7"  type="text" id="content" name="content">
			</textarea>

			<br>
			<br>
			<input type="hidden" name="created_at" value="<?php 
			$date = new DateTime();
			echo $date->getTimestamp();?> ">
			<br>

			<input class="ui button" type="submit" value="Posté l'article">

		</form>

		<?php 
		
	}else{
		require_once 'index.php';
		$titleInput = $_POST['title'];
		$authorInput = $_POST['author'];
		$contentInput = $_POST['content'];
		$dateInput = date('Y-m-d H:i:s', $_POST['created_at']);


		$article = ORM::for_table('posts')->create();

		$article->author = $authorInput;
		$article->title = $titleInput;
		$article->content = $contentInput;
		$article->created_at = $dateInput;

		$article->save();

		header('Location: index.php');
		

	}
	?>
	
</body>
</html>