<?php
include_once "../conexao.php";
session_start(); // Inicia a sessão para manter o estado dos menus

$message = ''; // Variável para armazenar mensagens
$imageBlob = null; // Para armazenar a imagem recuperada

// Verifica se a conexão ao banco de dados foi bem-sucedida
if (!$conn) {
    die("Erro de conexão ao banco de dados.");
}

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
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $age = (int)$_POST['age'];
        $gender = htmlspecialchars(trim($_POST['gender']));
        $class = htmlspecialchars(trim($_POST['class']));
        $course = htmlspecialchars(trim($_POST['course']));
        $password = $_POST['password'];

        // Hash da senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Processa o upload da imagem
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileType = mime_content_type($fileTmpPath);

            // Verifica se o arquivo é uma imagem
            if (strpos($fileType, 'image/') === 0) {
                $imageData = file_get_contents($fileTmpPath); // Lê o conteúdo da imagem

                // Prepara a consulta SQL para inserir os dados
                $stmt = $conn->prepare("INSERT INTO tb_aluno (aluno_nome, aluno_email, aluno_senha, aluno_genero, aluno_nascimento, curso_status, aluno_imagem) VALUES (?, ?, ?, ?, CURDATE(), ?, ?)");
                
                try {
                    if ($stmt->execute([$name, $email, $hashedPassword, $gender, 'Em andamento', $imageData])) {
                        $message = "Aluno cadastrado com sucesso!";
                    } else {
                        $message = "Erro ao cadastrar o aluno. Tente novamente.";
                    }
                } catch (PDOException $e) {
                    $message = "Erro no banco de dados: " . $e->getMessage();
                }
            } else {
                $message = "O arquivo enviado não é uma imagem.";
            }
        } else {
            if (isset($_FILES['image'])) {
                $message = "Erro no upload: " . $_FILES['image']['error'];
            } else {
                $message = "Nenhuma imagem foi enviada.";
            }
        }
    }
}

// Recupera a última imagem cadastrada
$stmt = $conn->query("SELECT foto_aluno FROM tb_aluno ORDER BY id DESC LIMIT 1"); // Ajuste conforme o nome da sua coluna de ID
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $imageBlob = $row['foto_aluno'];
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
        <form method="post" action="">
            <button class="toggle-button" type="submit" name="toggleMenu">
                <?php echo $menuVisible ? 'Ocultar Menu Principal' : 'Mostrar Menu Principal'; ?>
            </button>
        </form>
        <div class="navbar-logo">Logo</div>

        <!-- Menu Principal (Horizontal) -->
        <div class="menu" id="myMenu" style="display: <?php echo $menuVisible ? 'block' : 'none'; ?>;">
            <ul>
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
                <a href="logout.php">Logout</a>
            </ul>
        </div>
    </nav>
    <!-- Conteúdo Principal -->
    <main class="main-content">
        <section class="registration-box">
            <h1>Formulário de Matrícula</h1>
            <?php if ($message): ?>
                <div class="message"><?php echo $message; ?></div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data"> <!-- Adicionado enctype -->
                <label for="image">Imagem</label>
                <input class="buttonImg" type="file" id="image" name="image" required>
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

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required />

                <button type="submit">Matricular</button>
            </form>
        </section>
        
        <!-- Exibindo a imagem armazenada -->
        <?php if ($imageBlob): ?>
            <div class="image-display">
                <h2>Última Imagem Cadastrada:</h2>
                <img src="data:image/jpeg;base64,<?= base64_encode($imageBlob) ?>" alt="Imagem do Aluno" />
            </div>
        <?php endif; ?>

        <img class="imageRegistration" src="../images/registration1.png" alt="">
    </main>
</body>
</html>
