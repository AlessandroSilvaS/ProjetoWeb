<?php
include_once "../conexao.php";

if (isset($_POST['idDel'])) {
    $id_aluno = $_POST['idDel'];

   
    $select = "SELECT foto_aluno FROM tb_aluno WHERE id_aluno = :id_aluno";
    try {
        $result = $conn->prepare($select);
        $result->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
        $result->execute();
        $aluno = $result->fetch(PDO::FETCH_OBJ);

        if ($aluno) {
            $foto_aluno = $aluno->foto_aluno;

            
            if ($foto_aluno !== 'user.jpeg' && !empty($foto_aluno) && file_exists('../images/' . $foto_aluno)) {
              
                unlink('../images/' . $foto_aluno);
            }

           
            $delete = "DELETE FROM tb_aluno WHERE id_aluno = :id_aluno";
            $result = $conn->prepare($delete);
            $result->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $result->execute();

           
            header("Location: classroom.php");
            exit(); 
        } else {
            echo "Aluno não encontrado.";
        }
    } catch (PDOException $e) {
        echo "Erro ao deletar: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "ID do aluno não fornecido.";
}
?>
