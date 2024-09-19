<?php

    include_once "../conexao.php";
try {

    // Executa a consulta SQL
    $stmt = $conn->query("SELECT * FROM tb_curso");

    // Verifica se a consulta foi bem-sucedida
    if (!$stmt) {
        throw new Exception('Erro na consulta: ' . $conn->errorInfo()[2]);
    }

    // Busca todos os resultados em um array associativo
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se os dados são válidos
    if (!is_array($data)) {
        throw new Exception('Dados inválidos');
    }

    // Codifica o array para JSON e o envia como resposta
    header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON
    echo json_encode($data);
} catch (PDOException $e) {
    // Em caso de erro, codifica a mensagem de erro em JSON e a envia como resposta
    header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON
    echo json_encode(['error' => $e->getMessage()]);
} catch (Exception $e) {
    // Em caso de erro, codifica a mensagem de erro em JSON e a envia como resposta
    header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON
    echo json_encode(['error' => $e->getMessage()]);
}