<?php
session_start();

if (!$_SESSION["validar"]) {
    header("Location:ingreso");
    exit();
}

include "views/modules/menu.php";
include "views/modules/cabezote.php";

?>
<?php $model = new Tramite(); ?>

<div class="tipotram">
    <h1 class="page-header">
        <?php echo $model->id_tramite != null ? $model->cod_estudiante : 'Nuevo Registro'; ?>
    </h1>

    <ol class="breadcrumb">
        <li><a href="tramite">Tipo Tramite</a></li>
        <li class="active"><?php echo $model->id_tramite != null ? $model->cod_estudiante . " " : '/Nuevo Registro'; ?></li>
    </ol>

    <form id="frm-alumno" action="?c=Alumno&a=Guardar" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="id_tramite"
               value="<?php echo $model->id_tramite; ?>"/>

        <div class="form-group">
            <label>Estudiante</label>
            <input type="text" name="cod_estudiante" class="form-control text-center"
                   value="<?php echo $model->cod_estudiante; ?>"
                   class="form-control" placeholder="Ingrese codigo de estudiante"
                   required/>
        </div>

        <div class="form-group">
            <label>Tipo Tramite</label>
            <input type="text" name="id_tipo_tramite"
                   class="form-control text-center"
                   value="<?php echo $model->id_tipo_tramite; ?>"
                   class="form-control"
                   placeholder="Ingrese la descripcion" required/>
        </div>

        <div class="form-group">
            <label>Fecha Inicio</label>
            <input type="text" name="fecha_inicio"
                   class="form-control text-center"
                   value="<?php echo $model->fecha_inicio; ?>"
                   class="form-control"
                   placeholder="Ingrese la fecha de inicio" required/>
        </div>
        <div class="form-group">
            <label>Fecha Fin</label>
            <input type="text" name="fecha_fin"
                   class="form-control text-center"
                   value="<?php echo $model->id_tipo_tramite; ?>"
                   class="form-control"
                   placeholder="Ingrese la fecha fin" required/>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado"
                   class="form-control text-center"
                   value="<?php echo $model->id_tipo_tramite; ?>"
                   class="form-control"
                   placeholder="Ingrese el estado" required/>
        </div>

        <div class="text-right">
            <button class="btn btn-success">Guardar</button>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $("#frm-alumno").submit(function () {
                return $(this).validate();
            });
        })
    </script>
</div>
