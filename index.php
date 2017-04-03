<html>
<head>
	<link rel = 'stylesheet' type = 'text/css' href = 'styles/index_stylesheet.css'>
</head>
<body>
<center>
	<div class = 'banner'>
		<div class = 'title'>
			<a href = 'index.php'>Twitch sp<span class = 'title_bracket'>[</span>y<span class = 'title_bracket'>]</span></a>
		</div>
	</div>
	<div class = "overlay">
		<form action = '' method = 'get'>
			<span class = "form_title">
				Search a user
			</span>
			<br>
			<input id = 'searchField' class = 'field' type = 'text' name = 'user' autocomplete = 'off' autofocus><input class = 'button' type = 'submit' name = 'submit' value = 'search'>
		</form>
		<hr>

		<?php
			$on_main_page = 1;
			@$user = str_replace(' ', '', $_GET['user']);
			@$submit = $_GET['submit'];

			# If form submitted
			if(isset($submit) && !empty($user)){
				# Require data
				require('request.php');

				# Require display
				require('display.php');

				# Background
				if($profile_banner !== null){
					echo '<style>';
						echo 'body{
							background-image: url("'.$profile_banner.'")
							}';
					echo '</style>';
				}else{
					echo '<style>';
						echo 'body{
							background-image: url("images/background.jpeg")
							}';
					echo '</style>';
				}
			}else{
				# Require idle (top streams)
				require('idle.php');
			}
		?>
	</div>
	<?php
		require('footer.php');
	?>
</center>
<script src = 'event.js'></script>
</body>
</html>