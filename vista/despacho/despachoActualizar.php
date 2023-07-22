
<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Actualizar despachos</h3>
                <div class="nk-block-des text-soft">
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=despachos/actualizar&id=<?=$values->despacho->id?>" method="POST" id="formulario">
        <div class="form-row">
            <div class="col-6 ">
                <label for="email" class="col-8 col-form-label">nombres</label>
                <input type="text" required class="form-control" name="nombres" value="<?=$values->despacho->nombres?>" placeholder="Ingresar nombre">
            </div>
            <div class="col-6">
                <label for="email" class="col-6 col-form-label">Apellidos</label>
                <input type="text" required class="form-control"  name="apellidos"  value="<?=$values->despacho->apellidos?>" placeholder="Ingresar apellidos">
            </div>
            <div class="col-6">
                <label for="email" class="col-6 col-form-label">Correo</label>
                <input type="text" required class="form-control" name="correo" value="<?=$values->despacho->correo?>" placeholder="Ingresar correo">
            </div>
            <div class="col-6">
                <label for="email" class="col-6 col-form-label">Cedula</label>
                <input type="text" required class="form-control" name="cedula" value="<?=$values->despacho->cedula?>" placeholder="Ingresar cedula">
            </div>
            <div class="col-6">
                <label for="email" class="col-6 col-form-label">Clave</label>
                <input type="text" required class="form-control" name="clave" value="<?=$values->despacho->clave?>" placeholder="Ingresar clave">
            </div>

        </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Actualizar</button>
                <button type="button" class="btn btn-danger" name="accion" value="Cancelar">Cancelar</button>
            </div>
        </div>
    </form>
</div>