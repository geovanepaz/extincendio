<?php

/**
 * Created by PhpStorm.
 * User: geovane
 * Date: 30/09/2016
 * Time: 08:12
 */
class DAOUsuario
{
private $dbh;

    /**
     * DAOUsuario constructor.
     */
    public function __construct(PDO $dbh){

        $this->dbh = $dbh;
    }

    public function autenticar(Usuario $usuario){
        $retorno = false;
        $u = $usuario->getUsuario();
        $senha = $usuario->getSenha();



        $sql = "select id,usuario,senha from usuario WHERE usuario = :usuario";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':usuario',$u, PDO::PARAM_STR);

        if($stmt->execute()){
            if($stmt->rowCount()){
                $registro = $stmt->fetch(PDO::FETCH_OBJ);
                if(password_verify($senha,$registro->senha)){
                    session_start();
                    $_SESSION['usuario'] = $registro->usuario;
                    $retorno = true;

                }

            }
        }else{
            $error = $stmt->errorInfo();
            echo $error[2] ;
        }


        return $retorno;
    }



    public function cadastrar(Usuario $usuario)
    {

        $retorno = false;
        $nome = $usuario->getNome();
        $u = $usuario->getUsuario();
        $senha = $usuario->getSenha();


        $codificada = password_hash($senha, PASSWORD_DEFAULT, [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ]);

        $sql = "INSERT INTO usuario (nome,usuario,senha)VALUES (:nome,:usuario,:senha)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $u, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $codificada, PDO::PARAM_STR);

        if ($stmt->execute()) {
            if ($stmt->rowCount());
                $retorno = true;
        } else {
            $error = $stmt->errorInfo();
            echo $error[2];
        }

        return $retorno;

    }

    public function listar(Usuario $usuario){
        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $u = $usuario->getUsuario();


        if(isset($id)){
            $busca = $id .'%';
            $sql = "SELECT id,nome,usuario FROM usuario WHERE id  LIKE :busca";

        }elseif (isset($nome)){
            $busca = $nome .'%';
            $sql = "SELECT id,nome,usuario FROM usuario WHERE nome  LIKE :busca";

        }elseif (isset($u)){
            $busca = $u .'%';
            $sql = "SELECT id,nome,usuario FROM usuario WHERE usuario  LIKE :busca";
        }else{
            throw new Exception("Deve apenas preencher um campo de cada vez");
        }



        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':busca',$busca, PDO::PARAM_STR);

        if($stmt->execute()){
            if($stmt->rowCount()){
                $retorno = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $retorno;

            }else{
                return false;
            }

        }else{
            //$this->dbh= null;
            throw new Exception($stmt->errorInfo());

        }

    }

    public function deletar(Usuario $usuario){
        $id = $usuario->getId();

        $sql = "DELETE  FROM usuario WHERE id  = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->rowCount();
        }else{
            throw new Exception($stmt->errorInfo());
        }

    }

        public function __destruct()
        {
            $this->dbh = null;
        }






}