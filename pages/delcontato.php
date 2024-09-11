<?php
include('../conexao.php');


if(isset($_POST['idDel'])){

    $id = $_POST['idDel'];

try {
    $result = $conn->prepare($select);
    $result->bindValue(':id_aluno', $id, PDO::PARAM_INT);
    $result->execute();
    
            // Agora, delete o registro do banco de dados
            $delete = "DELETE FROM tb_aluno WHERE id_aluno=:id_aluno";
            try {
                $result = $conn->prepare($delete);
                $result->bindValue(':id_aluno', $id, PDO::PARAM_INT);
                $result->execute();

                $contar = $result->rowCount();
                if ($contar > 0) {
                    header("Location: ../classroom.php");
                } else {
                    header("Location: ../classroom.php");
                }

            } catch (PDOException $e) {
                echo "<strong>ERRO DE DELETE: </strong>" . $e->getMessage();
            }
        }catch (PDOException $e) {
        echo "<strong>ERRO DE SELECT: </strong>" . $e->getMessage();
    }
}
?>