<?php

class Tipotramite
{
    private $pdo;
    public $id_tipo_tramite;
    public $nombre_tipo_tramite;
    public $descripcion;

    public function __construct()
    {
        try {
            $this->pdo = new Conexion;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        $sql = $this->pdo->conectar()->prepare("Select * From trazabilidad.t_tipo_tramite");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function Obtener($id)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Select * From trazabilidad.t_tipo_tramite 
                                                              where id_tipo_tramite=?");
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Delete From trazabilidad.t_tipo_tramite
                                                            Where id_tipo_tramite=?");
            $sql->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Update trazabilidad.t_tipo_tramite 
                                                              Set nombre_tipo_tramite=?,
                                                                  descripcion=? 
                                                              where id_tipo_tramite=?");
            $sql->execute(
                array(
                    $data->nombre_tipo_tramite,
                    $data->descripcion,
                    $data->id_tipo_tramite
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar($data)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Insert Into trazabilidad.t_tipo_tramite(nombre_tipo_tramite, descripcion) 
                                                            Value (?,?)");
            $sql->execute(array(
                    $data->nombre_tipo_tramite,
                    $data->descripcion
                )

            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}