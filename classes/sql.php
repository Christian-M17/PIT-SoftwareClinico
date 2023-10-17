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
public function recuperarSenha($login, $nome){
  $sql = "Select nome, senha from usuario where login='" . $login . "'";
  $result = mysqli_query($this->conn, $sql);

  
  if (!$result) { die("Query Failed."); }
  $row = $result->fetch_array(MYSQLI_ASSOC);

  if ($row != null){
    $nomevalida = $row["nome"];
     if($nome == $nomevalida){
     $senha = $row["senha"];
    $sqlenvia = "insert into alerta(nome, senha) values ('" . $login . "', '" . $senha . "')";
    if (mysqli_query($this->conn, $sqlenvia)) {
      return "<script>alert('Pedido realizado com sucesso!'); </script>";
  } else {
      return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
  }

      
      exit();}
      else{"<script>alert('Nome invalido!'); </script>";}
  }
  mysqli_close($this->conn);}




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


   public function cadastrarItens($nome, $quantidade, $valor){
    

    $sql = "Select nome from Itens where nome='" . $nome . "'";
    $result = mysqli_query($this->conn, $sql);

    if (!$result) { die("Query Failed."); }
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($row == null)
    {
      
      
    
      $sqlenvia = "insert into Itens(nome, qntd, valor) values('" . $nome . "','". $quantidade . "','" . $valor . "')";
      if (mysqli_query($this->conn, $sqlenvia)) {
        return "<script>alert('Dados inseridos com sucesso!'); </script>";
    } else {
        return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
    }

    mysqli_close($this->conn);
    }
    else{
      return "<script>alert('Item já existente!'); </script>";
    }
    
   }

   public function cadastrarProcedimento($nome, $tipo, $duracao){
    

    $sql = "Select nome from procedimentos where nome='" . $nome . "'";
    $result = mysqli_query($this->conn, $sql);

    if (!$result) { die("Query Failed."); }
    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($row == null)
    {
      
      
    
      $sqlenvia = "insert into procedimentos(nome, tipo, duracao) values('" . $nome . "','". $tipo . "','" . $duracao . "')";
      if (mysqli_query($this->conn, $sqlenvia)) {
        return "<script>alert('Dados inseridos com sucesso!'); </script>";
    } else {
        return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
    }

    mysqli_close($this->conn);
    }
    else{
      return "<script>alert('Item já existente!'); </script>";
    }
    
   }


  
  

public function imprimirClientes($id){

    $sql = "SELECT nome, dataNascimento, cpf, anotacao  FROM cliente WHERE id='" . $id . "'";
    $result = mysqli_query($this->conn, $sql);
  
    if (!$result) {
      die("Query Failed.");
    } else {
      $row = $result->fetch_array(MYSQLI_ASSOC);
  
      
      if ($row != null) {
        $nome = $row["nome"];
        $data = $row["dataNascimento"];
        $cpf = $row["cpf"];
        $anotacao = $row["anotacao"];
        $resultado = "
        <form method='POST' action=''>
        <div class='patient-info-container'>
        <h2>Informações do Paciente</h2>
        <div class='patient-profile'>
          <div class='profile-picture2'>
            <img src='img/lampada.jpg' alt='Profile Picture'>
          </div>
          <div class='profile-details'>
            <h3>" . $nome . "</h3>
            <p>". $data . "</p>
            <p>" . $cpf . "</p>
          </div>
        </div>
        <div class='procedure-record'>
          <h4>Registro de Procedimento:</h4>
          <p>xxxxxx</p>
        </div>
        <div class='procedure-record'>
        <h4>Adicionar Anotações:</h4>
        <textarea name='texto" . $id . "' rows='4' cols='50'>" . $anotacao . "</textarea>
        <button class='input' name='editar' type='submit' value=" . $id . ">Salvar Anotações</button>
      </div>
      </div>
      </form>
      ";
      return $resultado;
      }
      
    }
  }

