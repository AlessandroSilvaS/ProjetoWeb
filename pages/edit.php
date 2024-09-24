<?php
include '../conexao.php'; 

// Verifica se o ID do curso foi passado na URL
if (isset($_GET['id'])) {
    $curso_id = $_GET['id'];

    // Busca o curso no banco de dados
    $sql = "SELECT * FROM cursos WHERE id = $curso_id";
    $result = $conn->query($sql);

    // Verifica se o curso existe
    if ($result->num_rows > 0) {
        $curso = $result->fetch_assoc();
    } else {
        echo "Curso não encontrado!";
        exit;
    }
} else {
    echo "ID do curso não informado!";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $carga_horaria = $_POST['carga_horaria'];

    // Validação básica
    if (empty($nome) || empty($descricao) || empty($carga_horaria)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    // Atualiza os dados do curso no banco de dados
    $sql = "UPDATE cursos SET nome = ?, descricao = ?, carga_horaria = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nome, $descricao, $carga_horaria, $id);

    if ($stmt->execute()) {
        echo "Curso atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o curso: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
</head>
<body>
    <h1>Editar Curso</h1>
    <form action="atualizar_curso.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $curso['id']; ?>">
        
        <label for="nome">Nome do Curso:</label><br>
        <input type="text" name="nome" id="nome" value="<?php echo $curso['nome']; ?>"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" id="descricao" rows="4" cols="50"><?php echo $curso['descricao']; ?></textarea><br><br>

        <label for="carga_horaria">Carga Horária:</label><br>
        <input type="number" name="carga_horaria" id="carga_horaria" value="<?php echo $curso['carga_horaria']; ?>"><br><br>

        <input type="submit" value="Salvar">
    </form>
</body>
</html>
