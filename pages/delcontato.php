<?php
include_once "../conexao.php";

// Verificar se o parâmetro idDel foi passado na URL
if (isset($_GET['idDel'])) {
    $id_aluno = $_GET['idDel'];

    // SQL para deletar o aluno
    $delete = "DELETE FROM tb_aluno WHERE id_aluno = :id_aluno";

    try {
        $result = $conn->prepare($delete);
        $result->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $result->execute();

        // Redirecionar para a página de gerenciamento de perfis após exclusão
        header("Location: gerenciamentoPerfis.php");
    } catch (PDOException $e) {
        echo "Erro ao deletar: " . $e->getMessage();
    }
} else {
    echo "ID do aluno não fornecido.";
}
?>
