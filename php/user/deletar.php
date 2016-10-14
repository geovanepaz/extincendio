<?php
require_once '../../class/Usuario.php';
require_once '../../class/DAO/DAOUsuario.php';
require_once '../pdo.php';

$id = $_GET['id'];






try{
    $u = new Usuario();
    $u->setId($id);
    $dao = new DAOUsuario($dbh);
     echo $dao->deletar($u);


}catch (Exception $e){
    die ($e->getMessage());

}










