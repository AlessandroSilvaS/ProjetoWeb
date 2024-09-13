<?php
include_once "../conexao.php";

// Verificar se o parâmetro idDel foi passado no POST
if (isset($_POST['idDel'])) {
    $id_aluno = $_POST['idDel'];

    // SQL para deletar o aluno
    $delete = "DELETE FROM tb_aluno WHERE id_aluno = :id_aluno";

    try {
        $result = $conn->prepare($delete);
        $result->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $result->execute();

        // Redirecionar para a página de gerenciamento de perfis após exclusão
        header("Location: classroom.php");
        exit(); // Não se esqueça de chamar exit() após header()
    } catch (PDOException $e) {
        echo "Erro ao deletar: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "ID do aluno não fornecido.";
}
?>
