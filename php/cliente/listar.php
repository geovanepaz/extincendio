<?php
require_once '../../class/Cliente.php';
require_once '../../class/DAO/DAOCliente.php';
require_once '../pdo.php';





try{

    $c = new Cliente();
    if(isset($_GET['id'])) {
        $c->setId($_GET['id']);
    }
    if(isset($_GET['documento'])) {
        $c->setDocumento($_GET['documento']);
    }

    if(isset($_GET['nome'])) {
        $c->setNome($_GET['nome']);
    }

    if(isset($_GET['razao'])) {
        $c->setRazao($_GET['razao']);
    }

    $dao = new DAOCliente($dbh);
    $retorno = $dao->listar($c);

    if($retorno){
        $tabela = "<table border='1' class='table table-bordered table-hover' >
                    <thead>
                        <tr >
                            <th>Ação</th>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Documento</th>
                            <th>Razão</th>
                        </tr>
                    </thead>
                    <tbody>
                       ";
        $return = "$tabela";

        foreach ($retorno as  $valor){
            $return .= "<tr>";
            $return.="<td><div id='lixeira' style='cursor:pointer' class='glyphicon glyphicon-trash' onclick='deletarCliente($valor->id)'></div></td>";
            $return.= "<td>" . utf8_encode($valor->id) . "</td>";
            $return.= "<td>" . utf8_encode($valor->nome) . "</td>";
            $return.= "<td>" . utf8_encode($valor->documento) . "</td>";
            $return.= "<td>" . utf8_encode($valor->razaoSocial) . "</td>";
            $return.= "</tr>";
        }
        echo $return.="</tbody></table>";

    }else{
        echo "Usuario não encontrado";
    }



}catch (Exception $e){
    die ($e->getMessage());

}
