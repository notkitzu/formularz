<?php
include "polacz.php";
$ID = $_GET['ID'];
if($sql = $baza->prepare( "DELETE FROM car WHERE ID = ?;" ))
{
 $sql->bind_param( "i", $ID);
 $sql->execute();
 $sql->close();
}
$baza->close();
header("Location: https://localhost/formularz/index.php")

?>