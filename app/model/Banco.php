<?php 
class Banco {
    public $msgErro = "";

    public function conectar()
    {
        //Conexão do banco de dados
        global $conexao;
        global $msgErro;
        $dbuser = $_ENV['MYSQL_USER'];
        $dbpass = $_ENV['MYSQL_PASS'];
        try {
            $conexao = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
            return $conexao;
        } catch (PDOException $e) {
            return $msgErro = $e->getMessage();
        }
    }
    
}
