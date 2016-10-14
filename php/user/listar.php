<?php
require_once '../../class/Usuario.php';
require_once '../../class/DAO/DAOUsuario.php';
require_once '../pdo.php';





try{

    $u = new Usuario();
    if(isset($_GET['id'])) {
        $u->setId($_GET['id']);
    }
    if(isset($_GET['usuario'])) {
        $u->setUsuario($_GET['usuario']);
    }

    if(isset($_GET['nome'])) {
        $u->setNome($_GET['nome']);
    }

    $dao = new DAOUsuario($dbh);
    $retorno = $dao->listar($u);

    if($retorno){
        $tabela = "<table border='1' class='table table-bordered table-hover' >
                    <thead>
                        <tr >
                            <th>Ação</th>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                       ";
        $return = "$tabela";

        foreach ($retorno as  $valor){
            $return .= "<tr>";
            $return.="<td><div id='lixeira' style='cursor:pointer' class='glyphicon glyphicon-trash' onclick='deletarUsuario($valor->id)'></div></td>";
            $return.= "<td>" . utf8_encode($valor->id) . "</td>";
            $return.= "<td>" . utf8_encode($valor->nome) . "</td>";
            $return.= "<td>" . utf8_encode($valor->usuario) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";

    }else{
        echo "Usuario não encontrado";
    }



}catch (Exception $e){
    die ($e->getMessage());

}
