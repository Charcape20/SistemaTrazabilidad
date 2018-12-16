<?php

class TramiteController
{
    private $model;
    public $id_tramite;
    public $cod_estudiante;
    public $id_tipo_tramite;
    public $fecha_inicio;
    public $fecha_fin;
    public $estado;

    public function __CONSTRUCT()
    {
        $this->model = new Tipotramite();
    }

    public function Index()
    {
        require_once "../views/modules/tipotramite.php";
    }

    public function Crud()
    {
        $alm = new Tipotramite();

        if (isset($_REQUEST['id_tipo_tramite'])) {
            $alm = $this->model->Obtener($_REQUEST['id_tipo_tramite']);
        }
        require_once "../views/modules/tipotramite.php";
    }

    public function Guardar()
    {
        $alm = new Tramite();

        $alm->id_tramite = $_POST['id_tramite'];
        $alm->cod_estudiante = $_POST['cod_estudiante'];
        $alm->id_tipo_tramite = $_POST['id_tipo_tramite'];
        $alm->fecha_inicio = $_POST['fecha_inicio'];
        $alm->fecha_fin = $_POST['fecha_fin'];
        $alm->estado = $_POST['estado'];

        $this->model=new Tramite();
        $this->model->Registrar($alm);

        // $alm->id_tramite > 0
        //     ? $this->model->Actualizar($alm)
        //     : $this->model->Registrar($alm);

        header('Location: /?c=Alumno&a=Index');
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: /?c=Alumno&a=Index');
    }
}