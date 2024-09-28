<?php
session_start();
require ('../conexao.php');
include_once "../includes/bootstrap.php";


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'tb_caduser') {
    header('Location: login.php'); 
    exit();
}

$professor_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de Alunos</title>
    <link rel="icon" href="../images/icon.webp">
    <link rel="stylesheet" href="../css/classroom.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar">
            <a href="../index.php" class="home">Home</a>
            <a href="registration.php">Cadastrar Alunos</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="navbar-logo">
            <img src="../assets/logo.png" alt="logo" width="50px" style="border-radius:50px; margin-right:20px; margin-top: 5px;">

        </div>
    </nav>
<?php

$sel = "SELECT * FROM tb_caduser WHERE id_caduser = $professor_id";

$resultado = $conn->prepare($sel);
$resultado->execute();
$contador = $resultado->rowCount();

if ($contador > 0) {
    while ($show = $resultado->fetch(PDO::FETCH_OBJ)) {?>
    <!-- Conteúdo Principal -->
    <main class="main-content">
        <section>
            <div class="user">
                
            <?php if (!empty($show->foto_caduser) && file_exists('../user/' . $show->foto_caduser)): ?>
                <img src="../user/<?php echo $show->foto_caduser; ?>" alt="Foto do Aluno">
                <?php else: ?>
                <img src="../images/user.jpeg" alt="Foto Professor" >
                <?php endif; ?>
                <h1><?php echo htmlspecialchars($show->caduser_name)?></h1>
                <p><?php echo htmlspecialchars($show->caduser_email)?><br><?php echo htmlspecialchars($show->caduser_telefone)?></p>
                
                <a href="perfil.php?id=<?php echo htmlspecialchars($show->id_caduser); ?>" class="editar">Editar</a>
                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>Nenhum Usuário encontrado.</td></tr>";
                        }
                        ?>
            </div>
            <div class="profile-management">
                <h1>Gerenciamento de Alunos</h1>

                <!-- Pesquisa de Alunos -->
                <form method="GET" action="">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome ou email" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    </div>
                    <button type="submit" class="pesquisas_btn">Pesquisar</button>
                </form>

                <!-- Tabela de Alunos -->
                <table class="profile-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $limit = 4; 
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $page = max($page, 1);
                        $offset = ($page - 1) * $limit;
                        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
                        $searchTerm = htmlspecialchars($searchTerm);

                        // Contagem total de registros para paginação (apenas alunos do professor)
                        $totalQuery = "SELECT COUNT(*) FROM tb_aluno WHERE (aluno_nome LIKE :searchTerm OR aluno_email LIKE :searchTerm) AND id_professor = :professor_id";
                        $totalResult = $conn->prepare($totalQuery);
                        $totalResult->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
                        $totalResult->bindValue(':professor_id', $professor_id, PDO::PARAM_INT);
                        $totalResult->execute();
                        $totalRows = $totalResult->fetchColumn();
                        $totalPages = ceil($totalRows / $limit);

                        // Seleciona alunos do professor com a opção de pesquisa
                        $select = "SELECT * FROM tb_aluno WHERE (aluno_nome LIKE :searchTerm OR aluno_email LIKE :searchTerm) AND id_professor = :professor_id ORDER BY id_aluno DESC LIMIT :limit OFFSET :offset";
                        $result = $conn->prepare($select);
                        $result->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
                        $result->bindValue(':professor_id', $professor_id, PDO::PARAM_INT);
                        $result->bindValue(':limit', $limit, PDO::PARAM_INT);
                        $result->bindValue(':offset', $offset, PDO::PARAM_INT);
                        $result->execute();

                        $contar = $result->rowCount();
                        if ($contar > 0) {
                            $rowNumber = $offset + 1;
                            while ($show = $result->fetch(PDO::FETCH_OBJ)) {
                        ?>
                                <tr>
                                    <td><?php echo $rowNumber++; ?></td>
                                    <td>
                                        <?php if (!empty($show->foto_aluno) && file_exists('../user/' . $show->foto_aluno)): ?>
                                            <img src="../user/<?php echo $show->foto_aluno; ?>" alt="Foto do Aluno" style="width: 50px; height: auto;">
                                        <?php else: ?>
                                            <img src="../images/user.jpeg" alt="Foto do Aluno" style="width: 50px; height: auto;">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($show->aluno_nome); ?></td>
                                    <td><?php echo htmlspecialchars($show->aluno_email); ?></td>
                                    <td><?php echo htmlspecialchars($show->curso_status); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="updatecontato.php?id=<?php echo htmlspecialchars($show->id_aluno); ?>" class="a1">Editar</a>
                                            <form action="delcontato.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="idDel" value="<?php echo htmlspecialchars($show->id_aluno); ?>">
                                                <button type="submit" class="a2" onclick="return confirm('Tem certeza que deseja remover o aluno?');">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>Nenhum aluno encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Paginação -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Anterior">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Próximo">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; <?php echo date('Y'); ?> Todos os direitos reservados.</p>
        <p><strong>Git Hub </strong><a href="https://github.com/AlessandroSilvaS/ProjetoWeb" class="text-white"><i class="bi bi-github"></i></a></p>
    </footer>
</body>
</html>
