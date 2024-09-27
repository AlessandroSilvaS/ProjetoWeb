<?php
include '../conexao.php';

// Obter o ID do curso da URL e validar
$id_curso = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id_curso) {
    echo "Curso não encontrado.";
    exit;
}

// Consultar o curso no banco de dados
$sql = "SELECT * FROM tb_curso WHERE id_curso = :id";
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            width: 100%;
            height: 100px;
            background-color: #275aff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        header h1 {
            color: #fff;
            font-size: 40px;
        }
        .curso-info {
            width: 900px;
            margin: 0 auto;
            margin-top: 100px;
            display: flex;
            gap: 20px;
        }
        .curso-info button {
            width: 100px;
            height: 50px;
            border-radius: 15px;
            border: none;
            background-color: #275aff;
            color: #fff;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .grid-header {
            font-weight: bold;
            background-color: #e0e0e0;
            padding: 10px;
            text-align: center;
        }
        .grid-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .grid-item:nth-child(3n) {
            border-right: 0;
        }
        .grid-item:last-child {
            border-bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Informações do Curso</h1>
    </header>
    <h1 style="text-align: center; margin-top: 40px;"><?php echo htmlspecialchars($curso['curso_nome']); ?></h1>
    <div class="curso-info">
        <div class="grid-container">
            <div class="grid-header">Curso</div>
            <div class="grid-header">Descrição</div>
            <div class="grid-header">Carga Horária</div>

            <div class="grid-item"><?php echo htmlspecialchars($curso['curso_nome']); ?></div>
            <div class="grid-item"><?php echo htmlspecialchars($curso['curso_descricao']); ?></div>
            <div class="grid-item"><?php echo htmlspecialchars($curso['curso_duracao']); ?></div>
            <button id="edit" onclick="toEdit()">EDITAR</button>
        </div>
    </div>
    <script>
        function toEdit() {
            const idCurso = <?php echo $id_curso; ?>; // Obtém o ID do curso corretamente
            window.location.href = "edit.php?id=" + idCurso;
        }
    </script>
</body>
</html>
