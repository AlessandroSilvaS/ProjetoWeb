<?php
include_once "../conexao.php";

include_once "../includes/bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="">
    <form method="post">
        <label for="">Nome Usuário:</label>
        <input type="text">
        <label for="">Email:</label>
        <input type="text">
        <label for="">Senha</label>
        <input type="text">
    </form>
    </div>
    <div class="">
        <button type="submit">Cadastrar</button>
    </div>
</body>
</html>