<?php
include_once 'polacz.php';
if(isset($_GET['save']))
{	 
     $ID = $_GET['ID'];
	 $mark = $_GET['mark'];
	 $model = $_GET['model'];
	 $color = $_GET['color'];
     $vintage = $_GET['vintage'];
	 $transmission = $_GET['transmission'];
	 $sql = "INSERT INTO car (ID,mark,model,color,vintage,transmission )
	 VALUES ('$ID','$mark','$model','$color','$vintage','$transmission')";
	 if (mysqli_query($baza, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($baza);
	 }
	 mysqli_close($baza);
}
header("Location: https://localhost/formularz/index.php")

?>