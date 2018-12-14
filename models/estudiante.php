<?php
require_once "conexion.php";



class EstudianteModel{
    private $pdo;
    public $id_user;
    public $cod_estudiante;


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
            $sql = $this->pdo->conectar()->prepare("select * from t_estudiante");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("select * from t_estudiante where id_user=?");
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Registrar(EstudianteModel $data){
        try 
		{
		$sql = "INSERT INTO t_estudiante(cod_estudiante,id_user)
		        VALUES (?,?)";

 
        $stmt=$this->pdo->conectar()->prepare($sql)
        ->execute(
            array(
                $data->cod_estudiante,
                $data->id_user
            )
        );

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

}



?>