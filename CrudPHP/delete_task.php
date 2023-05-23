<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query Fail");
        }

        $_SESSION['message'] = 'Dato borrado con éxito';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");

    }


?>