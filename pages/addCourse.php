<?php
include '../conexao.php';

// Processar o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $carga_horaria = $_POST['carga_horaria'];

    // Validação simples
    if (empty($nome) || empty($descricao) || empty($carga_horaria) || !is_numeric($carga_horaria)) {
        echo "Por favor, preencha todos os campos corretamente.";
    } else {
        try {
            // Inserir os dados no banco de dados
            $sql = "INSERT INTO tb_curso (curso_nome, curso_descricao, curso_duracao) VALUES (:nome, :descricao, :carga_horaria)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':carga_horaria', $carga_horaria);
            $stmt->execute();

            header('Location: ../index.php');
        } catch (PDOException $e) {
            echo "Erro ao adicionar curso: ".$e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Curso</title>
    <link rel="stylesheet" href="../css/addCourse.css">
</head>
<body>
    <header>
        <h1>Adicionar Novo Curso</h1>
    </header>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome do Curso:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do Curso:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="carga_horaria">Carga Horária (em horas):</label>
            <input type="number" id="carga_horaria" name="carga_horaria" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Adicionar Curso">
        </div>
    </form>
</body>
</html>