public function anotar($id, $anotar){

        {
          $sql = "UPDATE cliente SET anotacao='" . $anotar . "' WHERE id=" . $id;

          
        
          if (mysqli_query($this->conn, $sql)) {
            return "<script>alert('Dados inseridos com sucesso!'); </script>";
        } else {
            return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
        }
    
        mysqli_close($this->conn);
        }
            }
public function imprimirUsuarios($id){

              $sql = "SELECT nome, Login, Tipo_idTipo, permissoes  FROM usuario WHERE idUsuario='" . $id . "'";
              $result = mysqli_query($this->conn, $sql);
            
              if (!$result) {
                die("Query Failed.");
              } else {
                $row = $result->fetch_array(MYSQLI_ASSOC);
            
                
                if ($row != null) {
                  $nome = $row["nome"];
                  $login = $row["Login"];
                  $tipo = $row["Tipo_idTipo"];
                  $permissoes = $row["permissoes"];
                  $resultado = "
                  <form method='POST' action=''>
                  <div class='patient-info-container'>
                <h2>Informações do Usuario</h2>
                <div class='patient-profile'>
                  <div class='profile-picture2'>
                    <img src='img/lampada.jpg' alt='Profile Picture'>
                  </div>
                  <div class='profile-details'>
                    <h3>" . $nome . "</h3>
                    <p>Login: ". $login . "</p>
                    <p>Tipo: ". $tipo . "</p>
                    <p> Permissoes: ". $permissoes . "</p>
                  </div>
                </div>
                <div class='procedure-record'>
                  <button class='input' name='bloquear' type='submit' value=" . $id . " >Bloquear</button>
                  <button class='input' name='editar' type='submit' value=" . $id . " >Editar</button>
                </div>
                
              </div>
              </form>
                ";
                return $resultado;
                }
                
              }
            }
public function bloquear($id){

        {
          $sql = "UPDATE usuario SET permissoes='0' WHERE idUsuario=" . $id;

          
        
          if (mysqli_query($this->conn, $sql)) {
            return "<script>alert('Dados inseridos com sucesso!'); </script>";
        } else {
            return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
        }
    
        mysqli_close($this->conn);
        }
            }
public function imprimirItens($id){

              $sql = "SELECT nome, qntd, valor FROM Itens WHERE id='" . $id . "'";
              $result = mysqli_query($this->conn, $sql);
            
              if (!$result) {
                die("Query Failed.");
              } else {
                $row = $result->fetch_array(MYSQLI_ASSOC);
            
                
                if ($row != null) {
                  $nome = $row["nome"];
                  $quantidade = $row["qntd"];
                  $valor = $row["valor"];
                  
                  $resultado = "
                  <form method='POST' action=''>
                  <div class='patient-info-container'>
                <h2>Informações do Item</h2>
                <div class='patient-profile'>
                  <div class='profile-picture2'>
                    <img src='img/lampada.jpg' alt='Profile Picture'>
                  </div>
                  <div class='profile-details'>
                    <h3>" . $nome . "</h3>
                    <p>Quantidade : ". $quantidade . "</p>
                    <p>Valor: ". $valor . "</p>
                    
                  </div>
                </div>
                
                
              </div>
              </form>
                ";
                return $resultado;
                }
                
              }
            
  }
  public function getUsuario($id, $categoria){
    $sql = "SELECT nome, Login, Tipo_idTipo, senha, permissoes  FROM usuario WHERE idUsuario='" . $id . "'";
    $result = mysqli_query($this->conn, $sql);
    if($categoria == "nome"){
      $retorno = $row["nome"];
      return $retorno;

    }
    if($categoria == "Login"){
      $retorno = $row["Login"];
      return $retorno;

    }
    if($categoria == "permissoes"){
      $retorno = $row["permissoes"];
      return $retorno;

    }
    if($categoria == "senha"){
      $retorno = $row["senha"];
      return $retorno;

    }
  }
  
  
  
    
  
