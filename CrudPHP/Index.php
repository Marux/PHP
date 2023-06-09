<?php include ("db.php")?>

<?php include("includes/header.php")  ?>

    <div class="container p-4">

        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']   ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php  session_unset();  }?>

                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Escribe el titulo" autofocus>
                    </div><br>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción"></textarea>
                    </div><br>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                    </form> 

                </div>
            </div>
            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha de creación</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $query = "SELECT * FROM task";
                                $result_task = mysqli_query($conn, $query);
                                
                                while($row = mysqli_fetch_array($result_task)){ ?>
                                    <tr>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['descripcion']?></td>
                                        <td><?php echo $row['create_at']?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                            <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>



            </div>
        </div>
    </div>


<?php include("includes/footer.php")?>