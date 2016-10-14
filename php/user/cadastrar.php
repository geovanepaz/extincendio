<?php
    require_once '../../class/Usuario.php';
    require_once '../../class/DAO/DAOUsuario.php';
    require_once '../pdo.php';

    $nome = $_GET['nome'];
    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];
    $confirma = $_GET['confirma'];

    if (strlen(trim($nome)) < 4)
        die("O campo nome deve conter no minimo 4 caracteres");

    if (strlen(trim($usuario)) < 4)
        die("Campo usuario deve conter no minimo 4 caracteres");

    if (strlen(trim($senha)) < 4)
        die("Senha deve conter no minimo 4 carcateres");

    if($senha !== $confirma)
        die("As senhas não conferem");


    try{
        $u = new Usuario();
        $u->setUsuario($usuario);
        $u->setNome($nome);
        $u->setSenha($senha);


        $dao = new DAOUsuario($dbh);
        echo $dao->cadastrar($u);


    }catch (Exception $e){
        die ($e->getMessage());

    }










