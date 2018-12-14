<?php

class Estado
{
    private $pdo;

    public $id;
    public $tipo_estado;

    public function __construct()
    {
        try {
            $this->pdo = new Conexion();
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function Listar()
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Select * From trazabilidad.t_estados");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Select * From trazabilidad.t_estados where id_estado=?");
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}