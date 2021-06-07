<?php
        include "polacz.php"; 
        if ($sql = $baza->prepare( "SELECT DISTINCT * FROM car ORDER BY ID "))
        {
                $sql->execute();
                $sql->bind_result($id,$model,$kolor,$rocznik,$transmission);
                while ($sql->fetch())
                  $auto[] = array(
                        "ID" => $ID,
                        "mark" => $mark,
                        "model" => $model,
                        "vintage" => $vintage,
		        "color" => $color,
			"transmission" => $transmission,
                   );
                $sql->close();
        }
        $baza->close();
        echo json_encode($auto, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>