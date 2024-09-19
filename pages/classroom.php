<?php
include_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de Perfis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../images/icon.webp">
    <link rel="stylesheet" href="../css/classroom.css" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar">
            <a href="../index.php"  class="home">Home</a>
            <a href="registration.php">Cadastrar Alunos</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="navbar-logo">
            <img src="../assets/logo.png" alt="logo" width="50px" style="border-radius:50px; margin-right:20px; margin-top: 5px;">
        </div>
    </nav>


    <!-- Conteúdo Principal -->
    <main class="main-content">
        <!-- Seção de Gerenciamento de Perfis -->
        <section>
            <div class="profile-management">
                <h1>Gerenciamento de Perfis</h1>
           
                <form method="GET" action="">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome ou email" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    </div>
                    <button type="submit" class="pesquisas_btn">Pesquisar</button>
                </form>
               
               
                <table class="profile-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Ação</th>
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


                        $totalQuery = "SELECT COUNT(*) FROM tb_aluno WHERE aluno_nome LIKE :searchTerm OR aluno_email LIKE :searchTerm";
                        $totalResult = $conn->prepare($totalQuery);
                        $totalResult->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
                        $totalResult->execute();
                        $totalRows = $totalResult->fetchColumn();


                        $totalPages = ceil($totalRows / $limit);

                        $select = "SELECT * FROM tb_aluno WHERE aluno_nome LIKE :searchTerm OR aluno_email LIKE :searchTerm ORDER BY id_aluno DESC LIMIT :limit OFFSET :offset";
                        try {
                            $result = $conn->prepare($select);
                            $result->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
                            $result->bindValue(':limit', $limit, PDO::PARAM_INT);
                            $result->bindValue(':offset', $offset, PDO::PARAM_INT);
                            $result->execute();


                            $contar = $result->rowCount();
                            if ($contar > 0) {
                                $rowNumber = $offset + 1;
                                while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
                        ?>
                                    <tr>
                                        <td><?php echo $rowNumber++; ?></td>
                                        <td>
                                            <?php if (!empty($show->foto_aluno) && file_exists('../user/' . $show->foto_aluno)): ?>
                                                <img src="../user/<?php echo htmlspecialchars($show->foto_aluno); ?>" alt="Foto do Aluno" style="width: 50px; height: auto;">
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
                                                    <button type="submit" class="a2" onclick="return confirm('Tem certeza que deseja remover o contato?');">Excluir</button>
                                                </form>                                
                                            </div>
                                        </td>
                                    </tr>
                        <?php
                                }
                            } else {
                                echo "<tr><td colspan='4'>Nenhum aluno encontrado.</td></tr>";
                            }
                        } catch (PDOException $e) {
                            echo "Erro: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>


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