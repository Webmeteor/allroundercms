<?php
/**
* @author Dennis Vorpahl <info@webmeteor24.de>
* @copyright 2016 Webmeteor24 ({@link http://webmteor24.de})
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/
if (!defined("IN_METEOR")) { die("Access Denied"); }

// PDO variable
$pdo = NULL;
// Variables initializing
$mysql_queries_count = 0;
$mysql_queries_time = array();

require_once 'db_defines.php';

// MySQL database functions
function dbquery($query, $execute=array()) {
    global $pdo, $mysql_queries_count, $mysql_queries_time;
    $mysql_queries_count++;
    $query_time = get_microtime();
    $result = $pdo->prepare($query);
    $query_time = substr((get_microtime()-$query_time), 0, 7);
    $mysql_queries_time[$mysql_queries_count] = array($query_time, $query);
    if (!$result) {
        print_r($result->errorInfo());
        return FALSE;
    } else {
        $result->execute($execute);
        return $result;
    }
}


function dbcount($field, $table, $conditions = "", $execute=array()) {
    global $pdo, $mysql_queries_count, $mysql_queries_time;
    $mysql_queries_count++;
    $cond = ($conditions ? " WHERE ".$conditions : "");
    $query_time = get_microtime();
    $result = $pdo->prepare("SELECT COUNT".$field." FROM ".$table.$cond);
    $query_time = substr((get_microtime()-$query_time), 0, 7);
    $mysql_queries_time[$mysql_queries_count] = array($query_time, "SELECT COUNT".$field." FROM ".$table.$cond);
    if (!$result) {
        print_r($result->errorInfo());
        return FALSE;
    } else {
        $result->execute($execute);
        return $result->fetchColumn();
    }
}

function dbresult($query, $row) {
    global $pdo, $mysql_queries_count, $mysql_queries_time;
    $query_time = get_microtime();
    $data = $query->fetchAll();
    $query_time = substr((get_microtime()-$query_time), 0, 7);
    $mysql_queries_time[$mysql_queries_count] = array($query_time, $query);
    if (!$query) {
        print_r($query->errorInfo());
        return FALSE;
    } else {
        $result = $query->getColumnMeta(0);
        return $data[$row][$result['name']];
    }
}

function dbrows($query) {
    return $query->rowCount();
}

function dbarray($query) {
    global $pdo;
    $query->setFetchMode(PDO::FETCH_ASSOC);
    return $query->fetch();
}

function dbarraynum($query) {
    global $pdo;
    $query->setFetchMode(PDO::FETCH_NUM);
    return $query->fetch();
}

function dbconnect($db_host, $db_user, $db_pass, $db_name) {
    global $pdo;
    try {
        $pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name.";charset=utf8", $db_user, $db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);
    } catch (PDOException $error) {
        die("<strong>Unable to select MySQL database</strong><br />".$error->getMessage());
    }
}

function db_insert_id(){
    global $pdo;
    $id = $pdo->lastInsertId();
    return $id;
}

function table_exists($table){

    global $pdo;

    $results = dbquery("SHOW TABLES LIKE '$table'");
    if(!$results) {
        return false;
    }
    if(dbrows($results)>0){
        return true;
    }else return false;

}
