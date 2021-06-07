<?php
include_once 'polacz.php';
$result = mysqli_query($baza,"SELECT * FROM car");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Delete employee data</title>
</head>
<body class="tabelkafast">
<table>
<tr>
<td>ID</td>
<td>mark</td>
<td>model</td>
<td>color</td>
<td>vintage</td>
<td>transmission</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["ID"]; ?></td>
<td><?php echo $row["mark"]; ?></td>
<td><?php echo $row["model"]; ?></td>
<td><?php echo $row["color"]; ?></td>
<td><?php echo $row["vintage"]; ?></td>
<td><?php echo $row["transmission"]; ?></td>
<td><a href="update.php?ID=<?php echo $row["ID"]; ?>">Update</a></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>