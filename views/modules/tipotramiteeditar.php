<?php
session_start();

if (!$_SESSION["validar"]) {
    header("Location:ingreso");
    exit();
}

include "views/modules/menu.php";
include "views/modules/cabezote.php";

?>
<?php
$model = new Tipotramite();
?>

<div class="tipotram">
    <h1 class="page-header">
        <?php echo $model->id_tipo_tramite != null ? $model->nombre_tipo_tramite : 'Nuevo Registro'; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="tipotramite">Tipo Tramite</a></li>
        <li class="active"><?php echo $model->id_tipo_tramite != null ? $model->nombre_tipo_tramite . " " : '/Nuevo Registro'; ?></li>
    </ol>

    <form id="frm-alumno" action="?c=Tipotramite&a=Guardar" method="post"
          enctype="multipart/form-data">
        

        <div class="form-group">
            <label>Nombre de Tramite</label>
            <input type="text" name="nombre_tipo_tramite" class="form-control text-center"
                   value=""
                   class="form-control" placeholder="Ingrese nombre del tramite"
                   required/>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <input type="text" name="descripcion"
                   class="form-control text-center"
                   value=""
                   class="form-control"
                   placeholder="Ingrese la descripcion" required/>
        </div>

        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>
    <?php 
        $crearTipoTramite=new TipotramiteController();
        $crearTipoTramite->Guardar();
    ?>
    <script>
        $(document).ready(function () {
            $("#frm-alumno").submit(function () {
                return $(this).validate();
            });
        })
    </script>
</div>
