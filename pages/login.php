<?php
    include_once "../conexao.php"
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Acesse Sua conta</title>
</head>
<body>
    <div class="pai">
<div class="box">
    <img src="../gif/login.svg" alt="">
        </div>
    <div class="container-main">
  
        <form action="" method ="post">
            <label for="username" class="main-label">Usuário</label>
            <br>
            <input type="text" name=username class="main-input"  >
            <i class="bi bi-envelope-fill"></i>
            <br>
            <label for="password" class="main-label">Senha</label>
            <br>
            <input type="password" name="password" class="main-input">
            <i class="bi bi-incognito"></i>
            <div class="type-user">
                <div class="student-type">
                <input type="radio" name="typeUser">
                    <label for="typeUser">Aluno</label>
                </div>
                <div class="teacher-type">
                    <input type="radio" name="typeUser">
                    <label for="typeUser">Professor</label>
                </div>
                <div class="principal-school-type">
                    <input type="radio" name="typeUser">
                    <label for="typeUser">Diretor</label>
                </div>
            </div>
            <input type="submit" value="ENTRAR" class="submit-button">
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    try {
                        // Prepare a consulta para buscar o usuário
                        $sql = "SELECT * FROM tb_aluno WHERE aluno_nome = :username";
                        $stmt = $conn->prepare($sql);
                        // Bind do parâmetro :username
                        $stmt->bindParam(':username', $username);
                        $stmt->execute();
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($user && password_verify($password, $user['password_hash'])) {
                            // Login bem-sucedido
                            session_start();
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['username'] = $user['aluno_nome']; // Ajustado para refletir o campo correto
                            header('Location: ../index.php'); // Página de sucesso após o login
                            exit();
                        } else {
                            // Falha no login
                            echo 'Usuário ou senha inválidos.';
                        }
                    } catch (PDOException $e) {
                        echo "Erro na consulta: " . $e->getMessage();
                    }
                } else {
                    echo 'Usuário e senha são necessários.';
                }
            } else {
                // Caso o acesso ao script não seja via POST
                echo 'Método de solicitação inválido.';
            }
            ?>


        <p>Esqueceu sua senha? <a href="#" class="change-password">clique aqui</a></p>
    </div>
    </div>
</body>
</html>