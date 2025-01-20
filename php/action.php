<?php
session_start();
require 'connection.php';

if (isset($_POST['create_user'])) {
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $dob = mysqli_real_escape_string($conn, trim($_POST['dob']));
    $pass = isset($_POST['pass']) ? mysqli_real_escape_string($conn, password_hash(trim($_POST['pass']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO usuarios (nome, email, dob, pass) VALUES ('$nome', '$email', '$dob', '$pass')";

    mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso 🦕';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi criado 🐊';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['update_user'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $dob = mysqli_real_escape_string($conn, trim($_POST['dob']));
    $pass = mysqli_real_escape_string($conn, trim($_POST['pass']));

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', dob = '$dob'";

    if (!empty($pass)) {
        $sql .= ", pass='" . password_hash($pass, PASSWORD_DEFAULT) . "'";
    }

    $sql .= " WHERE id = '$user_id'";

    mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso 🦕';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi atualizado 🐊';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['delete_usuario'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['delete_usuario']);
    
    $sql = "DELETE FROM usuarios WHERE id = '$user_id'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensagem'] = 'Usuário deletado com sucesso 🦕';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi deletado 🐊';
        header('Location: index.php');
        exit;
    }
}

?>