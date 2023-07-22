
<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Orden de despacho</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?= count($values->despachos) ?> despachos.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown">
                                    <a href="?pagina=despachos/crear" class=" btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a>
                                   
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
                
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col"><span class="sub-text">N° Despacho</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Estado</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Generado por</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Fecha</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Opciones</span></div>
                        </div>
                        
                        <?php if (isset($values->despachos[0])): ?>
                            
                            <?php foreach ($values->despachos as $despacho): ?>
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">                                    
                                        <div class="user-card">
                                            <div class="">
                                                <span>00<?= $despacho->id?></span>
                                            </div>                                        
                                        </div>                                    
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="<?=$despacho->estado == "Aprobado"? "badge badge-dot badge-success" : "badge badge-dot badge-danger" ?>"><?= $despacho->estado?></span>
                                    </div>

                                    <div class="nk-tb-col">
                                    <span><?= $despacho->usuario?></span>
                                    </div>
                                    <div class="nk-tb-col">
                                    <span><?= $despacho->create_ad?></span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools"> 
                                        <ul class="nk-tb-actions gx-1">
                                        <li><a href="?pagina=despachos/eliminar&id=<?=$despacho->id?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Anular</span></a></li>
                                        <li><a href="?pagina=despachos/detalles&id=<?=$despacho->id?>"><em class="icon ni ni-info text-succes"></em><span class="text-succes">Detalles</span></a></li>
                                            <!-- <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            
                                                            <li><a href="?pagina=despachos/eliminar&id=<?=$despacho->id?>"><em class="icon ni ni-trash"></em><span>Eliminar </span></a></li>
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
                    <?php if (!isset($values->despachos[0])): ?>
                        <div class="nk-tb-item text-center w-100">
                            No hay despachos para mostrar
                        </div>
                    <?php endif; ?>
                </div><!-- .card-inner -->
                <div class="card-inner">
                    <div class="nk-block-between-md g-3">
                        
                        <div class="g">
                            
                        <a href="?pagina=reporteDespacho" type="button" class="btn btn-dark" name="accion" value="reporte">Reporte</a>
                        </div><!-- .pagination-goto -->
                    </div><!-- .nk-block-between -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
   