<?php

$con = mysqli_connect("localhost","root","","etica");

if($con){
    $p = $_POST["word"];


    $id = "SELECT * FROM `palabras` WHERE `ID` = ( SELECT MAX(ID) FROM `palabras`)";
    $result = mysqli_query($con,$id);
    $row = mysqli_fetch_array($result);
    $id = intval($row[0]);
    $id = $id + 1;

    $sql = "INSERT INTO `palabras` (`ID`,`palabra`) VALUES($id,'$p')";
    $r = mysqli_query($con,$sql);

    echo '<script>location.href="http://localhost/Escuala_presentaciones/verPalabras.php"</script>';
}

?>