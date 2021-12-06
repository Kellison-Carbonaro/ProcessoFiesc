<?php 

class Pessoas
{
    public function cadastrarPessoa($nome, $cpf, $endereco)
    {
        if ($this->validacao($nome, $cpf, $endereco)) {

            require_once "../model/banco.php";
            $banco = new Banco();
            $conexao = $banco->conectar();
            $sql = $conexao->prepare("INSERT INTO pessoas (nome, cpf, endereco)
                                        VALUES (:n, :c, :e)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":e", $endereco);
            
            $sql->execute();
            if ($sql->rowCount() >= 1) {
                echo json_encode('pessoa cadastrado com sucesso');
            } else {
                echo json_encode("Falha ao cadastrar o pessoa");
            }
        } else {
            echo json_encode("Falha ao cadastrar o pessoa");
        }
    }

    private function validacao($nome, $cpf, $endereco)
    {
        if (!empty($nome) && !empty($cpf) && !empty($endereco)) {
            return true;
        }
    }

    public function listarPessoas(){
        require_once "../model/banco.php";
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT * FROM pessoas");
        $sql->execute();
        $pessoas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $pessoas;
    }

    
    public function editarPessoa($id, $nome, $cpf, $endereco){
        if ($this->validacao($nome, $cpf, $endereco)) {

            require_once "../model/banco.php";
            $banco = new Banco();
            $conexao = $banco->conectar();
            $sql = $conexao->prepare("UPDATE pessoas
                                        SET nome = :n, cpf = :c, endereco = :e
                                         WHERE id = :i");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":c", $cpf);
            $sql->bindValue(":e", $endereco);
            $sql->bindValue(":i", $id);

            $sql->execute();
            if ($sql->rowCount() >= 1) {
                echo json_encode('pessoa atualizada com sucesso');
            } else {
                echo json_encode("Falha ao atualizar o pessoa");
            }
        } else {
            echo json_encode("Falha ao atualizar o pessoa, não foram preenchido todos os campos");
        }
    }

    public function excluirPessoa($id){
        require_once "../model/banco.php";
        $banco = new Banco();
        $conexao = $banco->conectar();  
        $sql = $conexao->prepare("DELETE FROM pessoas WHERE id = :i");
        $sql->bindValue(":i", $id);
        $sql->execute();
        if ($sql->rowCount() >= 1) {
            echo json_encode('pessoa excluida com sucesso');
        } else {
            echo json_encode("Falha ao excluir o pessoa");
        }
    }
}