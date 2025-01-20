<?php
session_start();
require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navside.php');?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col p-3">
                                <h4 class="fs-3">Editar usuário</h4>
                            </div>
                            <div class="col p-3">
                                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-body border border-dark-subtle">
                        <?php
                        if (isset($_GET['id'])) {
                            $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $sql = "SELECT * FROM usuarios WHERE  id='$user_id'";
                            $query = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $user = mysqli_fetch_array($query);
                        ?>
                        <form action="action.php" method="post">
                            <input type="hidden" name="user_id" value="<?=$user['id']?>">
                            <div class="mb-3">
                                <label for="">Nome</label>
                                <input type="text" name="nome" value="<?=$user['nome']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?=$user['email']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Data de Nascimento</label>
                                <input type="date" name="dob" value="<?=$user['dob']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Senha</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_user" class="btn btn-primary">Salver</button>
                            </div>
                        </form>
                        <?php
                        } else {
                            echo "<h5>Usuário não encontrado</h5>";
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
