<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Productos</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?=count($values->productos)?> productos.</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown">
                                    <a href="?pagina=productos/crear" class=" btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a>
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-block">
    
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
            <div class="table-responsive">
                <div class="card-inner p-0">
                
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            
                        <div class="nk-tb-col "><span class="sub-text">Linea de producto</span></div>
                            <div class="nk-tb-col "><span class="sub-text">Marca</span></div>
                            
                            <div class="nk-tb-col "><span class="sub-text">Tipo de vehiculo</span></div>
                            <div class="nk-tb-col "><span class="sub-text">Descripcion</span></div>
                            <div class="nk-tb-col text-align:center"><span class="sub-text">Accion</span></div>
                        </div>
                        <?php if (isset($values->productos[0])): ?>
                            <?php foreach ($values->productos as $producto): ?>
                                <div class="nk-tb-item">
                                
                                
                                <div class="nk-tb-col ">
                                    <span><?=$producto->nombreProducto?></span>
                                </div> 
                                
                                <div class="nk-tb-col ">
                                    <span><?=$producto->nombreMarcas?></span>
                                </div>
                                
                                <div class="nk-tb-col ">
                                    <span><?=$producto->nombreVehiculo?></span>
                                </div>
                                <div class="nk-tb-col ">
                                    <span><?=$producto->descripcion?></span>
                                </div>
                                <div class="nk-tb-col text-center">
                                    <ul class="">
                                    <ul class="link-list-opt no-bdr">
                                    <li><a href="?pagina=productos/mostrar&id_pro=<?=$producto->id_pro?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar </span></a></li>
                                    <li><a href="?pagina=productos/eliminar&id_pro=<?=$producto->id_pro?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
                                    </ul>   
                                    </ul>
                                </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                    </div>
                    
                    <?php if (!isset($values->productos[0])): ?>
                        <div class="nk-tb-item text-center w-100">
                            No hay productos para mostrar
                        </div>
                    <?php endif; ?>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
   