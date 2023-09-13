<?php

class conexaosql {
  private $conn;
  

  public function __construct() {
      $servername = "db4free.net";
      $username = "userpit";
      $password = "senhapit";
      $database = "pitclinica";
      $this->conn = new mysqli($servername, $username, $password, $database);
  }

  public function fazendologin($login_verifica, $senha_verifica) {
      $sql = "SELECT senha FROM usuario WHERE login='" . $login_verifica . "'";
      $result = mysqli_query($this->conn, $sql);

      if (!$result) {
          mysqli_close($this->conn);
          return 11;
      } else {
          $row = $result->fetch_array(MYSQLI_ASSOC);

          if ($row != null) {
              $senhavalida = $row["senha"];
              if ($senha_verifica == $senhavalida) {
                  mysqli_close($this->conn);
                  return 10;
              } else {
                  mysqli_close($this->conn);
                  return 12;
              }
          }
          mysqli_close($this->conn);
      }
  }


  public function PegarPermissoes($login_verifica){
    $sql = "SELECT permissoes FROM usuario WHERE login='" . $login_verifica . "'";
    $result = mysqli_query($this->conn, $sql);
    
    if (!$result) {
      mysqli_close($this->conn);
      return 11;}
    else{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['permissoes'];}

  }

  // Cadastros
  public function cadastrarUsuario($nome, $login, $senha, $EditarUsuario, $EditarFichas){
    $sql ="Select login from usuario where login='" . $login . "'";
    $result = mysqli_query($this->conn, $sql);

    
    if (!$result) { die("Query Failed."); }
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($row == null)
    {
      
      if($EditarUsuario == "S" && $EditarFichas == "S"){
        $permissoes = 3;
      }
      else if($EditarUsuario == "S"){
        $permissoes = 1;
      }
      else if($EditarFichas == "S"){
        $permissoes = 2;
      }
      else{
        $permissoes = 0;
      }
    
      $sqlenvia = "insert into usuario(nome, login, senha, Tipo_idTipo, permissoes) values('" . $nome . "','". $login . "','" . $senha ."',1," . $permissoes . ")";
      if (mysqli_query($this->conn, $sqlenvia)) {
        return 1;
    } else {
        return 2;
    }

    mysqli_close($this->conn);
    }
    else{
      return 3;
    }
    
  }
  public function cadastrarClientes($nome, $cpf, $date, $sexo){
    

    $sql = "Select cpf from cliente where cpf='" . $cpf . "'";
    $result = mysqli_query($this->conn, $sql);

    if (!$result) { die("Query Failed."); }
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($row == null)
    {
      
      if($sexo == 0){
        $sexoEnvia = 'M';
      }
      else if($sexo == 1){
        $sexoEnvia = 'F';
      }
      else{
        $sexoEnvia = 'O';
      }
      $dataFormatada = date('Y-m-d', strtotime($date));
    
      $sqlenvia = "insert into cliente(nome, cpf, dataNascimento, sexo) values('" . $nome . "','". $cpf . "','" . $dataFormatada . "','" . $sexoEnvia . "')";
      if (mysqli_query($this->conn, $sqlenvia)) {
        return "<script>alert('Dados inseridos com sucesso!'); </script>";
    } else {
        return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
    }

    mysqli_close($this->conn);
    }
    else{
      return "<script>alert('CPF já existente!'); </script>";
    }
    
   }
  


  public function imprimirClientes($id){
    $sql = "SELECT nome, dataNascimento, cpf  FROM cliente WHERE id='" . $id . "'";
    $result = mysqli_query($this->conn, $sql);
  
    if (!$result) {
      die("Query Failed.");
    } else {
      $row = $result->fetch_array(MYSQLI_ASSOC);
  
      if ($row != null) {
        $nome = $row["nome"];
        $data = $row["dataNascimento"];
        $cpf = $row["cpf"];
        $parte1 = "<div class='patient-info-container'>
        <h2>Informações do Paciente</h2>
        <div class='patient-profile'>
          <div class='profile-picture2'>
            <img src='img/lampada.jpg' alt='Profile Picture'>
          </div>
          <div class='profile-details'>
            <h3 name=teste" . $id . ">" . $nome . "</h3>
            <p>". $data . "</p>
            <p>" . $cpf . "</p>
          </div>
        </div>";
        $teste = $_POST["teste" . $id];
        $parte2 = 
        "<div class='procedure-record'>
          <h4>Registro de Procedimento:</h4>
          <p>xxxxxx</p>
        </div>
        <div class='procedure-record'>
        <h4>Adicionar Anotações:" . $teste . "</h4>
        <textarea rows='4' cols='50'></textarea>
        <button type='button'>Salvar Anotações</button>
      </div>
      </div>";
      return $parte1 . $parte2;
      }
      
    }
    mysqli_close($this->conn);
  }
 

  }
