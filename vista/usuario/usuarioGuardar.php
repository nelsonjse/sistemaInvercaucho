<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Registrar Usuario</h3>
                <div class="nk-block-des text-soft">
                    <p>Registra nuevo usuario</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=usuarios/guardar" id="formulario" class="formulario" method="POST" >
        <div class="form-row">
            <div class="col-6">
                <label for="nombre" class="col-6 col-form-label">Nombre</label>
                <input type="text"  class="form-control" name="nombre" id="nombre" placeholder="Ingresar nombre">
                <p class="text-danger" id="responseNombre"></p> 
            </div>
            <div class="col-6">
                <label for="apellido" class="col-6 col-form-label">Apellido</label>
                <input type="text"  class="form-control" name="apellido" id="apellido" placeholder="Ingresar apellido">
                <p class="text-danger" id="responseApellido"></p>
            </div>
            <div class="col-6">
                <label for="correo" class="col-6 col-form-label">Correo</label>
                <input type="text"  class="form-control" name="correo" id="correo" placeholder="Ingresar correo">
                <p class="text-danger" id="responseCorreo"></p>
            </div>
            <div class="col-6">
                <label for="cedula" class="col-6 col-form-label">Cedula</label>
                <input type="text"  class="form-control" name="cedula" id="cedula" placeholder="Ingresar cedula">
                <p class="text-danger" id="responseCedula"></p>

            </div>
            <div class="col-6">
                <label for="clave" class="col-6 col-form-label">Clave</label>
                <input type="password"  class="form-control" name="clave" id="clave" placeholder="Ingresar clave">
                <p class="text-danger" id="responseClave"></p>
            
            </div>
            <div class="col-6">
                <label for="id_rol" class="col-6 col-form-label">Rol</label>
                <select name="id_rol" id="id_rol" class="form-control">
                    <?php
                    foreach ($values->roles as $rol) {
                    ?>
                        <option value=<?= $rol->id_r ?>> <?= $rol->descripcion ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <br>
        <div class="row"> 
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Agregar</button>
                <a href="?pagina=usuarios" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</a>
                <p class="text-danger" id="mensaje"></p>

            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="js/usuarios.js"></script> 
