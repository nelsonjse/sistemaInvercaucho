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
            <div class="card-inner-group">
                <!-- <div class="card-inner position-relative card-tools-toggle"> -->
                    <!-- <div class="card-title-group"> -->
                        
                        <!-- <div class="card-tools mr-n1">
                            <ul class="btn-toolbar gx-1">
                                <li>
                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                </li>
                                
                            </ul>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="card-search search-wrap" data-search="search">
                        <div class="card-body">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Buscar por nombre">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div>
                    </div> -->
                <!-- </div> -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            
                            <div class="nk-tb-col"><span class="sub-text">Producto </span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Cantidad</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Precio C/U</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Proveedor</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text"></span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Accion</span></div>
                            
                            
                            
                        </div>
                        <?php if (isset($values->inventarios[0])): ?>
                            <?php foreach ($values->inventarios as $inventario): ?>
                                <div class="nk-tb-item">
                                
                                <!-- <div class="nk-tb-col">
                                    <a href="html/user-details-regular.html">
                                        <div class="user-card">
                                         <div class="user-avatar bg-primary">
                                            
                                        </div> 
                                            <div class="user-info"> 
                                                
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div> -->
                                <div class="nk-tb-col tb-col-mb">
                                    <span class="tb-lead"><?=$inventario->nombreProducto?> <?=$inventario->nombreMarcas?>  <?=$inventario->descripcion?><span class="dot dot-success d-md-none ml-1"></span></span>
                                </div>
                                
                                <div class="nk-tb-col tb-col-mb">
                                    <span><?=$inventario->cantidad?></span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span><?=$inventario->precio_unitario?> Bs</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span><?=$inventario->nombres?> </span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span> </span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools"> 
                                    <ul class="nk-tb-actions gx-1">
                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="?pagina=inventarios/mostrar&id=<?=$inventario->id_inv?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar </span></a></li>
                                                        <li><a href="?pagina=inventarios/eliminar&id=<?=$inventario->id_inv?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
                                                    </ul>
                                        <!-- <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="?pagina=inventarios/mostrar&id=<?=$inventario->id_inv?>"><em class="icon ni ni-activity-round"></em><span>Actualizar </span></a></li>
                                                        <li><a href="?pagina=inventarios/eliminar&id=<?=$inventario->id_inv?>"><em class="icon ni ni-trash"></em><span>Eliminar </span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li> -->
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
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="nk-block-between-md g-3">
                        
                        <div class="g">
                            <!-- <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3"> -->
                                <!-- <div>Page</div>
                                <div>
                                    <select class="form-select" data-search="on" data-dropdown="xs center">
                                        <option value="page-1">1</option>
                                        <option value="page-2">2</option>
                                        <option value="page-4">4</option>
                                        <option value="page-5">5</option>
                                        <option value="page-6">6</option>
                                        <option value="page-7">7</option>
                                        <option value="page-8">8</option>
                                        <option value="page-9">9</option>
                                        <option value="page-10">10</option>
                                        <option value="page-11">11</option>
                                        <option value="page-12">12</option>
                                        <option value="page-13">13</option>
                                        <option value="page-14">14</option>
                                        <option value="page-15">15</option>
                                        <option value="page-16">16</option>
                                        <option value="page-17">17</option>
                                        <option value="page-18">18</option>
                                        <option value="page-19">19</option>
                                        <option value="page-20">20</option>
                                    </select>
                                </div>
                                <div>OF 102</div> -->

                                <div>
                                <a href="?pagina=reporteInventario" type="button" class="btn btn-info" name="accion" value="">Reporte</a>
                                </div>
                            </div>
                        </div><!-- .pagination-goto -->
                    </div><!-- .nk-block-between -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
   