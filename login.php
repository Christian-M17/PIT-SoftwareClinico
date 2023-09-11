<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/login.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
  <title>PIT</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
  <div class="tela">
    <div class="half-blue">
      <!-- Conteúdo da metade azul -->
      <div class="content">
        <label class="text1">LampClinic</label>
        <label class="text2">mais rápido Interface de fácil uso e eficiente.</label>
        <button class="button"><a class="a" href="index.html">Ver Mais</a></button>
      </div>

    </div>
    <div class="half-white">
      <!-- Conteúdo da metade branca -->
      <form class="right-content" action="validasenha.php" method="POST">
        <label class="text1">OLá</label>
        <label class="text2">Digite seu login</label>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="login" placeholder="Login">
            <img class="codicon-input" src="img/Vector.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <input class="text-wrapper" type="text" name="senha" placeholder="Login">
            <img class="codicon-input" src="img/Vector-2.png" />
          </div>
        </div>
        <div class="input">
          <div class="placeholder">
          <select class="text-wrapper" name="clinica">
            <option value="0">Clinica Lampada</option>
          </select>
            <img class="codicon-input" src="img/Vector-1.png" />
          </div>
        </div>
        
        <button name="enviar" type="submit" class="button2">LOGIN</button>
        <label class="text3" href="indexsenha.php"><a class="a2" href="indexsenha.php">Esqueceu a senha?</a></label>
        <a href="index.html" class="text3"><label>Voltar ></label></a>
</form>
     
    </div>


  </div>
  </div>
  </div>
</body>

</html>