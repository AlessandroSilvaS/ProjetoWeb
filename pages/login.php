<?php
session_start();
require ('../conexao.php');
include_once "../includes/bootstrap.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica em cada tabela se o usuário existe
    $tables = [
        'tb_aluno' => ['email_aluno' => 'aluno_email', 'senha_aluno' => 'aluno_senha'],
        'tb_caduser' => ['email_user' => 'caduser_email', 'senha_aluno' => 'caduser_senha'],
        'tb_diretor' => ['email_diretor' => 'email_diretor', 'senha_diretor' => 'senha_diretor']
    ];
    $role = null;

    foreach ($tables as $table => $fields) {
        // Ajuste os campos conforme as tabelas
        $emailField = $fields['email_aluno'] ?? $fields['email_user'] ?? $fields['email_diretor'];
        $senhaField = $fields['senha_aluno'] ?? $fields['caduser_senha'] ?? $fields['senha_diretor'];

        $stmt = $conn->prepare("SELECT * FROM $table WHERE $emailField = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user[$senhaField])) {
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['role'] = $table;
            $role = $table;
            break; 
        }
    }

    // Redireciona com base na tabela/role
    if ($role) {
        switch ($role) {
            case 'tb_aluno':
                header('Location: informationStudent.php');
                break;
            case 'tb_caduser':
                header('Location: classroom.php');
                break;
            case 'tb_diretor':
                header('Location: ../index.php');
                break;
        }
        exit;
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
                // Exibe a mensagem de erro dentro do formulário se o login falhar
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$role) {
                    echo '<div style="display:flex; justify-content:space-between; margin-top: 15px;" class="alert alert-primary" role="alert">Usuário ou Senha inválido! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
                ?>
        </div>
    </div>
</body>
</html>
