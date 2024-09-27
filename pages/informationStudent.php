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
    <title>Página com Perfil</title>
    <link rel="stylesheet" href="../css/informationStudent.css" />
    
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

  <aside class="sidebar">
    <!-- Menu Lateral -->
  
<div class="menuD">
    <details>
        <summary>Título 1</summary>
        <div class="contentM">
            <p>SubTítulo 1</p>
            <p>SubTítulo 2</p>
            <p>SubTítulo 3</p>
            <p>SubTítulo 4</p>
        </div>
    </details>
    <details>
        <summary>Título 2</summary>
        <div class="contentM">
            <p>SubTítulo 1</p>
            <p>SubTítulo 2</p>
            <p>SubTítulo 3</p>
            <p>SubTítulo 4</p>
        </div>
    </details>
    <details>
        <summary>Título 3</summary>
        <div class="contentM">
            <p>SubTítulo 1</p>
            <p>SubTítulo 2</p>
            <p>SubTítulo 3</p>
            <p>SubTítulo 4</p>
        </div>
    </details>
    <details>
        <summary>Título 4</summary>
        <div class="contentM">
            <p>SubTítulo 1</p>
            <p>SubTítulo 2</p>
            <p>SubTítulo 3</p>
            <p>SubTítulo 4</p>
        </div>
    </details>
    <details>
        <summary>Título 5</summary>
        <div class="contentM">
            <p>SubTítulo 1</p>
            <p>SubTítulo 2</p>
            <p>SubTítulo 3</p>
            <p>SubTítulo 4</p>
        </div>
    </details>
    <details>
        <summary>Título 6</summary>
        <div class="contentM">
            <p>SubTítulo 1</p>
            <p>SubTítulo 2</p>
            <p>SubTítulo 3</p>
            <p>SubTítulo 4</p>
        </div>
    </details>
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
    <script src="../js/scripts.js"></script>
</body>
</html>
