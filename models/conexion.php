<?php

class Conexion{
    public function conectar(){
        $link=new PDO("mysql:host=localhost;dbname=trazabilidad","root","",
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $link;
    }
}