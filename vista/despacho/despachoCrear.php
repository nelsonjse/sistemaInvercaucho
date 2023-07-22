<script src="js\helpers.js"></script>
<script>
    setStorage("orden", {
        usuario: "<?= $_SESSION["usuario"] ?>",
        productos: [],
    })
    window.addEventListener("actualizar_botones_orden", () => {
        const botonera = document.getElementById("botonera");
        const productos = getStorage("orden").productos;
        if (productos.length > 0) {
            botonera.innerHTML = `
    <button type="button" onclick="agregarProducto_bd()" title="Guardar cambios de la orden y aprobar despacho" class="btn btn-success ml-1">Despachar orden</button>
    <button type="button" onclick=" window.location.href='?pagina=despachos'" title="Deshacer los cambios realizados y volver al listado" class="btn btn-danger mx-1">Anular</button> `;
        } else {
            botonera.innerHTML = `
    <button disabled type="button" onclick="agregarProducto_bd()" title="Guardar cambios de la orden y aprobar despacho" class="btn btn-success ml-1">Despachar orden</button>
    <button type="button" onclick=" window.location.href='?pagina=despachos'" title="Deshacer los cambios realizados y volver al listado" class="btn btn-danger mx-1">Anular</button> 
    `;
        }
    });
</script>

<?php
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
date_default_timezone_set('America/Caracas');
?>

<script type="text/javascript" src="js/helpers.js"></script>
<script type="text/javascript" src="js/despacho.js"></script>


<div class="row justify-content-end align-items-center p-3">
    <a href="?pagina=despachos" type="button" class="btn btn-success mx-1" name="accion" value="Cancelar">Volver a Lista de Ordenes</a>
</div>
<div class="nk-block">
    <div class="invoice">
        <div class="invoice-wrap">
            <div class="invoice-brand text-center">
                <img src="vista/assets/images/logoinver.jpg" alt="">
            </div>
            <div class="invoice-head">
                <div class="invoice-contact">
                    <span class="overline-title">Generado por</span>
                    <div class="invoice-contact-info">
                        <h4 class="title">Usuario <?php echo $_SESSION['usuario'] ?></h4>
                        <ul class="list-plain">
                            <li><em class="icon ni ni-map-pin-fill"></em><span> Av. Florencio Jiménez, km 8½ oeste de Barquisimeto<br>Sector villa de nazareno.</span></li>
                            <li><em class="icon ni ni-call-fill"></em><span>+58 414-2185589</span></li>
                        </ul>
                    </div>
                </div>
                <div class="invoice-desc">
                    <h3 class="title">Invercaucho</h3>
                    <ul class="list-plain">
                        <li class="invoice-id"><span>ID</span>:<span>00</span></li>
                        <li class="invoice-date"><span>Fecha</span>:<span><?php echo strftime("%d de " . $meses[date('n') - 1] . " del %Y ") ?> </span></li>
                        <li class="invoice-date"><span>Estado</span>:<span>Pendiente</span></li>
                    </ul>
                </div>
            </div><!-- .invoice-head -->

            <div class="invoice-bills">
                <div id="formulario">
                    <div class="row justify-content-end align-items-center p-3">
                        <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#exampleModalLong">
                            <em class="icon ni ni-plus mr-1"></em> Agregar producto
                        </button>
                    </div>
                </div>
                <?php include "./vista/despacho/componentes/tablaProductosAgregados.php" ?>
                <div id="botonera" class="row justify-content-end align-items-center p-3">
                    <button disabled type="button" onclick="agregarProducto_bd()" title="Guardar cambios de la orden y aprobar despacho" class="btn btn-success ml-1">Despachar orden</button>
                    <button type="button" onclick=" window.location.href='?pagina=despachos'" title="Deshacer los cambios realizados y volver al listado" class="btn btn-danger mx-1">Anular</button>
                </div>
                <div class="modal fade" data-backdrop="static" keyboard="false" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Lista de productos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php include "./vista/despacho/componentes/tablaProductos.php" ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Actualizar productos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .invoice-bills -->
        </div><!-- .invoice-wrap -->
    </div><!-- .invoice -->
</div><!-- .nk-block -->