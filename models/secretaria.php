<?php
require_once "conexion.php";
class SecretariaModel{
    private $pdo;
    public $id_user;
    public $tipo_secretaria;


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
            $sql = $this->pdo->conectar()->prepare("select * from t_secretaria");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

   


    public function Registrar(SecretariaModel $data){
        try 
		{
		$sql = "INSERT INTO t_secretaria(id_user,tipo_secretaria)
		        VALUES (?, ? )";

    
        $stmt=$this->pdo->conectar()->prepare($sql)
        ->execute(
            array(
                        $data->id_user,
                        $data->tipo_secretaria
            )
        );

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }
}



?>