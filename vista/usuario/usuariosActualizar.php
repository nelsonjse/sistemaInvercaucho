
<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Actualizar Usuarios</h3>
                <div class="nk-block-des text-soft">
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->  
    
    <form action="?pagina=usuarios/actualizar&id=<?=$values->usuario->id?>" method="POST"  id="formulario">
        <div class="form-row">
        <?php if($values->usuario->id_rol ==2){?>                             
            <div class="col-6 ">
                <label for="nombre" class="col-8 col-form-label">Nombre</label> 
                <input type="text" disabled class="form-control" id="nombre" name="nombre" value="<?=$values->usuario->nombres?>" placeholder="Ingresar nombre">
                <input type="hidden" class="form-control" id="nombre" name="nombre" value="<?=$values->usuario->nombres?>" placeholder="Ingresar nombre">
                <p class="text-danger" id="responseNombre"></p>
            </div>
            <div class="col-6">
                <label for="apellido" class="col-6 col-form-label">Apellido</label>
                <input type="text" disabled class="form-control" id="apellido"  name="apellido"  value="<?=$values->usuario->apellidos?>" placeholder="Ingresar apellidos">
                <input type="hidden" class="form-control" id="apellido"  name="apellido"  value="<?=$values->usuario->apellidos?>" placeholder="Ingresar apellidos">
                <p class="text-danger" id="responseApellido"></p>
            </div>
            <div class="col-6">
                <label for="correo" class="col-6 col-form-label">Correo</label>
                <input type="text" disabled class="form-control" id="correo" name="correo" value="<?=$values->usuario->correo?>" placeholder="Ingresar correo">
                <input type="hidden" class="form-control" id="correo" name="correo" value="<?=$values->usuario->correo?>" placeholder="Ingresar correo">
                <p class="text-danger" id="responseCorreo"></p>
            </div>
            <div class="col-6">
                <label for="cedula" class="col-6 col-form-label">Cedula</label>
                <input type="text" disabled class="form-control" id="cedula" name="cedula" value="<?=$values->usuario->cedula?>" placeholder="Ingresar cedula">
                <input type="hidden" class="form-control" id="cedula" name="cedula" value="<?=$values->usuario->cedula?>" placeholder="Ingresar cedula">
                <p class="text-danger" id="responseCedula"></p>
            </div>
        <?php }else{?>  
            <div class="col-6 ">
                <label for="nombre" class="col-8 col-form-label">Nombre</label> 
                <input type="text"  class="form-control" id="nombre" name="nombre" value="<?=$values->usuario->nombres?>" placeholder="Ingresar nombre">
                <p class="text-danger" id="responseNombre"></p>
            </div>
            <div class="col-6">
                <label for="apellido" class="col-6 col-form-label">Apellido</label>
                <input type="text"  class="form-control" id="apellido"  name="apellido"  value="<?=$values->usuario->apellidos?>" placeholder="Ingresar apellidos">
                <p class="text-danger" id="responseApellido"></p>
            </div>
            <div class="col-6">
                <label for="correo" class="col-6 col-form-label">Correo</label>
                <input type="text"  class="form-control" id="correo" name="correo" value="<?=$values->usuario->correo?>" placeholder="Ingresar correo">
                <p class="text-danger" id="responseCorreo"></p>
            </div>
            <div class="col-6">
                <label for="cedula" class="col-6 col-form-label">Cedula</label>
                <input type="text"  class="form-control" id="cedula" name="cedula" value="<?=$values->usuario->cedula?>" placeholder="Ingresar cedula">
                <p class="text-danger" id="responseCedula"></p>
            </div>
        <?php }?>    
            <div class="col-6">
                <label for="clave" class="col-6 col-form-label">Clave</label>
                <input type="text"  class="form-control" id="clave" name="clave" value="<?=$values->usuario->clave?>" placeholder="Ingresar clave">
                <p class="text-danger" id="responseClave"></p>
            </div>
            <?php if($values->usuario->id_rol ==2){?>    
            <div class="col-6">
                <label for="id_rol" class="col-6 col-form-label">Rol</label>
                <select name="id_rol" id="id_rol" class="form-control" selected="<?= $values->usuario->id_rol?>">
               
                    <?php 
                    foreach ($values->roles as $rol) {
                    ?>
                        <option disabled value=<?= $rol->id_r ?>> <?= $rol->descripcion ?></option>
                        
                       
                    <?php 
                    }
                    ?>
                    
                </select>
                <input type="hidden" name="id_rol" value="<?= $values->usuario->id_rol?>">
                
            </div>
            <?php }else{?>  
                <div class="col-6">
                <label for="id_rol" class="col-6 col-form-label">Rol</label>
                <select name="id_rol" id="id_rol" class="form-control" selected="<?= $values->usuario->id_rol?>">
                
                    <?php 
                    foreach ($values->roles as $rol) {
                    ?>
                        <option value=<?= $rol->id_r ?>> <?= $rol->descripcion ?></option>
                        
                    <?php 
                    }
                    ?>
                </select>
            </div>
            <?php }?>       
        </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Actualizar</button>
                <a href="?pagina=usuarios" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</a>
                <p class="text-danger" id="mensaje"></p>
            </div>
        </div>
    </form>
</div>
<script>
    let linea = document.getElementById("id_rol").value = "<?=$values->usuario->id_rol?>";
</script> 
<script type="text/javascript" src="js/usuariosActualizar.js"></script> 