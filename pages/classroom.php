<?php
    include_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerenciamento de Perfis</title>
    <link rel="stylesheet" href="../css/classroom.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
    <div class="navbar">
  <a href="../index.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div>
</div>
      <div class="navbar-logo"><img src="../images/user.jpeg" alt="logo" width="40px" style="border-radius:50px; margin-right:20px; margin-top: 5px;"></div>
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
              <th>Foto</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Data de Vencimento</th>
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
              <td>João Silva</td>
              <td>joao.silva@example.com</td>
              <td>31/12/2024</td>
              <td><a  class="a1" href="#">Editar</a> <a class="a2" href="#">Excluir </a> </td>
            </tr>
            <tr>
              <td>
                <img
                  src="https://via.placeholder.com/50"
                  alt="Foto do Usuário"
                />
              </td>
              <td>Maria Oliveira</td>
              <td>maria.oliveira@example.com</td>
              <td>15/11/2024</td>
              <td><a class="a1 "href="#">Editar</a> <a class="a2" href="#">Excluir</td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
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