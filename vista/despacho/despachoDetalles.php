<?php
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

date_default_timezone_set('America/Caracas');







?>
<div class="row justify-content-end align-items-center p-3">
<a href="?pagina=reporteDespachoDetalles&id=<?=$values->despachos->id?>" type="button" class="btn btn-info" name="accion" value="reporte">Imprimir</a>
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
                        <h5 class="title">Usuario <?php echo $_SESSION['usuario'] ?></h5>
                        <ul class="list-plain">
                            <li><em class="icon ni ni-map-pin-fill"></em><span> Av. Florencio Jiménez, km 8½ oeste de Barquisimeto<br>Sector villa de nazareno.</span></li>
                            <li><em class="icon ni ni-call-fill"></em><span>+58 414-2185589</span></li>
                        </ul>
                        <br/>
                        <ul>
                    <h5><em class="title"></em><span>Datos del cliente:</span></h5>
                   
                    <li><em class="icon ni ni-user"></em><span>cliente <?= $values->cliente->nombre ?></span></li>
                    
                    <li><em class="icon ni ni-eye"></em><span>rif :${e.detail.rif}</span></li>
                    <li><em class="icon ni ni-map"></em><span>direccion : ${e.detail.direccion}</span></li>
                </ul>
                    </div>
                </div>
                <div class="invoice-desc">
                    <h3 class="title">Invercaucho</h3>
                    <ul class="list-plain">
                        <li class="invoice-id"><span>ID</span>:<span><?= $values->despachos->id ?></span></li>
                        <li class="invoice-date"><span>Fecha</span>:<span><?= $values->despachos->create_ad ?></span></li>
                        <li class="invoice-date"><span>Estado</span>:<span class="<?= $values->despachos->estado == "Aprobado" ? " badge-dot badge-success" : " badge-dot badge-danger" ?>"><?= $values->despachos->estado ?></span></li>
                    </ul>
               
                </div>
            </div><!-- .invoice-head -->
            <div class="invoice-bills">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="w-150px">ID</th>
                                <th class="w-60">Productos</th>
                                <th>Cantidad</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php if (isset($values->productos[0])) : ?>

                                <?php foreach ($values->productos as $producto) : ?>
                                    <tr>
                                        <td><?= $producto->productos_id ?></td>
                                        <td><?= $producto->nombreProducto ?> <?= $producto->nombreMarcas ?> <?= $producto->descripcion ?></td>
                                        <td><?= $producto->cantidad ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </tbody>

                    </table>
                    <div class="nk-notes ff-italic fs-12px text-soft"> Productos de la orden de despacho. </div>
                   
                </div>
            </div><!-- .invoice-bills -->
        </div><!-- .invoice-wrap -->
    </div><!-- .invoice -->
</div><!-- .nk-block -->