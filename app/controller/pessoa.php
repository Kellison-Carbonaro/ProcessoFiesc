<?php
        require_once "../model/Pessoa.php";
        require_once "../lib/Util.php";
        $pessoaMdl = new Pessoas();
        $util = new Util();
switch ($_POST['acao']) {  
     
    case 'cadastrar':  
        $nome = $_POST['nome'];
        $cpf = $util->maskCpf($_POST['cpf']);
        $endereco = $_POST['endereco'];
        $pessoa = $pessoaMdl->cadastrarPessoa($nome, $cpf, $endereco);
        return $pessoa;
        break;
    case 'editar':
        $nome = $_POST['nome'];
        $cpf = $util->maskCpf($_POST['cpf']);
        $endereco = $_POST['endereco'];
        $id = $_POST['id'];
        $pessoa = $pessoaMdl->editarPessoa($id, $nome, $cpf, $endereco);
        return $pessoa;
        break;
    case 'excluir':
        $id = $_POST['id'];
        $pessoa = $pessoaMdl->excluirPessoa($id);
        return $pessoa;
        break;
}   

class PessoasCtl {
    public function mostrarPessoas(){
        require_once "../model/Pessoa.php";
        require_once "../lib/Util.php";
        $pessoaMdl = new Pessoas();
        $util = new Util();
        $pessoas = $pessoaMdl->listarPessoas();
        return $pessoas;
    }
}