<?php
    include_once "../conexao.php";

    session_start(); // Inicia a sessão para manter o estado dos menus

// Verifica se o botão foi clicado para o menu principal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toggleMenu'])) {
        $_SESSION['showMenu'] = !isset($_SESSION['showMenu']) || !$_SESSION['showMenu'];
    }

    // Verifica se o botão foi clicado para o menu dropdown
    if (isset($_POST['toggleMenuDrop'])) {
        $_SESSION['showMenuDrop'] = !isset($_SESSION['showMenuDrop']) || !$_SESSION['showMenuDrop'];
    }

    // Verifica se o formulário foi enviado
    if (isset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['gender'], $_POST['class'], $_POST['course'], $_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $class = $_POST['class'];
        $course = $_POST['course'];
        $password = $_POST['password'];

        // Hash da senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Processa o upload da imagem
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $uploadFileDir = '../uploads/'; // Diretório onde as imagens serão salvas
            $dest_path = $uploadFileDir . basename($fileName);

            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Prepara a consulta SQL para inserir os dados
                $stmt = $pdo->prepare("INSERT INTO tb_aluno (aluno_nome, aluno_email, aluno_senha, aluno_genero, aluno_nascimento, curso_status, aluno_imagem) VALUES (?, ?, ?, ?, CURDATE(), ?, ?)");
                $stmt->execute([$name, $email, $hashedPassword, $gender, 'Em andamento', $fileName]);

                echo "Aluno cadastrado com sucesso!";
            } else {
                echo "Erro ao enviar o arquivo.";
            }
        } else {
            echo "Nenhuma imagem foi enviada ou ocorreu um erro no upload.";
        }
    }
}

// Define o estado dos menus
$menuVisible = isset($_SESSION['showMenu']) && $_SESSION['showMenu'];
$menuDropVisible = isset($_SESSION['showMenuDrop']) && $_SESSION['showMenuDrop'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulário de Matrícula</title>
    <link rel="stylesheet" href="../css/registration.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <button class="navbar-btn">Botão</button>
      <div class="navbar-logo">Logo</div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content">
      <section class="registration-box">
        <h1>Formulário de Matrícula</h1>
        <form action="#" method="post">
          <label for="name">Nome:</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />

          <label for="age">Idade:</label>
          <input type="number" id="age" name="age" required />

          <label for="gender">Gênero:</label>
          <select id="gender" name="gender" required>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
          </select>

          <label for="class">Turma:</label>
          <input type="text" id="class" name="class" required />

          <label for="course">Curso:</label>
          <input type="text" id="course" name="course" required />

          <button type="submit">Matricular</button>
        </form>
      </section>
    </main>
  </body>
</html>