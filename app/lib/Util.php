<?php 
class Util {

    public function maskCpf($cpf)
    {
        $cpf = str_replace(".", '', $cpf);
        $cpf = str_replace("-", '', $cpf);
        return intval($cpf);
    }

    public function includeMaskCpf($cpf){
        $cpf = substr_replace($cpf, '.', 3, 0);
        $cpf = substr_replace($cpf, '.', 7, 0);
        $cpf = substr_replace($cpf, '-', 11, 0);
        return $cpf;
    }
    
}
