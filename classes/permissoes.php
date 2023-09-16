<?php 
class Permissoes{
    private $permissoes;

    public function __construct($permissoes){
        $this->permissoes = $permissoes;
    }


public function AcessoCadastroU(){
    if ($this->permissoes == 1 || $this->permissoes == 3) {
        header("Location: cadastroUsuario.php");
        exit();
}}

public function AcessoCadastroC(){
    if ($this->permissoes== 2 || $this->permissoes == 3) {
        header("Location: cadastroCliente.php");
        exit();}
}}
?>