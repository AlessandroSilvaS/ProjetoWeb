<?php
// include '../conexao.php';
// // Processar o envio do formulário
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id = $_POST['id'];

//     // Validação simples
//     if (empty($id) || !is_numeric($id)) {
//         echo "ID inválido.";
//     } else {
//         try {
//             // Remover o curso do banco de dados
//             $sql = "DELETE FROM tb_curso WHERE id = :id";
//             $stmt = $conn->prepare($sql);
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();

//             if ($stmt->rowCount() > 0) {
//                 echo "Curso removido com sucesso!";
//             } else {
//                 echo "Nenhum curso encontrado com esse ID.";
//             }
//         } catch (PDOException $e) {
//             echo "Erro ao remover curso: " . $e->getMessage();
//         }
//     }
// }

// // Consultar todos os cursos para exibir no formulário
// $sql = "SELECT id, nome FROM tb_curso";
// $stmt = $conn->query($sql);
// $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <label for="id">Selecione o Curso para Remover:</label>
            <select id="id" name="id" required>
                <option value="">-- Selecione um Curso --</option>
                <?php foreach ($cursos as $curso): ?>
                    <!-- <option value="<?php echo htmlspecialchars($curso['id']); ?>">
                        <?php echo htmlspecialchars($curso['nome']); ?>
                    </option> -->
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Remover Curso">
        </div>
    </form>
</body>
</html>
