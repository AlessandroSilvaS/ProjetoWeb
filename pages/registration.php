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
    if (isset($_POST['name'], $_POST['email'], $_POST['age'], $_POST['gender'], $_POST['cpf'], $_POST['course'], $_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nasc = $_POST['age'];
        $gender = $_POST['gender'];
        $cpf = $_POST['cpf'];
        $course = $_POST['course'];
        $password = $_POST['password'];

        // Formata o CPF
        $cpfFormatado = formatarCPF($cpf);

        // Verifica se o CPF é válido após formatação
        if ($cpfFormatado === "CPF inválido") {
            echo $cpfFormatado;
            exit;
        }

        // Hash da senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Processa o upload da imagem
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $uploadFileDir = '../user/'; // Diretório onde as imagens serão salvas
            $dest_path = $uploadFileDir . basename($fileName);

            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Prepara a consulta SQL para inserir os dados
                $stmt = $conn->prepare("INSERT INTO tb_aluno (aluno_nome, aluno_nascimento, aluno_email, aluno_senha, aluno_cpf, aluno_genero, curso_status, foto_aluno) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$name, $nasc, $email, $hashedPassword, $gender, $cpf, 'Em andamento', $fileName]);

                echo "Aluno cadastrado com sucesso!";
            } else {
                echo "Erro ao enviar o arquivo.";
            }
        } else {
            echo "Nenhuma imagem foi enviada ou ocorreu um erro no upload.";
        }
    }
}

// Função para formatar CPF
function formatarCPF($cpf) {
    // Remove qualquer caractere que não seja número
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return "CPF inválido";
    }

    // Formata o CPF
    return preg_replace('/^(\d{3})(\d{3})(\d{3})(\d{2})$/', '$1.$2.$3-$4', $cpf);
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
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="image">Imagem</label>
                <input class="buttonImg" type="file" id="image" name="image">
                
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required />

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />

                <label for="age">Data de Nascimento:</label>
                <input type="date" id="age" name="age" required />

                <label for="gender">Gênero:</label>
                <select id="gender" name="gender" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>

                <label for="cpf">CPF:</label>
                <input type="number" id="cpf" name="cpf"   required oninput="aplicarMascaraCPF(event)" />

                <label for="course">Curso:</label>
                <input type="text" id="course" name="course" required />

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required />

                <button type="submit">Matricular</button>
            </form>
        </section>
        <img class="imageRegistration" src="../images/registration1.png" alt="">
    </main>
</body>
</html>
