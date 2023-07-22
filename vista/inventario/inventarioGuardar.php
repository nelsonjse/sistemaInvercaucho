<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Registrar en Inventario</h3>
                <div class="nk-block-des text-soft">
                    <p>Registra un nuevo producto al Inventario</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=inventarios/guardar" method="POST" id="formulario" class="row">
        <div class="col-6">
            <label for="productos_id" class="col-6 col-form-label">Productos:</label>
            <select name="productos_id" id="productos_id" class="form-control">
                

                <?php  
                foreach ($values->productos as $producto) {                    
                ?>
                    <option value=<?= $producto->id_pro ?>> <?= $producto->nombreProducto ?> <?= $producto->nombreMarcas ?>  <?=  $producto->descripcion; ?> </option>
                <?php } ?>

               
                
            </select> 
        </div>
        <div class="col-6">
            <label for="cantidad" class="col-6 col-form-label">Cantidad</label>
            <input type="text"  class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de productos">
            <p class="text-danger" id="responseCantidad"></p>
        </div>
        <div class="col-6">
            <label for="precio_unitario" class="col-6 col-form-label">Precio</label>
            <input type="text"  class="form-control" id="precio_unitario" name="precio_unitario" placeholder="Bs">
            <p class="text-danger" id="responsePrecio"></p>
        </div>
        <div class="col-6">
            <label for="proveedores_id" class="col-6 col-form-label">Proveedor:</label>
            <select name="proveedores_id" id="proveedores_id" class="form-control">
                <?php
                foreach ($values->proveedores as $proveedor) {
                ?>

                    <option value=<?= $proveedor->id ?>> <?=$proveedor->nombres?> Tlf: <?=$proveedor->telefono?> RIF: <?=$proveedor->rif?></option>
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
        <a href="?pagina=inventarios" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Inventario</a>
        <p class="text-danger" id="mensaje"></p>
    </div>
</div>
</form>
</div>
<script type="text/javascript" src="js/inventario.js"></script> 