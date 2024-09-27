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
            <form method="post">
     
                <input class="form-control" name="foto" id="foto" type="file" id="formFileMultiple" multiple>

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
                        <input class="form-check-input" type="checkbox"id="diretor" name="diretor" >
                        <label for="diretor">Diretor</label>
                    </div>
                </div>
                
                <button type="submit" class="submit-button">Cadastrar</button>
                
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nome = $_POST['username'];
                $email = $_POST['email'];
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $phone = $_POST['phone'];


            if (!empty($_FILES['foto']['name'])) {
                $formatosPermitidos = array("png", "jpg", "jpeg", "gif"); // Formatos permitidos
                $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); // Obtém a extensão do arquivo

                // Verifica se a extensão do arquivo está nos formatos permitidos
                if (in_array(strtolower($extensao), $formatosPermitidos)) {
                    $pasta = "img/"; // Define o diretório para upload
                    $temporario = $_FILES['foto']['tmp_name']; // Caminho temporário do arquivo
                    $novoNome = uniqid() . ".$extensao"; // Gera um nome único para o arquivo

                    // Move o arquivo para o diretório de imagens
                    if (move_uploaded_file($temporario, $pasta . $novoNome)) {
                        // Sucesso no upload da imagem
                    } else {
                        echo '<div class="container">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> Erro!</h5>
                                    Não foi possível fazer o upload do arquivo.
                                </div>
                            </div>';
                        exit(); // Termina a execução do script após o erro
                    }
                } else {
                    echo '<div class="container">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Formato Inválido!</h5>
                                Formato de arquivo não permitido.
                            </div>
                        </div>';
                    exit(); // Termina a execução do script após o erro
                }
            } else {
                // Define um avatar padrão caso não seja enviado nenhum arquivo de foto
                $novoNome = 'avatar-padrao.png'; // Nome do arquivo de avatar padrão
            }

            
                try {
                    // Inicia uma transação
                    $conn->beginTransaction();
            
                   
                    if (isset($_POST['diretor'])) {
                        $director = "INSERT INTO tb_diretor (nome_diretor, senha_diretor, email_diretor) VALUES (:nome, :senha, :email)";
                        $cad_Director = $conn->prepare($director);
                        $cad_Director->bindParam(':nome', $nome);
                        $cad_Director->bindParam(':email', $email);
                        $cad_Director->bindParam(':senha', $senha);
                        $cad_Director->execute();
                    }
            
                    
                    if (isset($_POST['professor'])) {
                        $usuarios = "INSERT INTO tb_caduser (caduser_name, caduser_email, caduser_senha, caduser_telefone) VALUES (:nome, :email, :senha, :phone)";
                        $cad_Usuarios = $conn->prepare($usuarios);
                        $cad_Usuarios->bindParam(':nome', $nome);
                        $cad_Usuarios->bindParam(':email', $email);
                        $cad_Usuarios->bindParam(':senha', $senha);
                        $cad_Usuarios->bindParam(':phone', $phone);
                        $cad_Usuarios->execute();
                    }
            
                    // Se tudo ocorreu bem, comita a transação
                    $conn->commit();
                    
                    echo '<div style="display:flex; justify-content:space-between;"class="alert alert-warning" role="alert">
                        Usuário Cadastrado!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } catch (Exception $e) {
                    // Se ocorrer um erro, reverte a transação
                    $conn->rollBack();
                    echo "<script>alert('Erro ao cadastrar: " . $e->getMessage() . "');</script>";
                }
            }
            ?>
            <a href="login.php" class="login">Voltar</a>
        </div> 
    </div>
    <script>
        function formatPhone(input) {
            // Remove caracteres não numéricos
            let phone = input.value.replace(/\D/g, '');
            
            // Limita o número a 11 dígitos
            if (phone.length > 11) {
                phone = phone.slice(0, 11);
            }
            
            // Formata o número de telefone
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
