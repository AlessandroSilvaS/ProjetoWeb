<?php
    include '../conexao.php';
    header('Content-Type: application/json');

    try{
        $sql = $conn->query("SELECT * FROM tb_curso");
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }