<?php
session_start();
$login = $_SESSION["loginG"];
if($login == null){
  header("Location: login.php");
}?>
<!DOCTYPE html>
<html>

<head>
  <title>LampClinic</title>
  <link rel="stylesheet" type="text/css" href="css/landingPage.css">
  <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
</head>

<body class="body-parte2">
  <header>
    <div class="logo">
      <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
    </div>
    <!--  <div class="profile">
      <div class="profile-picture">
        <img src="img/profile.jpg" alt="Profile Picture">
      </div>
      <div class="profile-name">Teste</div>
    </div> -->
  </header>
    <main>
    <div class="card">
      <img src="img/paciente-icon.png">
      <div class="card__content">
        <a href="calendario.php">
        <p class="card__title">Calendario</p>
        
      </div>
      </a>
    </div>
    <div class="card">
      <img src="img/agenda-icon.png">
      <div class="card__content">
         <a href="agenda.html">
        <p class="card__title">Agenda</p>
        
      </div>
      </a>
    </div>
    <div class="card">
      <img src="img/cliente.png">
      <div class="card__content">
         <a href="clientes.php">
        <p class="card__title">Clientes</p>
        
      </div>
      </a>
    </div>
    <div class="card">
      <img src="img/usuario.png">
      <div class="card__content">
         <a href="usuarios.php">
        <p class="card__title">Usuarios</p>
        
      </div>
      </a>
    </div>
    <div class="card">
      <img src="img/usuario.png">
      <div class="card__content">
         <a href="itens.php">
        <p class="card__title">Itens</p>
        
      </div>
      </a>
    </div>

  </main>
</body>

</html>
