<?php

include("db.php");

if (isset($_POST['save_task'])){
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];
    
    $query = "INSERT INTO task(title, descripcion) VALUES ('$title', '$descripcion')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("query Failed");
    }

    $_SESSION['message'] = 'Datos Guardados Con Éxito';
    $_SESSION['message_type'] = 'success';

header ("Location: index.php");

}


?>