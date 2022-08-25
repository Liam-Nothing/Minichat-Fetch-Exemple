<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<header>
		
		</header>
		<main>
			<div class="card m-4">
				<div class="card-header">
					Envoyer un message
				</div>
				<form class="p-4">
					<div class="form-group">
						<label for="exampleInputEmail1">Pseudo</label>
						<input type="text" class="form-control" maxlength="50" id="username" name="username" aria-describedby="Pseudo" placeholder="Enter votre pseudo" value="<?php if (isset($_GET["p"])) echo htmlspecialchars($_GET["p"]); ?>">
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<input type="text" class="form-control" maxlength="250" id="message" name="message" placeholder="Bonjour, je suis ...">
					</div>
					<button type="button" class="btn btn-primary" id="submit_btn" onclick="postAMessage()">Envoyer</button>
				</form>
			</div>
			<div class="card m-4">
				<div class="card-header">
					Minichat
				</div>
				<div class="p-4" id="chat_messages">
				</div>
			</div>
		</main>
		<footer>
		
		</footer>
		<script src="js/scripts.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>