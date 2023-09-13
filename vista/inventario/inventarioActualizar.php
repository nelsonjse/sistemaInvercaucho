<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Actualizar Inventario </h3>
                <div class="nk-block-des text-soft">
                    <p>Actualizar datos del inventario</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=inventarios/actualizar&id_inv=<?=$values->inventario->id_inv?>" method="POST" id="formulario" class="row">
        <div class="col-6">
            <label for="productos_id" class="col-6 col-form-label">Productos:</label>
            <select name="productos_id" id="productos_id" class="form-control" selected="<?= $values->inventario->productos_id?>"> 
                <?php
                foreach ($values->productos as $producto) { 
                ?>

            <option value=<?= $producto->id_pro ?>> <?= $producto->nombreProducto ?> <?= $producto->nombreMarcas ?> <?= $producto->nombreVehiculo ?> <?=  $producto->descripcion; ?> </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-6">
            <label for="cantidad" class="col-6 col-form-label">Cantidad</label>
            <input type="text" required class="form-control" id="cantidad" name="cantidad" value="<?=$values->inventario->cantidad?>" placeholder="Cantidad de productos">
            <p class="text-danger" id="responseCantidad"></p>
        </div>
        <div class="col-6">
            <label for="precio_unitario" class="col-6 col-form-label">Precio</label>
            <input type="text" required class="form-control" id="precio_unitario"  name="precio_unitario" value="<?=$values->inventario->precio_unitario?>" placeholder="$">
            <p class="text-danger" id="responsePrecio"></p>
        </div>
        <div class="col-6">
            <label for="proveedores_id" class="col-6 col-form-label">Proveedor:</label>
            <select name="proveedores_id" id="proveedores_id" class="form-control" selected="<?= $values->inventario->proveedores_id?>">
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
        <button type="submit" class="btn btn-primary" name="accion" value="agregar">Actualizar</button>
        <a href="?pagina=inventarios" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Inventario</a>
        <p class="text-danger" id="mensaje"></p>
    </div>
</div>
</form>
</div> 
<script>
     let proveedores =  document.getElementById("proveedores_id").value ="<?= $values->inventario->proveedores_id?>";
     let productos = document.getElementById("productos_id").value="<?= $values->inventario->productos_id?>"
</script>
<script type="text/javascript" src="js/inventarioActualizar.js"></script> 