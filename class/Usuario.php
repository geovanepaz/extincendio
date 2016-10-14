<?php
/**
 *
 */

class Usuario
{

    private $id;
    private $usuario;
    private $nome;
    private $senha;


    /**
     * @return mixed
     */


    /**
     * @param mixed $senha
     */


    public function getId()
    {
        return $this->id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setId($i)
    {
        $this->id = $i;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

    }



    /**
     * @param $nome
     * @param $senha
     * @return bool
     */



}



