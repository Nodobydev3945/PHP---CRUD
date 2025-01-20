<?php
session_start();
require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <?php include('navside.php');?>
    <div class="container mt-4">
        <?php include('mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col p-3">
                                <h4 class="fs-3">Lista de Usuários</h4>
                            </div>
                            <div class="col p-3">
                                <a href="user-create.php" class="btn btn-primary float-end"><span class="bi-person-fill-add"></span>&nbsp; Adicionar Usuário</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM usuarios';
                                $users = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($users) > 0) {
                                    foreach($users as $user) {
                                ?>
                                <tr>
                                    <td><?= $user['id']?></td>
                                    <td><?= $user['nome']?></td>
                                    <td><?= $user['email']?></td>
                                    <td><?= date('d/m/Y', strtotime($user['dob']))?></td>
                                    <td>
                                        <a href="usuario-view.php?id=<?=$user['id'];?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp; Visualizar</a>
                                        <a href="usuario-edit.php?id=<?=$user['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp; Editar</a>
                                        <form action="action.php" method="post" class="d-inline">
                                            <button onclick="return confirm('Você tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$user['id']?>" class="btn btn-danger btn-sm"><span class="bi-trash3-fill"></span>&nbsp; Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    } 
                                }else {
                                    echo '<h5>Nenhum usuário encontrado 🐊</h5>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
