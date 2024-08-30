<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulário de Matrícula</title>
    <link rel="stylesheet" href="../css/registration.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <button class="navbar-btn">Botão</button>
      <div class="navbar-logo">Logo</div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="main-content">
      <section class="registration-box">
        <h1>Formulário de Matrícula</h1>
        <form action="#" method="post">
          <label for="name">Nome:</label>
          <input type="text" id="name" name="name" required />

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required />

          <label for="age">Idade:</label>
          <input type="number" id="age" name="age" required />

          <label for="gender">Gênero:</label>
          <select id="gender" name="gender" required>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
            <option value="outro">Outro</option>
          </select>

          <label for="class">Turma:</label>
          <input type="text" id="class" name="class" required />

          <label for="course">Curso:</label>
          <input type="text" id="course" name="course" required />

          <button type="submit">Matricular</button>
        </form>
      </section>
    </main>
  </body>
</html>