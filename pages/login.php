<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Acesse Sua conta</title>
</head>
<body>
    <div class="container-main">
        <form action="">
            <label for="user" class="main-label">Usuário</label>
            <br>
            <input type="text" name=user class="main-input">
            <br>
            <label for="password" class="main-label">Senha</label>
            <br>
            <input type="password" name="password" class="main-input">
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

        <p>Esqueceu sua senha? <a href="#" class="change-password">clique aqui</a></p>
    </div>
</body>
</html>