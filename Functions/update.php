<?php
include_once 'polacz.php';
if(count($_GET)>0) {
mysqli_query($baza,"UPDATE car set ID='" . $_GET['ID'] . "', mark='" . $_GET['mark'] . "', model='" . $_GET['model'] . "', color='" . $_GET['color'] . "' ,vintage='" . $_GET['vintage'] . "',transmission='" . $_GET['transmission'] . "' WHERE ID='" . $_GET['ID'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($baza,"SELECT * FROM car WHERE ID='" . $_GET['ID'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../styles/style.css">


</head>
<body>
<form name="frmUser" method="GET" action="">
<div>
</div>

<table class="table table-hover table-dark">
    <thead>
<tr class="table table-dark">
<th>ID: <br>
<input type="hidden" name="ID" class="txtField" value="<?php echo $row['ID']; ?>">
<input type="text" name="ID"  value="<?php echo $row['ID']; ?>"></th>
<br>
<tr class="table table-dark"><th>mark: <br>
<input type="text" name="mark" class="txtField" value="<?php echo $row['mark']; ?>"></th></tr>
<br>
<tr class="table table-dark"><th>model:<br>
<input type="text" name="model" class="txtField" value="<?php echo $row['model']; ?>"></th></tr>
<br>
<tr class="table table-dark"><th>color:<br>
<input type="text" name="color" class="txtField" value="<?php echo $row['color']; ?>"></th></tr>
<br>
<tr class="table table-dark"><th>vintage:<br>
<input type="text" name="vintage" class="txtField" value="<?php echo $row['vintage']; ?>"></th></tr>
<br>
<tr class="table table-dark"><th>transmission:<br>
<input type="text" name="transmission" class="txtField" value="<?php echo $row['transmission']; ?>"></th></tr>
<br>
<tr class="table table-dark"><th><input type="submit"  class="btn btn-info"><button class="btn btn-secondary"><a href="https://localhost/formularz/index.php">Powrót</a></button></th></tr>
<tr>
</thead>

</table>
</form>
</body>
</html>