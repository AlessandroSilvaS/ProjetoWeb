<?php
session_start();
require ('../conexao.php');
include_once "../includes/bootstrap.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Definição correta das tabelas e campos
    $tables = [
        'tb_aluno' => ['email' => 'aluno_email', 'senha' => 'aluno_senha', 'id' => 'id_aluno'],
        'tb_caduser' => ['email' => 'caduser_email', 'senha' => 'caduser_senha', 'id' => 'id_caduser'],
        'tb_diretor' => ['email' => 'email_diretor', 'senha' => 'senha_diretor', 'id' => 'id_diretor']
    ];
    
    $role = null; // Variável para armazenar o tipo de usuário logado

    foreach ($tables as $table => $fields) {
        // Ajuste correto dos campos de email e senha para cada tabela
        $emailField = $fields['email'];
        $senhaField = $fields['senha'];
        $idField = $fields['id'];

        // Prepara e executa a consulta para cada tabela
        $stmt = $conn->prepare("SELECT * FROM $table WHERE $emailField = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user[$senhaField])) {
            // Atribui o ID corretamente com base no tipo de usuário
            $_SESSION['user_id'] = $user[$idField];
            $_SESSION['role'] = $table; // Define a tabela como o papel do usuário
            $role = $table; // Define o papel atual
            break;
        }
    }

    // Redireciona com base na tabela/role
    if ($role) {
        switch ($role) {
            case 'tb_aluno':
                header('Location: informationStudent.php'); // Página do aluno
                exit;
            case 'tb_caduser':
                header('Location: classroom.php'); // Redireciona para a página do professor
                exit;
            case 'tb_diretor':
                header('Location: ../index.php'); // Página do diretor
                exit;
        }
    } else {
        // Se as credenciais estiverem erradas
        $error = "Usuário ou Senha inválido!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <link rel="icon" href="../images/icon.webp">
    <title>Acesse Sua Conta</title>
</head>
<body>
    <div class="pai">
        <div class="box">
            <img src="../gif/login.svg" class="login-image">
        </div>
        <div class="container-main">
            <form action="" method="post">
                <label for="username" class="main-label">Usuário (Email):</label>
                <input type="email" class="form-control" name="username" placeholder="Ex: Ana@gmail.com" required>
                
                <label class="main-label">Senha:</label>
                <input class="form-control" type="password" name="password" placeholder="Ex: 12345678" required>
                
                <input type="submit" value="ENTRAR" class="submit-button" name="SendLogin">
                
                <div class="cadastro">
                    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
                </div>
            </form>
            
            <?php
            if (isset($error)) {
                echo '<div style="margin-top: 15px;" class="alert alert-danger" role="alert">' . $error . '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
