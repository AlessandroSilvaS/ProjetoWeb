
<?php
session_start(); 

$_SESSION = array();

// Se você deseja destruir completamente a sessão, também deve deletar o cookie de sessão.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Por fim, destrua a sessão.
session_destroy();

// Redireciona o usuário para a página de login ou página inicial
header("Location: login.php");
exit();