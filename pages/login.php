<?php
session_start();
include_once '../conexao.php';
include_once "../includes/bootstrap.php"


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
                <br>
                <input type="email" class="form-control"name="username" class="main-input" placeholder="Ex:Ana@gmail.com" required>
                <br>
                <label  class="main-label">Senha:</label>
                <br>
                <input class="form-control" type="password" name="password" class="main-input" placeholder="Ex:12345678" required>
                <div class="type-user">
                    <div class="student-type">
                        <input class="form-check-input" type="checkbox" id="aluno" name="aluno">
                        <label for="aluno">Aluno</label>
                    </div>
                    <div class="teacher-type">
                        <input class="form-check-input" type="checkbox" id="professor" name="professor">
                        <label for="professor">Professor</label>
                    </div>
                    <div class="principal-school-type">
                        <input class="form-check-input" type="checkbox"id="diretor" name="diretor">
                        <label for="diretor">Diretor</label>
                    </div>
                </div>
               
                <input type="submit"  value="ENTRAR" class="submit-button" name="SendLogin">

                <div class="cadastro">
                    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
                </div>
            </form>
            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (!empty($dados['SendLogin'])) {
                $username = filter_var($dados['username'], FILTER_SANITIZE_EMAIL);
                $password = $dados['password'];
                
                // Verifica se o tipo de usuário foi selecionado
                $userType = null;
                if (!empty($dados['aluno'])) {
                    $userType = 'aluno';
                } elseif (!empty($dados['professor'])) {
                    $userType = 'professor';
                } elseif (!empty($dados['diretor'])) {
                    $userType = 'diretor';
                } 
            
            else {
        $_SESSION['msg'] ='<div style="display:flex; justify-content:space-between;" class="alert alert-primary" role="alert">
        Tipo de Usuário não selecionado!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location: login.php");
        exit();
    }

    // Verifica o usuário baseado no tipo
    if ($userType === 'aluno') {
        $query_user = "SELECT id_aluno, aluno_nome, aluno_email, aluno_senha FROM tb_aluno WHERE aluno_email = :username LIMIT 1";
    } elseif ($userType === 'professor') {
        $query_user = "SELECT id_caduser, caduser_name, caduser_senha, caduser_email FROM tb_caduser WHERE caduser_email = :username LIMIT 1";
    } else { // $userType === 'diretor'
        $query_user = "SELECT id_diretor, nome_diretor, senha_diretor, email_diretor FROM tb_diretor WHERE email_diretor = :username LIMIT 1";
    }
    
    $result_user = $conn->prepare($query_user);
    $result_user->bindParam(':username', $username, PDO::PARAM_STR);
    $result_user->execute();
    if ($result_user && $result_user->rowCount() != 0) {
        $row_user = $result_user->fetch(PDO::FETCH_ASSOC);
        $storedPasswordHash = $row_user['aluno_senha'] ?? $row_user['caduser_senha'] ?? $row_user['senha_diretor'];
        
        if (password_verify($password, $storedPasswordHash)) {
            if ($userType === 'aluno') {
                $_SESSION['id_aluno'] = $row_user['id_aluno'];
                $_SESSION['aluno_nome'] = $row_user['aluno_nome'];
                $_SESSION['aluno_password'] = $storedPasswordHash;
                header("Location: informationStudent.php");
            } elseif ($userType === 'professor') {
                $_SESSION['id_caduser'] = $row_user['id_caduser'];
                $_SESSION['caduser_name'] = $row_user['caduser_name'];
                $_SESSION['caduser_senha']= $storedPasswordHash;
                header("Location: classroom.php");
            } elseif ($userType === 'diretor') {
                $_SESSION['id_diretor'] = $row_user['id_diretor'];
                $_SESSION['diretor_name'] = $row_user['nome_diretor'];
                $_SESSION ['diretor_senha'] = $storedPasswordHash;
                header("Location: ../index.php");
               
            }
            exit();
        } else {
            $_SESSION['msg'] = '<div style="display:flex; justify-content:space-between;" class="alert alert-danger" role="alert">
            Senha Incorreta!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = '<div style="display:flex; justify-content:space-between;" class="alert alert-warning" role="alert">
        Usuário Inválido!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        header("Location: login.php");
        exit();
    }
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>   
        </div>
    </div>
</body>
</html>
