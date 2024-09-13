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
  <div class="dropdown">
    <button class="dropbtn">Cadastro de alunos
    </button>
  </div>
</div>
      <div class="navbar-logo"><img src="../assets/logo.png" alt="logo" width="50px" style="border-radius:50px; margin-right:20px; margin-top: 5px;"></div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content">
      <!-- Seção de Gerenciamento de Perfis -->
      <section>


        
      <div class="profile-management">
        <h1>Gerenciamento de Perfis</h1>
        <table class="profile-table">

        <?php
        $select = "SELECT * FROM tb_aluno ORDER BY id_aluno DESC";
            try {
                $result = $conn->prepare($select);
                $cont = 1;
                $result->execute();

                $contar = $result->rowCount();
                if ($contar > 0) {
                    while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
            ?>
        <thead>
            <tr>
              <th>Foto</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Cursos status</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img
                  src="https://via.placeholder.com/50"
                  alt="Foto do Usuário"
                />
              </td>
              <td><?php echo $show-> aluno_nome;?></td>
              <td><?php echo $show-> aluno_email;?></td>
              <td><?php echo $show -> curso_status;?></td>
              <td><a  class="a1" href="#">Editar</a> <a class="a2" href="delcontato.php?idDel=<?php echo $show->id_aluno;?>"  onclick="return confirm('Deseja remover o contato :(')"title="Remover Contato" >Excluir </a> </td>
            <!-- Adicione mais linhas conforme necessário -->
          </tbody>
          <?php
                  }
              }
          } catch (PDOException $e) {
              echo '<strong>ERRO DE PDO= </strong>' . $e->getMessage();
          }
          ?>
       </table>
        </div>

        

      </section>
      <div class="animated">
          <img src="../gif/classroom.svg" alt="">
        </div>
    </main>
  </body>
</html>