<?php
require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navside.php');?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-header align-items-center bg-transparent">
                        <div class="row">
                            <div class="col p-3">
                                <h4 class="fs-3">Visualizar usuário</h4>
                            </div>
                            <div class="col p-3">
                                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $sql = "SELECT * FROM usuarios WHERE  id='$user_id'";
                            $query = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $user = mysqli_fetch_array($query);
                        ?>
                        <div class="mb-3">
                            <label for="">Nome</label>
                            <p class="form-control">
                                <?=$user['nome'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="">E-mail</label>
                            <p class="form-control">
                                <?=$user['email'];?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label for="">Data de Nascimento</label>
                            <p class="form-control">
                                <?=date('d/m/Y', strtotime($user['dob']));?>
                            </p>
                        </div>
                        <?php  
                            } else {
                                echo "<h5>Usuário não encontrado 🐊</h5>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
  