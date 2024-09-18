<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "";
$pass = "";
$dbname = "bdcursos_alunos.sql"; 

try {
    // Conectar ao banco de dados com PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Erro de conexão: " . $error->getMessage());
}

try {
    // Conectar ao banco de dados com PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Executa a consulta SQL
    $stmt = $conn->query("SELECT * FROM tb_curso");

    // Busca todos os resultados em um array associativo
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Codifica o array para JSON e o envia como resposta
    echo json_encode($data);
} catch (PDOException $e) {
    // Em caso de erro, codifica a mensagem de erro em JSON e a envia como resposta
    echo json_encode(['error' => $e->getMessage()]);
}
?>