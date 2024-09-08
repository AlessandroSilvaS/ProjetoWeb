<?php
session_start();
    include_once '../conexao.php'
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
        <img src="../gif/login.svg " class="login-image">
    </div>
    
    <div class="container-main">
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
          if(!empty($dados['SendLogin'])){
            
            $query_user = "SELECT id_aluno,aluno_nome,aluno_senha FROM tb_aluno WHERE aluno_nome =:username   LIMIT 1";

            $result_user = $conn-> prepare($query_user);
            $result_user -> bindParam(':username', $dados['username'], PDO::PARAM_STR);

            $result_user -> execute();

            if(($result_user) AND ($result_user->rowCount() !=0)){
                $row_user = $result_user-> fetch((PDO::FETCH_ASSOC));
            }else{
                    $_SESSION['msg'] ="ERRO: Usuário ou Senha invalidos!";
            }
          } 
          if(isset($_SESSION['msg'])){
                echo  $_SESSION['msg'];
                unset($_SESSION['msg']);
                
          }
    ?>
  
        <form action="" method ="post">
            <label for="username" class="main-label">Usuário</label>
            <br>
            <input type="text" name="username" class="main-input"  >
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
            <input type="submit" value="ENTRAR" class="submit-button" name = "SendLogin">
        </form>
        <p>Esqueceu sua senha? <a href="#" class="change-password">clique aqui</a></p>
    </div>
    </div>
</body>
</html>