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

   public function cadastrarProcedimento($nome, $tipo, $duracao, $idItem, $qtdItem) {
    $sql = "SELECT nome FROM procedimentos WHERE nome='" . $nome . "'";
    $result = mysqli_query($this->conn, $sql);

    if (!$result) {
        die("Query Failed.");
    }

    $row = $result->fetch_array(MYSQLI_ASSOC);

    if ($row == null) {
        if ($idItem == 0 || $qtdItem == 0) {
            $sqlenvia = "INSERT INTO procedimentos (nome, tipo, duracao) VALUES ('$nome', '$tipo', '$duracao')";
        } else {
            $sqlenvia = "INSERT INTO procedimentos (nome, tipo, duracao, Item1, qtdItem1) VALUES ('$nome', '$tipo', '$duracao', '$idItem', '$qtdItem')";
        }

        if (mysqli_query($this->conn, $sqlenvia)) {
            return "<script>alert('Dados inseridos com sucesso!'); </script>";
        } else {
            return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
        }
    }
}


    public function cadastrarAgendamento($profissional, $Cliente, $Procedimento, $data){
    

      $sql = "Select * from procedimentos where nome='" . $Procedimento . "'";
      $result = mysqli_query($this->conn, $sql);
  
      if (!$result) { die("Query Failed."); }
      $row = $result->fetch_array(MYSQLI_ASSOC);
  
        
        $item = $row['item1'];
        $quantidade = $row['qtdItem1'];
      

        $dataFormatada = date('Y-m-d', strtotime($data));

        $sqlenvia = "insert into agendamento(profissional, cliente, procedimento, data ) values('" . $profissional . "','". $Cliente . "','" . $Procedimento . "','" . $dataFormatada . "')";
        if($item != null){
          $sqlupdate = "UPDATE Itens SET qntd = qntd - " . $quantidade . " WHERE id = '" . $item . "'";
          $updateResult = mysqli_query($this->conn, $sqlupdate);
        }
        if (mysqli_query($this->conn, $sqlenvia)) {
          return "<script>alert('Dados inseridos com sucesso!'); </script>";
      } else {
          return "<script>alert('Erro: " . mysqli_error($this->conn) . "');' </script>";
      }
       
      
  
      mysqli_close($this->conn);
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
        <button class='input' name='editarCliente' type='submit' value=" . $id . " >Editar</button>
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
            public function imprimirUsuarios($id) {
              $sql = "SELECT nome, Login, Tipo_idTipo, permissoes FROM usuario WHERE idUsuario='" . $id . "'";
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
                        <p>Login: " . $login . "</p>
                        <p>Tipo: " . $tipo . "</p>
                        <p> Permissoes: " . $permissoes . "</p>
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
                } else {
                  return "fim"; // Indicar o fim dos registros.
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
            public function imprimirAgendamento($id){

              $sql = "SELECT profissional, cliente, procedimento, data FROM agendamento WHERE id='" . $id . "'";
              $result = mysqli_query($this->conn, $sql);
            
              if (!$result) {
                die("Query Failed.");
              } else {
                $row = $result->fetch_array(MYSQLI_ASSOC);
            
                
                if ($row != null) {
                  $cliente = $row["cliente"];
                  $profissional = $row["profissional"];
                  $Procedimento = $row["procedimento"];
                  $date = $row["data"];
                  
                  $resultado = "
                  <form method='POST' action=''>
                  <div class='patient-info-container'>
                <h2>Informações do Item</h2>
                <div class='patient-profile'>
                  <div class='profile-picture2'>
                    <img src='img/lampada.jpg' alt='Profile Picture'>
                  </div>
                  <div class='profile-details'>
                    <h3>" . $Procedimento . "</h3>
                    <p>Profissional : ". $profissional . "</p>
                    <p>Cliente: ". $cliente . "</p>
                    <p>Data : ". $date . "</p>
                    
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
              if (!$result) {
                die("Query Failed.");
              } else {
                $row = $result->fetch_array(MYSQLI_ASSOC);
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
            }}
            public function getCliente($id, $categoria){
              $sql = "SELECT nome, dataNascimento, cpf, anotacao  FROM cliente WHERE id='" . $id . "'";
              $result = mysqli_query($this->conn, $sql);
              if (!$result) {
                die("Query Failed.");
              } else {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if($categoria == "nome"){
                  $retorno = $row["nome"];
                  return $retorno;}
                if($categoria == "data"){
                $retorno = $row["dataNascimento"];
                return $retorno;

              }
              if($categoria == "cpf"){
                $retorno = $row["cpf"];
                return $retorno;

              }
              if($categoria == "anotacao"){
                $retorno = $row["anotacao"];
                return $retorno;

              }
              

              }
            }
          
            public function editarUsuario($id, $nome, $login, $senha){
              $sql ="Select login from usuario where idUsuario='" . $id . "'";
              $result = mysqli_query($this->conn, $sql);
          
              
              if (!$result) { die("Query Failed."); }
              $row = $result->fetch_array(MYSQLI_ASSOC);
          
              if ($row == null)
              {
                
                return 2;
                }
              else{
                $sqlenvia = "update usuario set nome= '" . $nome . "', login =' ". $login . "', senha='" . $senha . "' where idUsuario= " . $id;
                if (mysqli_query($this->conn, $sqlenvia)) {
                  return 1;
              } else {
                  return 2;
              }
            }
              mysqli_close($this->conn);
              
            }
              
             
              public function editarClientes($id, $nome, $cpf, $date, $sexo){
    

                $sql = "Select cpf from cliente where cpf='" . $cpf . "'";
                $result = mysqli_query($this->conn, $sql);
            
                if (!$result) { die("Query Failed."); }
                $row = $result->fetch_array(MYSQLI_ASSOC);
            
                if ($row == null)
                { 
                
                  $sql = "Select cpf from cliente where cpf='" . $cpf . "'";
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
                
                  $sqlenvia = "update cliente set nome= '" . $nome . "', cpf= '". $cpf . "', dataNascimento= '" . $dataFormatada . "', sexo='" . $sexoEnvia . "' where id= '" . $id . "'";
                  if (mysqli_query($this->conn, $sqlenvia)) {
                    return "<script>alert('Dados inseridos com sucesso!'); </script>";
                }
              else{return "<script>alert('Erro!'); </script>";}
              }
            
                mysqli_close($this->conn);}
                
                public function nomeItem($id){

                  $sql = "SELECT nome FROM Itens WHERE id='" . $id . "'";
                  $result = mysqli_query($this->conn, $sql);
                
                  if (!$result) {
                    die("Query Failed.");
                  } else {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                
                    
                    if ($row != null) {
                      $nome = $row["nome"];
                      
                      $resultado = "
                      <option value='" . $id . "'> " . $nome . " </option>";
                    return $resultado;
                    }
                    
                  }
                }

                public function nomeCliente($id){

                  $sql = "SELECT nome FROM cliente WHERE id='" . $id . "'";
                  $result = mysqli_query($this->conn, $sql);
                
                  if (!$result) {
                    die("Query Failed.");
                  } else {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                
                    
                    if ($row != null) {
                      $nome = $row["nome"];
                      
                      $resultado = "
                      <option value='" . $nome . "'> " . $nome . " <!</option>
                    ";
                    return $resultado;
                    }
                    
                  }
                }
                public function nomeLogin($id){

                  $sql = "SELECT nome FROM usuario WHERE idUsuario='" . $id . "'";
                  $result = mysqli_query($this->conn, $sql);
                
                  if (!$result) {
                    die("Query Failed.");
                  } else {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                
                    
                    if ($row != null) {
                      $nome = $row["nome"];
                      
                      $resultado = "
                      <option value='" . $nome . "'> " . $nome . " <!</option>
                    ";
                    return $resultado;
                    }
                    
                  }
                }
                public function nomeProcedimento($id){

                  $sql = "SELECT nome FROM procedimentos WHERE idprocedimentos='" . $id . "'";
                  $result = mysqli_query($this->conn, $sql);
                
                  if (!$result) {
                    die("Query Failed.");
                  } else {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                
                    
                    if ($row != null) {
                      $nome = $row["nome"];
                      
                      $resultado = "
                      <option value='" . $nome . "'> " . $nome . " <!</option>
                    ";
                    return $resultado;
                    }
                    
                  }
                }
                
               }
            
          
          
                  

  

 
  
  
    
  
