<?php
session_start();
require_once('conn.php');
$data = new Database();

if(empty($_SESSION["login"]))
{
    header("location:http://localhost/formularz/include/login.php");
}else {
    echo 'hi '.$_SESSION['login'];
}
if($data->checkRole($_SESSION['login']));

?>

<table class="table table-hover table-dark">
    <thead>
<tr class="tabelka">
    <th>
        ID
    </th>
    <th>
        Marka
    </th>
    <th>
        Model
    </th>
    <th>
        vintage
    </th>
    <th>
        color
    </th>
    <th>
        transmission
    </th>
    <th>
        Edytuj
    </th>
    <th>
        usuń
    </th>
    <th>
        <a href="http://localhost/formularz/Functions/logout.php"><button class="btn btn-info">Wyloguj</button></a>
    </th>
</tr>
<?php
require_once('polacz.php');
$sql="SELECT * FROM car";
$result=mysqli_query($baza ,$sql);
$ctn=1;
if(mysqli_num_rows($result)>0)
{
 while($row=mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?= $row['ID']?></td>
    <td><?= $row['mark']?></td>
    <td><?= $row['model']?></td>
    <td><?= $row['vintage']?></td>
    <td><?= $row['color']?></td>
    <td><?= $row['transmission']?></td>
    <td><a href="Functions/update.php?ID=<?= $row['ID']?>&mark=<?= $row['mark']?>&model=<?= $row['model']?>&vintage=<?= $row['vintage']?>&color=<?= $row['color']?>&transmission=<?= $row['transmission']?>">
    
    <?php if(($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'editor')) :?>
    <button  class="btn btn-warning"   id="myBtn1">edytuj</button></a></td>
    <?php
    endif;
    ?>
    <td><a href="Functions/delete.php?ID=<?= $row['ID']?>">

    <?php if(($_SESSION['login'] == 'admin')) :?>
    <button class="btn btn-danger">usuń</button></a></td>
    <?php
    endif;
    ?>
</tr>

<?php
$ctn++;
};
}
else{
?>
<TD colspan="7">
    <?= 'brak danych'?>
</TD>

<?php
}
mysqli_close($baza);
?>
</thead>
</table>
<?php if($_SESSION['login'] == 'admin' || $_SESSION['login'] == 'editor') : ?>
<button id="myBtn" class="btn btn-primary btn-lg btn-block" >dodaj</button>
<?php
endif;
?>