<?php
session_start(); // Inicia a sessão para manter o estado do menu

// Verifica se o botão foi clicado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toggleMenu'])) {
        $_SESSION['showMenu'] = !isset($_SESSION['showMenu']) || !$_SESSION['showMenu'];
    }
}

// Define o estado do menu
$menuVisible = isset($_SESSION['showMenu']) && $_SESSION['showMenu'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página com Perfil</title>
    <link rel="stylesheet" href="../css/informationStudent.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        
        <form method="post" action="">
            <button class="toggle-button" type="submit" name="toggleMenu">
                <?php echo $menuVisible ? 'Ocultar Menu' : 'Mostrar Menu'; ?>
            </button>
        </form>
        <div class="navbar-logo">Logo</div>

        <!-- Menu em forma de lista -->
        <div class="menu" id="myMenu" style="display: <?php echo $menuVisible ? 'block' : 'none'; ?>;">
            <ul>
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
                <li><a href="#">Item 3</a></li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-section">
            <h2><a href="#">Título 1</a></h2>
            <h3><a href="#">Subtítulo 1</a></h3>
        </div>
        <div class="sidebar-section">
            <h2><a href="#">Título 2</a></h2>
            <h3><a href="#">Subtítulo 2</a></h3>
        </div>
    </aside>

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <!-- Seção de Perfil do Usuário -->
        <section class="user-profile">
            <div class="profile-photo">
                <img src="https://via.placeholder.com/100" alt="Foto de Perfil" />
            </div>
            <div class="profile-info">
                <h2>Nome do Usuário</h2>
                <p>Email: usuario@example.com</p>
                <p>Data de Vencimento da Matrícula: 00/00/0000</p>
            </div>
        </section>

        <!-- Seção de Conteúdo -->
        <section class="content">
            <h1>Conteúdo Principal</h1>
            <p>Adicione seu conteúdo principal aqui.</p>
        </section>

        <!-- Caixas de Imagem -->
        <section class="image-gallery">
            <div class="image-box">
                <a href="#"><img src="https://via.placeholder.com/150" alt="Imagem 1" /></a>
                <p>Legenda 1</p>
            </div>
            <div class="image-box">
                <a href="#"><img src="https://via.placeholder.com/150" alt="Imagem 2" /></a>
                <p>Legenda 2</p>
            </div>
            <div class="image-box">
                <a href="#"><img src="https://via.placeholder.com/150" alt="Imagem 3" /></a>
                <p>Legenda 3</p>
            </div>
            <div class="image-box">
                <a href="#"><img src="https://via.placeholder.com/150" alt="Imagem 4" /></a>
                <p>Legenda 4</p>
            </div>
            <div class="image-box">
                <a href="#"><img src="https://via.placeholder.com/150" alt="Imagem 5" /></a>
                <p>Legenda 5</p>
            </div>
            <div class="image-box">
                <a href="#"><img src="https://via.placeholder.com/150" alt="Imagem 6" /></a>
                <p>Legenda 6</p>
            </div>
        </section>
    </main>
</body>
</html>
