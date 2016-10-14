<?php
/**
 * Created by PhpStorm.
 * User: Geovane Paz
 * Date: 12/10/2016
 * Time: 18:49
 */
require_once '../../class/Cliente.php';
require_once '../../class/DAO/DAOCliente.php';
require_once '../pdo.php';

$id = $_GET['id'];






try{
    $c = new Cliente();
    $c->setId($id);
    $dao = new DAOCliente($dbh);
    echo $dao->deletar($c);


}catch (Exception $e){
    die ($e->getMessage());

}










