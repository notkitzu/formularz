<?php
include '../Functions/process_reje.php';
session_start();
$data = new Database;
$message = '';
if (isset($_POST["rejestruj"])) {
	$field = array(
		'login' => $_POST['login'],
		'password' => $_POST['password'],
		'repeat_password' => $_POST['repeat_password'],
		'email' => $_POST['email'],
	);
	if ($data->required_validation($field)) {
		if ($data->can_login("user", $field)) {
			$_SESSION['rejestruj'] = $_POST['rejestruj'];
			header("location:../Include/login.php");
		} else {
			$message = $data->error;
		}
	} else {
		$message = $data->error;
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>

<body bgcolor="coral">
	<div class="reje">

		<form method="POST">
			<h2> REJESTRACJA </h2><br>
			<?php
			if (isset($message)) {
				echo "<label class='text-danger'>$message</label>";
			}

			?>
			<input type="text" name="login" placeholder="login">
			<br>
			<input type="text" name="password" placeholder="password">
			<br>
			<input type="text" name="repeat_password" placeholder="repeat password">
			<br>
			<input type="text" name="email" placeholder="email">
			<br>

			<input type="submit" name="rejestruj" value="submit">
		</form>
	</div>
</body>

</html>