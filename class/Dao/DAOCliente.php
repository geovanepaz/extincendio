<?php

/**
 * Created by PhpStorm.
 * User: Geovane Paz
 * Date: 05/10/2016
 * Time: 17:47
 */
class DAOCliente
{
    private $dbh;

    /**
     * DAOUsuario constructor.
     */
    public function __construct(PDO $dbh){

        $this->dbh = $dbh;
    }

    public function cadastrar(Cliente $cliente){
        $retorno =false;
        $documento = $cliente->getDocumento();
        $nome = $cliente->getNome();
        $razao = $cliente->getRazao();
        $ie = $cliente->getIe();
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();
        $cep = $cliente->getCep();
        $cidade = $cliente->getCidade();
        $bairro = $cliente->getBairro();
        $rua = $cliente->getRua();
        $numero = $cliente->getNumero();
        $complemento = $cliente->getComplemento();

        $sql = "INSERT INTO cliente (documento, nome, razaoSocial, inscricaoEstadual, telefone, email, cep, cidade, rua, numero, bairro, complemento)";
        $sql .= "VALUES(:documento, :nome, :razaoSocial, :inscricaoEstadual, :telefone, :email, :cep, :cidade, :rua, :numero, :bairro, :complemento)";
        $stmt = $this->dbh->prepare($sql);

        $stmt->bindParam(':documento', $documento, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':razaoSocial', $razao, PDO::PARAM_STR);
        $stmt->bindParam(':inscricaoEstadual', $ie, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':cep', $cep, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindParam(':rua', $rua, PDO::PARAM_STR);
        $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $bairro, PDO::PARAM_STR);
        $stmt->bindParam(':complemento', $complemento, PDO::PARAM_STR);

        if ($stmt->execute()) {
            if ($stmt->rowCount());
            $retorno = true;
        } else {
            $error = $stmt->errorInfo();
            echo $error[2];
        }

        return $retorno;

    }

    public function listar(Cliente $cliente){
        $id = $cliente->getId();
        $documento = $cliente->getDocumento();
        $nome = $cliente->getNome();
        $razao = $cliente->getRazao();


        if(isset($id)){
            $busca = $id .'%';
            $sql = "SELECT * FROM cliente WHERE id  LIKE :busca";

        }elseif (isset($documento)){
            $busca = $documento .'%';
            $sql = "SELECT * FROM cliente WHERE documento  LIKE :busca";

        }elseif (isset($nome)) {
            $busca = $nome . '%';
            $sql = "SELECT * FROM cliente WHERE nome  LIKE :busca";

        }elseif (isset($razao)){
            $busca = $razao .'%';
            $sql = "SELECT * FROM cliente WHERE razaoSocial  LIKE :busca";
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

    public function deletar(Cliente $cliente){
        $id = $cliente->getId();

        $sql = "DELETE  FROM cliente WHERE id  = :id";
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