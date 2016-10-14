<?php
/**
 * Created by PhpStorm.
 * User: Geovane Paz
 * Date: 26/09/2016
 * Time: 14:58
 */

$dsn = 'mysql:dbname=extintor;host=localhost';


try {
    $dbh = new PDO($dsn,'root','');
} catch (PDOException $e) {
    echo getMessage();

}
