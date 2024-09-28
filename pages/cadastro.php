<?php
include_once "../conexao.php";
include_once "../includes/bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="pai">
        <div class="box">
            <img src="../gif/login.svg" class="login-image">
        </div>
        <div class="container-main">
            <form method="post" enctype="multipart/form-data"> <!-- enctype adicionado para permitir upload de arquivos -->
                <label for="foto" class="main-label">Foto de Usuário:</label>
                <input class="form-control" name="foto" id="foto" type="file" multiple>

                <label for="username" class="main-label">Nome Usuário:</label>
                <input type="text" name="username" class="form-control" placeholder="Ana da Silva." required>
                
                <label for="email" class="main-label">Email:</label>
                <input type="text" class="form-control" name="email" placeholder="Ana@gmail.com" required>
                
                <label for="senha" class="main-label">Senha:</label>
                <input type="password" class="form-control" name="senha" placeholder="12345678" required>
                
                <label for="phone" class="main-label">Telefone:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="(85) 99245-6788" required oninput="formatPhone(this)" maxlength="15">

                <div class="type-user">
                    <div class="teacher-type">
                        <input class="form-check-input" type="checkbox" id="professor" name="professor">
                        <label for="professor">Professor</label>
                    </div>
                    <div class="principal-school-type">
                        <input class="form-check-input" type="checkbox" id="diretor" name="diretor">
                        <label for="diretor">Diretor</label>
                    </div>
                </div>
                
                <button type="submit" class="submit-button">Cadastrar</button>
                
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Coleta os dados do formulário
                $nome = $_POST['username'];
                $email = $_POST['email'];
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Senha criptografada
                $phone = $_POST['phone'];

       
                if (!empty($_FILES['foto']['name'])) {
                    $formatosPermitidos = array("png", "jpg", "jpeg", "webp");
                    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);

                    if (in_array(strtolower($extensao), $formatosPermitidos)) {
                        $pasta = "../user/"; 
                        $temporario = $_FILES['foto']['tmp_name'];
                        $novoNome = uniqid() . ".$extensao";

                        if (!move_uploaded_file($temporario, $pasta . $novoNome)) {
                            echo '<div class="alert alert-danger">Erro no upload da imagem.</div>';
                            exit();
                        }
                    } else {
                        echo '<div class="alert alert-danger">Formato de arquivo inválido.</div>';
                        exit();
                    }
                } else {
                    $novoNome = '../images/user.jpeg'; 
                }

                try {
                    // Inicia a transação
                    $conn->beginTransaction();

                    // Verifica se o checkbox de diretor está marcado
                    if (isset($_POST['diretor'])) {
                        $director = "INSERT INTO tb_diretor (nome_diretor, senha_diretor, email_diretor, foto_diretor) 
                                     VALUES (:nome, :senha, :email, :foto)";
                        $cad_Director = $conn->prepare($director);
                        $cad_Director->bindParam(':nome', $nome);
                        $cad_Director->bindParam(':email', $email);
                        $cad_Director->bindParam(':senha', $senha);
                        $cad_Director->bindParam(':foto', $novoNome);
                        $cad_Director->execute();
                    }

                    // Verifica se o checkbox de professor está marcado
                    if (isset($_POST['professor'])) {
                        $usuarios = "INSERT INTO tb_caduser (caduser_name, caduser_email, caduser_senha, caduser_telefone, foto_caduser) 
                                     VALUES (:nome, :email, :senha, :phone, :foto)";
                        $cad_Usuarios = $conn->prepare($usuarios);
                        $cad_Usuarios->bindParam(':nome', $nome);
                        $cad_Usuarios->bindParam(':email', $email);
                        $cad_Usuarios->bindParam(':senha', $senha);
                        $cad_Usuarios->bindParam(':phone', $phone);
                        $cad_Usuarios->bindParam(':foto', $novoNome);
                        $cad_Usuarios->execute();
                    }

                    // Comita a transação
                    $conn->commit();

                    echo '<div "alert alert-warning" >Usuário cadastrado com sucesso!</div>';

                } catch (Exception $e) {
                    // Se ocorrer um erro, desfaz a transação
                    $conn->rollBack();
                    echo '<div class="alert alert-danger">Erro ao cadastrar: ' . $e->getMessage() . '</div>';
                }
            }
            ?>
            
            <a href="login.php" class="login">Voltar</a>
        </div> 
    </div>

    <script>
        function formatPhone(input) {
            let phone = input.value.replace(/\D/g, '');
            if (phone.length > 11) {
                phone = phone.slice(0, 11);
            }
            if (phone.length > 10) {
                phone = phone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else if (phone.length > 6) {
                phone = phone.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else if (phone.length > 2) {
                phone = phone.replace(/(\d{2})(\d{0,5})/, '($1) $2');
            } else {
                phone = phone.replace(/(\d)/, '($1');
            }
            input.value = phone;
        }
    </script>
</body>
</html>
