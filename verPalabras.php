<?php

    $con = mysqli_connect("localhost","root","","etica");

    if($con){

        $id = "SELECT * FROM `palabras` WHERE `ID` = ( SELECT MAX(ID) FROM `palabras`)";
        $result = mysqli_query($con,$id);
        $row = mysqli_fetch_array($result);
        $id = intval($row[0]);
        $id = $id;



        //obtener las palabras
        
        $TodasPalabras = array();
        for ($i=1; $i <= $id; $i++) { 
            $sql = "SELECT * FROM `palabras` WHERE ID = " . $i;
            $r = mysqli_query($con,$sql);
            $palabra = mysqli_fetch_array($r)[1];
            array_push($TodasPalabras,$palabra);
        }

        $filtradas = array();
        $veces = array();

        //agregar la cantidad de veces que salen
        $i = 0;
        foreach($TodasPalabras as $key => $palabra) {
            if(!in_array($palabra,$filtradas)){
                array_push($filtradas,$palabra);
                array_push($veces,1);

            }
            else{
                $index = array_search($palabra,$filtradas);
                $veces[$index] += 1;

            }

            $i += 1;
        }

        //escribirlas
        $tablaPa = "";
        $tablaN = "";

        for ($i=0; $i <= count($filtradas)  - 1; $i++) { 
            $tablaPa = $tablaPa . '<div class="palabra-info"> ' . $filtradas[$i] . ' </div>';
            $tablaN = $tablaN . '<div class="palabra-info">'. $veces[$i] .'</div>';
        }
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePHP.css">
    <title>Palabras</title>
</head>
<body>
    <div class="title">
        <h1>Estas fueron las palabras puestas por ustedes</h1>
    </div>
    <div class="contTable">
        <div class="table">
            <div class="tematica">
                <h3>Palabras</h3>
                <div class="contenido">
                    <?php echo $tablaPa ?>
                </div>
            </div>
            <div class="tematica">
            <h3>Veces</h3>

                <div class="contenido">
                <?php echo $tablaN ?>

                </div>
                
            </div>
            
        </div>
    </div>

</body>
</html>