<!DOCTYPE html>
<html>

<head>
  <title>LampClinic</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
</head>

<body class="body-parte2">
  <header>
    <div class="logo">
      <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
    </div>
    <div class="profile">
      <div class="profile-picture">
        <a href="Selecione.html">
          <img src="img/profile.jpg" alt="Profile Picture">
      </div>
      <div class="profile-name">Rei do sxo123</div>
      </a>
    </div>
  </header>
  <main>
    <div class="agenda">
      <h1>Criação de Agenda</h1>
      <form method="post">
        <label for="data">Digite a data:</label>
        <input type="date" name="data" id="data">
        <button type="submit">Enviar</button>
      </form>
      <div class="data-display">
        <!-- Exibir a data aqui -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $data = $_POST['data'];
          echo "<p>A data selecionada é: $data</p>";
        }
        ?>
      </div>
    </div>
    </div>
  </main>
</body>

</html>