<?php
require_once '../../class/Cliente.php';
require_once '../../class/DAO/DAOCliente.php';
require_once '../pdo.php';

$documento = $_GET['documento'];
$nome = $_GET['nome'];
$razao = $_GET['razao'];
$ie = $_GET['ie'];
$telefone = $_GET['telefone'];
$email = $_GET['email'];
$cep = $_GET['cidade'];
$cidade = $_GET['cidade'];
$bairro = $_GET['bairro'];
$rua = $_GET['rua'];
$numero = $_GET['numero'];
$complemento = $_GET['complemento'];

if (strlen(trim($nome)) < 2)
    die("O campo nome deve ser preenchido");


try{
    $cliente = new Cliente();
    if(!$cliente->validadocumento($documento))
        die("CPF ou CNPJ invalido");

    $cliente->setDocumento($documento);
    $cliente->setNome($nome);
    $cliente->setRazao($razao);
    $cliente->setIe($ie);
    $cliente->setTelefone($telefone);
    $cliente->setEmail($email);
    $cliente->setCep($cep);
    $cliente->setCidade($cidade);
    $cliente->setBairro($bairro);
    $cliente->setRua($rua);
    $cliente->setNumero($numero);
    $cliente->setComplemento($complemento);


    $dao = new DAOCliente($dbh);
    echo $dao->cadastrar($cliente);


}catch (Exception $e){
    die ($e->getMessage());

}










