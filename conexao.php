<?php
$host = "localhost";
$user = "root";
$pass = "bdjmf";
$dbname = "dbCursos_Alunos"; 

try {
    // Conectar ao banco de dados com PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Erro de conexão: " . $error->getMessage());
}
