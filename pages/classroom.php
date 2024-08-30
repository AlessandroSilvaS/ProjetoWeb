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
      <button class="navbar-btn">Botão</button>
      <div class="navbar-logo">Logo</div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content">
      <!-- Seção de Gerenciamento de Perfis -->
      <section class="profile-management">
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
              <td><a href="#">Editar</a></td>
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
              <td><a href="#">Editar</a></td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
          </tbody>
        </table>
      </section>
    </main>
  </body>
</html>