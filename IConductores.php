<?php
    $Rfc = $_POST['Rfc'];
    $Foto = $_POST['Foto'];

     $SQL = "INSERT INTO Conductores VALUES ('$Rfc', '$Foto');";

    $destdir = 'ImagenesPerfil/';   // path destination
    $img=file_get_contents($Foto);
    file_put_contents($destdir.substr($Foto, strrpos($Foto,'/')), $img);
