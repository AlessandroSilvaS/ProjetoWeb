<?php
include '../conexao.php';

// Processar o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_curso = $_POST['nome_curso'];

    // Validação simples
    if (empty($nome_curso)) {
        echo "Nome do curso inválido.";
    } else {
        try {
            // Remover o curso do banco de dados
            $sql = "DELETE FROM tb_curso WHERE curso_nome = :nome_curso";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nome_curso', $nome_curso);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Curso removido com sucesso!";
                header('Location: ../index.php');
            } else {
                echo "Nenhum curso encontrado com esse nome.";
            }
        } catch (PDOException $e) {
            echo "Erro ao remover curso: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Curso</title>
    <link rel="stylesheet" href="../css/remCourse.css"/>
</head>
<body>
    <header>
        <h1>Remover Curso</h1>
    </header>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome_curso">Digite o nome do Curso para Remover:</label>
            <input type="text" id="nome_curso" name="nome_curso" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Remover Curso">
        </div>
    </form>
</body>
</html>
