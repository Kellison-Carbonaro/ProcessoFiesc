<?php
    require_once "../model/Conta.php";
    require_once "../lib/Util.php";
    $contaMdl = new Conta();

switch ($_POST['acao']) {  
     
    case 'cadastrar':        
        $pessoa = $_POST['pessoa'];
        $conta = $_POST['conta'];
        $return = $contaMdl->cadastrarConta($pessoa, $conta);
        return $return;
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
} 

class ContaCtl {
    public function mostrarContaView(){
        require_once "../model/Conta.php";
        $contaMdl = new Conta();
        $contas = $contaMdl->listarContas();
        return $contas;
    }
}