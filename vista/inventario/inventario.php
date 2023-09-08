<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Inventario</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?=count($values->inventarios)?> productos inventariados.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown">
                                    <a href="?pagina=inventarios/crear" class=" btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a>
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
        <div class="table-responsive">
            <div class="card-inner-group">                
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            
                            <div class="nk-tb-col"><span class="sub-text">Producto </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Cantidad</span></div>
                            <div class="nk-tb-col"><span class="sub-text">Precio C/U</span></div>
                            <div class="nk-tb-col"><span class="sub-text">Proveedor</span></div>
                            <div class="nk-tb-col"><span class="sub-text"></span></div>
                            <div class="nk-tb-col"><span class="sub-text">Accion</span></div>
                            
                            
                            
                        </div>
                        <?php if (isset($values->inventarios[0])): ?>
                            <?php foreach ($values->inventarios as $inventario): ?>
                                <div class="nk-tb-item">
                                
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><?=$inventario->nombreProducto?> <?=$inventario->nombreMarcas?>  <?=$inventario->descripcion?></span>
                                </div>
                                
                                <div class="nk-tb-col">
                                    <span><?=$inventario->cantidad?></span>
                                </div>
                                <div class="nk-tb-col">
                                    <span><?=$inventario->precio_unitario?> Bs</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span><?=$inventario->nombres?> </span>
                                </div>
                                <div class="nk-tb-col">
                                    <span> </span>
                                </div>
                                <div class="nk-tb-col"> 
                                    <ul class="">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="?pagina=inventarios/mostrar&id=<?=$inventario->id_inv?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar </span></a></li>
                                        <li><a href="?pagina=inventarios/eliminar&id=<?=$inventario->id_inv?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
                                    </ul>
                                        
                                    </ul>
                                </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                    </div><!-- .nk-tb-list -->
                    <?php if (!isset($values->inventarios[0])): ?>
                        <div class="nk-tb-item text-center w-100">
                            No hay inventarios para mostrar
                        </div>
                    <?php endif; ?>
                </div>
                </div>   
            </div>
        </div>
    </div>
</div>
   