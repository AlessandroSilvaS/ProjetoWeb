<?php
include '../conexao.php'; 

// Verifica se o ID do curso foi passado na URL
if (isset($_GET['id'])) {
    $curso_id = intval($_GET['id']); // Converte o ID para um inteiro

    // Busca o curso no banco de dados
    $sql = "SELECT * FROM tb_curso WHERE id_curso = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $curso_id, PDO::PARAM_INT);
    $stmt->execute();

    // Verifica se o curso existe
    if ($stmt->rowCount() > 0) { // Corrigido para rowCount()
        $curso = $stmt->fetch(PDO::FETCH_ASSOC);
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
    $sql = "UPDATE tb_curso SET curso_nome = ?, curso_descricao = ?, curso_duracao = ? WHERE id_curso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $descricao);
    $stmt->bindParam(3, $carga_horaria);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ./showCorseInd.php?id=".$id);
        exit;
    } else {
        echo "Erro ao atualizar o curso: " . $conn->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
    <link rel="stylesheet" href="../css/edit.css"/>
</head>
<body>
    <div class="cabecalho">
        <h1>Editar Curso</h1>
    </div>
    <form action="" method="POST"> <!-- Corrigido para enviar para a mesma página -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($curso['id_curso']); ?>">
        <br>
        <label for="nome">Nome do Curso:</label><br>
        <br>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($curso['curso_nome']); ?>"><br><br>
        <br>
        
        <label for="descricao">Descrição:</label><br>
        <br>
        <textarea name="descricao" id="descricao" rows="4" cols="50"><?php echo htmlspecialchars($curso['curso_descricao']); ?></textarea><br><br>
        <br>

        <label for="carga_horaria">Carga Horária:</label><br>
        <br>
        <input type="number" name="carga_horaria" id="carga_horaria" value="<?php echo htmlspecialchars($curso['curso_duracao']); ?>"><br><br>
        <br>

        <input type="submit" id="salvar" value="Salvar">
    </form>
</body>
</html>
