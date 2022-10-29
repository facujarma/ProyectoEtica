<?php
    $con = mysqli_connect("localhost","root","","gae");
    if(!empty($_GET)){
        $id = "SELECT * FROM `presentacion` WHERE `ID` = ( SELECT MAX(ID) FROM `presentacion`)";
        $result = mysqli_query($con,$id);
        $row = mysqli_fetch_array($result);
        $id = intval($row[0]);
        $id = $id + 1;


        $texto = $_GET["t"];
        $titulo = $_GET["h"];

        $sql = "INSERT INTO `presentacion` (`ID`,`Titulo`,`Contenido`) VALUES ($id,'$titulo','$texto')";
        mysqli_query($con, $sql);
        echo $sql;

        echo '<script>location.href = "http://localhost/Trabajo%20De%20gae/crear/index.php?"</script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">

    <title>Fisico quimica</title>
</head>
<body onload="escalar()">
    <nav>
        <div class="search">
                Durante el modo Edicion no esta habilitada la busqueda por palabras claves*
        </div>
        <div class="diapositiva">
            Edicion
        </div>
    </nav>

    <div class="content">
        <div>
            <h1 id="title" contentEditable>Escribe un titulo</h1>
            <textarea id="subtitulo" contentEditable  cols="80" rows="15">Escribe acerca del tema</textarea>

        </div>
        

        <div class="comenzar">
            <a id="btn-sig" onclick="transformar()">Guardar y subir</a>
        </div>
    </div>
    <footer>
        Todos los derechos reservados* Copyright Facu Jarma 2022
    </footer>

    <script src="texto.js"></script>
</body>
</html>