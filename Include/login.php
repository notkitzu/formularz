<?php
include '../Functions/conn.php';
session_start();
$data = new Database;
$message = '';
if(isset($_POST["loguj"]))
{
  $field = array(
      'login' => $_POST['login'],
      'password' => $_POST['password'],
  );
  if($data->required_validation($field))
  {
    if($data->can_login("user",$field))
    {
      $_SESSION['login'] = $_POST['login'];
      header("location:../index.php");
    }
    else
    {
      $message = $data->error;
    }

  }
  else
  {
    $message = $data->error;
  }


}


?>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body class="bodylog">
<div class="logowanko">
<form method="post">
<h1>Logowanie</h1>
<?php
if(isset($message))
{
  echo "<label class='text-danger'>$message</label>";
}

?>
  <input type="text" name="login" placeholder="Login" autocomplete="off"><br>
  <input type="password" name="password" placeholder="Password"><br>
  <button type="submit" name="loguj" id="przycisk">Zaloguj</button><br><br>
   Nie masz konta? <a href="../Functions/rejestracja.php">Zajerestruj się!</a>
</form>
</div>
</body>
<?php
?>