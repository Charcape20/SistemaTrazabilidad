<!--=====================================
FORMULARIO DE INGRESO         
======================================-->

<!-- Inicio Login -->
<div class="completo">
<section class="login" id="backIngreso">
    <article class="caja1">
        <section class="sector1">
            <div class="imagen">
                <img src="views/images/icono.png" alt="icono-empresa" class="icono">
            </div>
            <div class="titulo">
                <h1 class="titulo-principal">SISTEMA DE TRAZABILIDAD</h1>
                <p class="titulo-secundario">E. P. SISTEMAS</p>
            </div>
        </section>
        <section class="sector2">
            <div class="imagen2">
                <img src="views/images/main.png" alt="libros de cuenta" class="libros">
            </div>
        </section>
    </article>
    <div class="rectangulo"></div>
    <article class="caja2">
        <p class="titulo-inicio">LOGIN</p>
        <section class="sector3">
            <form class="formulario" method="post" id="formIngreso" onsubmit="return validarIngreso()">
                <div class="usuario">
                    <img src="views/images/user.png" alt="" class="icon_login">
                    <input type="text" class="form_login form-control formIngreso" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
                </div>
                <div class="contra">
                    <img src="views/images/pass.png" alt="" class="icon_login">
                    <input type="password" class="form_login form-control formIngreso" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso">
                </div>
				<?php
					$ingreso = new Ingreso();
					$ingreso -> ingresoController();
				?>
				<div class="opciones">
                    <label class="texto1" for="recordar"><input type="checkbox">Recordar Contraseña</label>
                    <label class="texto1" for="olvide"><input type="checkbox">Olvide mi Contraseña</label>
                </div>
                <br>
                <button type="submit" class="boton form-control formIngreso btn btn-primary">Iniciar Sesión</button>
            </form>
        </section>
    </article>
</section>
</div>

