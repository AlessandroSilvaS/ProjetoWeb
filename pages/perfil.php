<?php
include_once "../conexao.php"; 
include_once "../includes/bootstrap.php";
$mensagem = "";

if (isset($_GET['id'])) {
    $id_caduser = htmlspecialchars($_GET['id']);

    $select = "SELECT * FROM tb_caduser WHERE id_caduser = :id_caduser";
    try {
        $result = $conn->prepare($select);
        $result->bindParam(':id_caduser', $id_caduser, PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount() > 0) {
            $professor = $result->fetch(PDO::FETCH_OBJ);
        } else {
            echo "Professor não encontrado!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar professor: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID do professor não fornecido!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    $fotoPath = $professor->foto_caduser;
    $uploadDir = '../user/';
    $userImage = 'user.jpeg';
// Para a parte da imagem
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['foto']['tmp_name'];
    $fileName = $_FILES['foto']['name'];
    $fileNameCmps = explode('.', $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $allowedExts = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($fileExtension, $allowedExts)) {
        $fotoPath = uniqid() . ".{$fileExtension}";

        // Verifica se a foto atual não é a padrão e se o arquivo existe antes de deletar
        if ($professor->foto_caduser !== $uploadDir . $userImage && file_exists($professor->foto_caduser)) {
            unlink($professor->foto_caduser); // Deletar a foto antiga
        }        if (move_uploaded_file($fileTmpPath, $uploadDir . $fotoPath)) {
            // Sucesso no upload
        } else {
            $mensagem = "Erro ao carregar a foto.";
        }
    } else {
        $mensagem = "Formato de arquivo não permitido. Apenas JPG, JPEG, PNG, e WEBP são aceitos.";}}
    // Verifica se alguma alteração foi feita
    $update = "UPDATE tb_caduser SET caduser_name = :nome, caduser_email = :email, foto_caduser = :foto";
    
   
    if (!empty($senha)) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $update .= ", caduser_senha = :senha";
    }

    $update .= " WHERE id_caduser = :id_caduser";

    try {
        $stmt = $conn->prepare($update);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':foto', $fotoPath);
        $stmt->bindParam(':id_caduser', $id_caduser, PDO::PARAM_INT);

        // Bind da senha somente se ela não estiver vazia
        if (!empty($senha)) {
            $stmt->bindParam(':senha', $senha_hash);
        }

        if ($stmt->execute()) {
            header("Location: classroom.php");
            exit;
        } else {
            $mensagem = "Erro ao atualizar o perfil.";
        }
    } catch (PDOException $e) {
        $mensagem = "Erro ao atualizar o perfil: " . $e->getMessage();
    }
}

?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    
    <link rel="stylesheet" href="../css/updatecontato.css">
    <link rel="stylesheet" href="../gif/update/update-styles.css">
    
</head>

<body>
<div class="super_pai" style="display: flex;">
<img src="../gif/update/update-not-css.svg" width="600px" style="margin-left: 10%;">
    <div class="pai">
        <h1>Editar Perfil</h1>
        <div class="containe-main">
            <?php if (!empty($mensagem)): ?>
                <div id="message" class="notification"><?php echo $mensagem; ?></div>
            <?php endif; ?>
            <form method="POST" class="form_update" enctype="multipart/form-data">
                <label for="foto" name="foto" >Foto:</label>
                <input class="form-control" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png, .webp">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($professor->caduser_name); ?>" required>
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo htmlspecialchars($professor->caduser_email); ?>" required>
                <label for="status_curso">Telefone:</label>
                <input class="form-control" type="text" id="status_curso" name="status_curso" value="<?php echo htmlspecialchars($professor->caduser_telefone); ?>" required oninput="formatPhone(this)" maxlength="15">
                <label for="senha">Senha:</label>
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Digite a nova senha (deixe em branco para manter a atual)">
                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
        <a href="classroom.php">Voltar</a>
    </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; <?php echo date('Y'); ?> Todos os direitos reservados.</p>
        <p><strong>Git Hub </strong><a href="https://github.com/AlessandroSilvaS/ProjetoWeb" class="text-white"><i class="bi bi-github"></i></a></p>
    </footer>
    
    <script>
        window.onload = function() {
            var messageElement = document.getElementById('message');
            if (messageElement) {
                setTimeout(function() {
                    messageElement.style.opacity = '0'; 
                    setTimeout(function() {
                        messageElement.style.display = 'none'; 
                    }, 600); 
                }, 3000); 
            }
        };

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
