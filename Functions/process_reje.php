<?php

class DataBase
{

	public $con;
	public $error;


	public function __construct()
	{
		try {
			$this->con = new PDO("mysql:host=localhost;dbname=users", "root", "");
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Coś poszło nie tak' . $e->getMessage();
		}
	}

	public function required_validation($field)
	{
		$count = 0;
		$password = $field['password'];
		$repeat_password = $field['repeat_password'];
		$login = $field['login'];
		$email = $field['email'];

		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$this->error .= "<p> email jest nie poprawny</p>";
			$count++;
		}

		foreach ($field as $k => $v) {
			if (empty($v)) {
				$count++;
				$this->error .= "Pole -> " . $k . " jest wymagany<br>";
			}
		}

		$stmt = $this->con->prepare("SELECT email FROM user WHERE email = :email");
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$this->error = "Podany email jest juz zajety";
		} else {
			if ($password != $repeat_password) {
				$count++;
				$this->error .= "<p>Hasła nie są takie same</p>";
			}
			if ($count == 0) {
				return true;
			}
		}
	}


	public function can_login($table_name, $field)
	{
		$login = $field['login'];
		$password = $field['password'];
		$password = md5($password);
		$email = $field['email'];

		$stmt = $this->con->prepare("INSERT INTO  $table_name(id,login,password,email,code,active,role) VALUES ('',:login,:password,:email,'1','0', '1')");
		$stmt->bindParam(':login', $login, PDO::PARAM_STR);
		$stmt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() <= 0) {
			$this->error = "POPRAW";
			header("Location: https://localhost/formularz/Functions/rejestracja.php");
		} else {
			return true;
		}
	}
}