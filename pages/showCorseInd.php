<?php
include '../conexao.php';

// Obter o ID do curso da URL
$id_curso = $_GET['id'];

// Consultar o curso no banco de dados
$sql = "SELECT * FROM tb_curso WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id_curso);
$stmt->execute();

// Obter as informações do curso
$curso = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se o curso existe
if (!$curso) {
    echo "Curso não encontrado.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Curso</title>
    <link rel="stylesheet" href="../css/curso.css"/>
</head>
<body>
    <header>
        <h1>Informações do Curso</h1>
    </header>
    <div class="curso-info">
        <h2><?php echo $curso['curso_nome']; ?></h2>
        <p><strong>Descrição:</strong> <?php echo $curso['curso_descricao']; ?></p>
        <p><strong>Carga Horária:</strong> <?php echo $curso['curso_carga_horaria']; ?> horas</p>
        <p><strong>Duração:</strong> <?php echo $curso['curso_duracao']; ?> meses</p>
        <p><strong>Preço:</strong> R$ <?php echo $curso['curso_preco']; ?></p>
    </div>
</body>
</html>