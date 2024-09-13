<?php
include_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de Perfis</title>
    <link rel="icon" href="../images/icon.webp">
    <link rel="stylesheet" href="../css/classroom.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar">
            <a href="../index.php">Home</a>
                <a href="registration.php">Cadastrar Alunos</a>
        </div>
        <div class="navbar-logo">
            <img src="../images/user.jpeg" alt="logo" width="50px" style="border-radius:50px; margin-right:20px; margin-top: 5px;">
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <!-- Seção de Gerenciamento de Perfis -->
        <section>
            <div class="profile-management">
                <h1>Gerenciamento de Perfis</h1>
                <table class="profile-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status do Curso</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $select = "SELECT * FROM tb_aluno ORDER BY id_aluno DESC";
                    try {
                        $result = $conn->prepare($select);
                        $result->execute();

                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                    ?>
                        <tr>
                        <td><?php echo $contar++;?></td>
                            <td><img src="https://via.placeholder.com/50" alt="Foto do Usuário" /></td>
                            <td><?php echo htmlspecialchars($show->aluno_nome); ?></td>
                            <td><?php echo htmlspecialchars($show->aluno_email); ?></td>
                            <td><?php echo htmlspecialchars($show->curso_status); ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="editar.php?id=<?php echo htmlspecialchars($show->id_aluno); ?>" class="a1">Editar</a>
                                    <form action="delcontato.php" method="POST" style="display:inline;">
                                             <input type="hidden" name="idDel" value="<?php echo htmlspecialchars($show->id_aluno); ?>">
                                             <button type="submit" class="a2" onclick="return confirm('Tem certeza que deseja remover o contato?');">Excluir</button>
                                    </form>                                
                        </div>

                            </td>
                        </tr>
                    <?php
                            }
                        } else {
                            echo '<tr><td colspan="5">Nenhum aluno encontrado.</td></tr>';
                        }
                    } catch (PDOException $e) {
                        echo '<tr><td colspan="5"><strong>ERRO DE PDO: </strong>' . htmlspecialchars($e->getMessage()) . '</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="animated">
            <img src="../gif/classroom.svg" alt="">
        </div>
    </main>
</body>
</html>
