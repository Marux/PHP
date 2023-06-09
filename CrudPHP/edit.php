<?php
    include("db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $descripcion = $row['descripcion'];
        }

    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE task set title = '$title', descripcion =  '$descripcion' WHERE id = $id ";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Dato actualizado con éxito';
        $_SESSION['message_type'] = 'warning';
        header('Location: index.php');
    }
?>

<?php
include("includes/header.php")
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" value="<?php echo $title; ?>"  placeholder="Actualiza el titulo">
                    </div><br>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza la descripcion"><?php echo $descripcion;?></textarea>
                    </div><br>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/footer.php")
?>