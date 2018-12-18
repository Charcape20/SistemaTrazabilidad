<?php
session_start();

if (!$_SESSION["validar"]) {
    header("Location:ingreso");
    exit();
}
include "views/modules/menu.php";
include "views/modules/cabezote.php";
?>

<div class="usuarios">
    <div class="buscar">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="search" name="buscartipotramite"
                   placeholder="Ingresar Nombre">
            <button class="btn btn-default fas fa-search"
                    type="submit"></button>
            <button type="button" class="btn btn-default nuevo-user"
                    data-toggle="modal" data-target="#myModal"><i
                        class="fas fa-plus">Nuevo</i></button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <h4 class="modal-title">Nuevo Tipo de Tramite</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="" class="control-label">Nombre del
                                    Tipo de Tramite</label>
                                <input type="text" name="nombre_tipo_tramite_nuevo"
                                       class="form-control"
                                       placeholder="Ingrese el tipo de tramite">
                            </div>
                            <div class="form-group">
                                <label for=""
                                       class="control-label">Descripcion</label>
                                <input type="text" name="descripcion_nuevo"
                                       class="form-control"
                                       placeholder="Ingrese la Descripcion">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Registrar
                            </button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default"
                                data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $crearttramite = new TipotramiteController();
        $crearttramite->guardarTipotramiteController();
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre Tipo Tramite</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $ttramite = new TipotramiteController();
        if (empty($_POST["buscartipotramite"])) {
            $ttramite->mostrarTipotramiteController();
        } else {
            // $ttramite->buscarUsuarioController();
        }
        $ttramite->modificarTipotramiteController();
        $ttramite->eliminarTipotramiteController();
        ?>
        </tbody>
    </table>
</div>
