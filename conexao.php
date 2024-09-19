<?php
$host = 'localhost'; // ou o endereço do seu servidor
$db = 'bdCursos_Alunos'; // nome do banco de dados
$user = 'root'; // nome de usuário do banco de dados
$pass = 'bdjmf'; // senha do banco de dados

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
