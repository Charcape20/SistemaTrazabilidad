<?php
 require_once 'models/usuario.php';
 require_once 'models/secretaria.php';
 require_once 'models/director.php';
 require_once 'models/estudiante.php';


class UsuarioController{
    private $model;
    private $model_secretaria;
    private $model_director;
    private $model_estudiante;

    public function mostrarUsuariosController(){
        $usuarioModel=new UsuarioModel();
        $respuesta=$usuarioModel->mostrarUsuariosModel("t_usuarios","t_tipo_usuario","t_estados");
        
        foreach($respuesta as $row =>$item){
        echo '<tr>
                <td>'.$item["dni"].'</td>
                <td>'.wordwrap($item["primer_nombre"].' '.$item["segundo_nombre"].' '.$item["ap_paterno"].' '.$item["ap_materno"],20,"<br />\n").'</td>
                <td>'.$item["usuario"].'</td>
                <td>'.$item["tipo_estado"].'</td>
                <td>'.$item["sexo"].'</td>
                <td>'.$item["email"].'</td>
                <td>'.$item["celular"].'</td>
                <td>'.$item["tipo_user"].'</td>
                <td>'.$item["fecha_registro"].'</td>
                <td>
                    <a href="#myModalModificar'.$item["id_user"].'" data-toggle="modal"><span  class="btn btn-info far fa-edit modificar"></span></a>
                </td>
                <td>
                <a href="index.php?action=usuario&idBorrar='.$item["id_user"].'"><span class="btn btn-danger fa fa-times eliminar"></span></a>
                </td>
               
                <!-- Modal -->
                <div class="modal fade" id="myModalModificar'.$item["id_user"].'" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Modificar Usuario</h4>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_user" value="'.$item["id_user"].'">';
                require_once 'views/modules/usuario/usuario-editar.php';

        }
    }

    public function guardarUsuarioController(){
        
        if(isset($_POST["usuarioNuevo"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioNuevo"])&&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordNuevo"]) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailNuevo"])){
                $tipo=$_POST["tipoNuevo"];
                switch ($tipo) {
                    case 'Administrador':
                        $idtipo=1;
                        break;
                    case 'Secretaria':
                        $idtipo=2;
                        $sec = new SecretariaModel();
                        break;
                    case 'Director':
                        $idtipo=3;
                        $dir = new DirectorModel();
                        break;
                    case 'Estudiante':
                        $idtipo=4;
                        $es = new EstudianteModel();
                        break;
                    default:
                        $idtipo=1;
                        break;
                }
                
                //Se Instancian de la clase UsuarioModel
                $alm = new UsuarioModel();
                $alm->usuario = $_POST["usuarioNuevo"];
                $alm->email = $_POST["emailNuevo"];
                $alm->primer_nombre = $_POST["primerNombreNuevo"];
                $alm->segundo_nombre = $_POST["segundoNombreNuevo"];
                $alm->ap_paterno = $_POST["apellidoPaternoNuevo"];
                $alm->ap_materno = $_POST["apellidoMaternoNuevo"];
                $alm->dni = $_POST["dniNuevo"];
                $alm->celular = $_POST["celularNuevo"];
                $alm->sexo = $_POST["sexoNuevo"];
                $alm->password = $_POST["passwordNuevo"];
                $alm->id_tipo_user = $idtipo;
                $alm->intentos = 0;
                $alm->estado = 1;
                $alm->fecha_registro = '2018-12-12';
                
                
                //luego se registran los datos
                $this->model = new UsuarioModel();
                $this->model->Registrar($alm);
                
                
                $id_user = $this->model->ObteneridUser($alm->email);
                //var_dump($id_user); 
            

                //Registrando datos en las otras tablas
                if ($idtipo == 2){
                    $sec->tipo_secretaria = $_POST["tipoNuevoSecretaria"];
                    $sec->id_user = intval($id_user);
                    $this->model_secretaria = new SecretariaModel();
                    $this->model_secretaria->Registrar($sec);
                }else if ($idtipo == 3){
                    $dir->id_user = intval($id_user);
                    $this->model_director = new DirectorModel();
                    $this->model_director->Registrar($dir);
                }else if($idtipo == 4){
                    $es->cod_estudiante = $_POST["codigoNuevo"];
                    $es->id_user = intval($id_user);
                    $this->model_estudiante =  new EstudianteModel();
                    $this->model_estudiante->Registrar($es);
                   
                }
                

            }
        }
    }

    public function modificarUsuarioController(){
        if(isset($_POST["usuarioEditar"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioEditar"])&&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordEditar"]) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailEditar"])){

                $datosController=array("id_user"=>$_POST["id_user"],
                                        "usuario"=>$_POST["usuarioEditar"],
                                        "password"=>$_POST["passwordEditar"],
                                        "email"=>$_POST["emailEditar"],
                                        "primer_nombre"=>$_POST["primerNombreEditar"],
                                        "segundo_nombre"=>$_POST["segundoNombreEditar"],
                                        "ap_paterno"=>$_POST["apellidoPaternoEditar"],
                                        "ap_materno"=>$_POST["apellidoMaternoEditar"],
                                        "dni"=>$_POST["dniEditar"],
                                        "sexo"=>$_POST["sexoEditar"],
                                        "celular"=>$_POST["celularEditar"]);
                $editarUsuarioModel=new UsuarioModel();
                $respuesta=$editarUsuarioModel->modificarUsuarioModel($datosController,"t_usuarios");

            }
        }
    }

    public function eliminarUsuarioController(){
        $eliminarUsuario=new UsuarioModel();
        if(isset($_GET["idBorrar"])){
            $datosController=$_GET["idBorrar"];
            $eliminarUsuario->eliminarUsuarioModel($datosController,"t_usuarios");
        }
    }

    public function buscarUsuarioController(){//No Funciona
        $buscarUsuarioModel=new UsuarioModel();
        
        if(isset($_POST["buscarUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["buscarUsuario"])){
                $datosController=trim($_POST["buscarUsuario"]);
                $respuesta=$buscarUsuarioModel->buscarUsuariosModel($datosController,"t_usuarios","t_tipo_usuario");
                foreach($respuesta as $item){
                    echo '<tr>
                    <td>'.$item["id_user"].'</td>
                    <td>'.$item["dni"].'</td>
                    <td>'.$item["primer_nombre"].' '.$item["segundo_nombre"].' '.$item["ap_paterno"].' '.$item["ap_materno"].'</td>
                    <td>'.$item["usuario"].'</td>
                    <td>'.$item["password"].'</td>
                    <td>'.$item["sexo"].'</td>
                    <td>'.$item["email"].'</td>
                    <td>'.$item["celular"].'</td>
                    <td>'.$item["tipo_user"].'</td>
                    <td>8-12-2018</td>
                    <td>
                        <a href="#myModalModificar'.$item["id_user"].'" data-toggle="modal"><span  class="btn btn-info far fa-edit modificar"></span></a>
                    </td>
                    <td>
                        <a href="index.php?action=usuario&idBorrar='.$item["id_user"].'"><span class="btn btn-danger fa fa-times eliminar"></span></a>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="myModalModificar'.$item["id_user"].'" role="dialog">
                        <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Modificar Usuario</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_user" value="'.$item["id_user"].'">';
                                        require_once 'views/modules/usuario/usuario-editar.php';
                }
            }
        }
    }
}
?>
