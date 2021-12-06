<?php 

class Conta
{
    public function cadastrarConta($pessoa, $conta)
    {
        if ($this->validacao($pessoa, $conta)) {

            require_once "../model/banco.php";
            $banco = new Banco();
            $conexao = $banco->conectar();
            $sql = $conexao->prepare("INSERT INTO conta (conta, fk_id_pessoa_pessoas)
                                        VALUES (:c, :p)");
            $sql->bindValue(":c", $conta);
            $sql->bindValue(":p", $pessoa);
            $sql->execute();
            if ($sql->rowCount() >= 1) {
                echo json_encode('Conta cadastrado com sucesso');
            } else {
                echo json_encode("Falha ao cadastrar o Conta1");
            }
        } else {
            echo json_encode("Falha ao cadastrar o conta2");
        }
    }

    private function validacao($pessoa, $conta)
    {
        if (!empty($pessoa) && !empty($conta)) {
            return true;
        }
    }

    public function listarContas()
    {
        require_once "../model/banco.php";
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT * FROM conta C
                                    JOIN pessoas P ON C.fk_id_pessoa_pessoas = P.id");
        $sql->execute();
        $contas = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $contas;
         
    }
    
}