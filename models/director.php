<?php
require_once "conexion.php";


class DirectorModel{
    private $pdo;
    public $id_user;



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
            $sql = $this->pdo->conectar()->prepare("select * from t_director");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage()); 
        }
    }

    public function Obtener($id)
    {
        try {
            $sql = $this->pdo->conectar()->prepare("Select * select * from t_director where id_user=?");
            $sql->execute(array($id));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(DirectorModel $data){
        try 
		{
		$sql = "INSERT INTO t_director(id_user)
		        VALUES (?)";

      
        $stmt=$this->pdo->conectar()->prepare($sql)
        ->execute(
            array(
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