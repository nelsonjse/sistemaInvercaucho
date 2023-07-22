<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Actualizar Producto </h3>
                <div class="nk-block-des text-soft">
                    <p>Actualizar producto <?= json_encode($values->producto->id_pro)?> </p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=productos/actualizar&id_pro=<?=$values->producto->id_pro?>" method="POST" id="formulario">
        <div class="form-row">
           
           
            <div class="col-6">
                <label for="linea_productos" class="col-6 col-form-label">Linea de Producto:</label>
                <select name="linea_productos_id" id="linea_productos_id" class="form-control" selected="<?=$values->producto->linea_productos_id?>">
                    <?php
                    foreach ($values->lineas as $linea) {
                    ?>
                        <option value=<?= $linea->id ?>> <?= $linea->nombreProducto ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="marca" class="col-6 col-form-label">Marca:</label>

                <select name="marcas_id" id="marcas_id" class="form-control" selected="<?=$values->producto->marcas_id?>">
                    <?php
                    foreach ($values->marcas as $marca) {
                    ?>
                        <option value=<?= $marca->id ?>> <?= $marca->nombreMarcas ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="marca" class="col-6 col-form-label">Tipo de Vehiculo:</label>

                <select name="tipo_vehiculos_id" id="tipo_vehiculos_id" class="form-control" selected="<?=$values->producto->tipo_vehiculos_id?>">
                    <?php
                    foreach ($values->vehiculos as $vehiculo) {
                    ?>
                        <option value=<?= $vehiculo->id ?>> <?= $vehiculo->nombreVehiculo ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="descripcion" class="col-6 col-form-label">Descripcion:</label>
                <input type="text"  class="form-control" id="descripcion" name="descripcion" value="<?=$values->producto->descripcion?>" placeholder="Ingresar descripcion">
                <span id="responseDescripcion" style="color: red;"></span>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Actualizar</button>
                <a href="?pagina=productos" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</a>
                <p id="mensaje" style="color: red;"></p>
            </div>
        </div>
    </form>
</div>
<script>
    let linea = document.getElementById("linea_productos_id").value = "<?= $values->producto->linea_productos_id?>";
    let vehiculo = document.getElementById("tipo_vehiculos_id").value = "<?= $values->producto->tipo_vehiculos_id?>";
    let marca = document.getElementById("marcas_id").value = "<?= $values->producto->marcas_id?>";
</script>

<script type="text/javascript" src="js/producto.js"></script>