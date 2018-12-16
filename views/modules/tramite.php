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
$model = new Tramite();
?>

<div class="tipotram">
    <h1 class="page-header">Tramites</h1>

    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="tramiteeditar">Nuevo Tramite</a>
    </div>
    <?php 
            $crearTramite=new TramiteController();
            $crearTramite->Guardar();
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:100px;">Id</th>
            <th style="width:200px;">Estudiante</th>
            <th>Tipo de Tramite</th>
            <th>Fecha de Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->id_tramite; ?></td>
                <td><?php echo $r->cod_estudiante; ?></td>
                <td><?php echo $r->id_tipo_tramite; ?></td>
                <td><?php echo $r->fecha_inicio; ?></td>
                <td><?php echo $r->fecha_fin; ?></td>
                <td><?php echo $r->estado; ?></td>
                <td>
                    <!--
                    <a href="?c=Autor&a=Crud&id=<?php echo $r->id_tipo_tramite; ?>">Editar</a>
                    -->
                    <a href="tipotramiteeditar">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                       href="?c=Autor&a=Eliminar&id=<?php echo $r->id_tipo_tramite; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
