<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Registrar Proveedor</h3>
                <div class="nk-block-des text-soft">
                    <p>Registra nuevo proveedor</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=proveedores/guardar" method="POST" id="formulario" class="formulario"">
        <div class="form-row">
            <div class="col-6">
                <label for="nombre" class="col-6 col-form-label">Nombre</label>
                <input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre">
                <p class="text-danger" id="responseNombre"></p>
            </div>            
            <div class="col-6"> 
                <label for="rif" class="col-6 col-form-label">Rif</label>
                <input type="text"  class="form-control" id="rif" name="rif" placeholder="Ingresar Rif">
                <p class="text-danger" id="responseRif"></p>
            </div>
            <div class="col-6">
                <label for="telefono" class="col-6 col-form-label">Telefono</label>
                <input type="text"  class="form-control" id="telefono" name="telefono" placeholder="Ingresar Telefono">
                <p class="text-danger" id="responseTelefono"></p>
            </div>
            <div class="col-6">
                <label for="direccion" class="col-6 col-form-label">Direccion</label>
                <input type="text"  class="form-control" id="direccion" name="direccion" placeholder="Ingresar Direccion">
                <p class="text-danger" id="responseDireccion"></p>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Agregar</button>
                <a href="?pagina=proveedores" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</a>
                <p class="text-danger" id="mensaje"></p>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="js/proveedores.js"></script> 