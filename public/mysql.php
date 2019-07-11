<?php
    //建立mysql連線
    $servername = "us-cdbr-iron-east-02.cleardb.net";
    $username = "bc69658f919c1b";
    $password = "e0232fd4";
    $dbname= "heroku_fdff458b318c89d";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>