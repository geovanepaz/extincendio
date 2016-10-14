<?php
    require_once '../../class/Usuario.php';
    require_once '../../class/DAO/DAOUsuario.php';
    require_once '../pdo.php';

if (strlen(trim($_GET['usuario'])) < 4 || strlen(trim($_GET['senha'])) < 4)
    die("Usuario ou senha incorretos");

    try {

        $u = new Usuario();
        $u->setUsuario($_GET['usuario']);
        $u->setSenha($_GET['senha']);
        $dao = new DAOUsuario($dbh);
        echo $dao->autenticar($u);

    }catch (Exception $e){
        die ($e->getMessage());
    }



