<?php
include_once "../conexao.php"; 
include_once "../includes/bootstrap.php";
$mensagem = "";

if (isset($_GET['id'])) {
    $id_aluno = htmlspecialchars($_GET['id']);

    $select = "SELECT * FROM tb_aluno WHERE id_aluno = :id_aluno";
    try {
        $result = $conn->prepare($select);
        $result->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount() > 0) {
            $aluno = $result->fetch(PDO::FETCH_OBJ);
        } else {
            echo "Aluno não encontrado!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar aluno: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID de aluno não fornecido!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $status_curso = htmlspecialchars($_POST['status_curso']);

    $fotoPath = $aluno->foto_aluno;
    $uploadDir = '../user/';
    $userImage = 'user.jpeg'; 
  
    // ... (código anterior)

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
        if ($aluno->foto_aluno !== $uploadDir . $userImage && file_exists($aluno->foto_aluno)) {
            unlink($aluno->foto_aluno); // Deletar a foto antiga
        }

        if (move_uploaded_file($fileTmpPath, $uploadDir . $fotoPath)) {
            // Sucesso no upload
        } else {
            $mensagem = "Erro ao carregar a foto.";
        }
    } else {
        $mensagem = "Formato de arquivo não permitido. Apenas JPG, JPEG, PNG, e WEBP são aceitos.";
    }
}

// ... (restante do código)

if ($nome !== $aluno->aluno_nome || $email !== $aluno->aluno_email || $status_curso !== $aluno->curso_status || $senha !== '' || $fotoPath !== $aluno->foto_aluno) {
    $update = "UPDATE tb_aluno SET aluno_nome = :nome, aluno_email = :email, aluno_senha = :senha, curso_status = :status_curso, foto_aluno = :foto WHERE id_aluno = :id_aluno";
    try {
        $stmt = $conn->prepare($update);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':status_curso', $status_curso);
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->bindParam(':foto', $fotoPath);
        $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: classroom.php");
            exit;
        } else {
            $mensagem = "Erro ao atualizar o aluno.";
        }
    } catch (PDOException $e) {
        $mensagem = "Erro ao atualizar aluno: " . $e->getMessage();
    }
} else {
    $mensagem = "Nenhuma alteração detectada.";
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
        <h1>Editar Aluno</h1>
        <div class="containe-main">
            <?php if (!empty($mensagem)): ?>
                <div id="message" class="notification"><?php echo $mensagem; ?></div>
            <?php endif; ?>
            <form method="POST" class="form_update" enctype="multipart/form-data">
                <label for="foto" name="foto" >Foto:</label>
                <input class="form-control" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png, .webp">
                <label for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($aluno->aluno_nome); ?>" required>
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo htmlspecialchars($aluno->aluno_email); ?>" required>
                <label for="status_curso">Curso:</label>
                <input class="form-control" type="text" id="status_curso" name="status_curso" value="<?php echo htmlspecialchars($aluno->curso_status); ?>" required>
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
    </script>
</body>
</html>
