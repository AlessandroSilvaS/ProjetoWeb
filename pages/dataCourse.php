<?php
include '../conexao.php';
header('Content-Type: application/json');

try {
    // Executa a consulta SQL
    $sql = $conn->query("SELECT * FROM tb_curso");

    // Busca todos os resultados em um array associativo
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Codifica o array para JSON e o envia como resposta
    echo json_encode($data);
} catch (PDOException $e) {
    // Em caso de erro, codifica a mensagem de erro em JSON e a envia como resposta
    echo json_encode(['error' => $e->getMessage()]);
}
?>