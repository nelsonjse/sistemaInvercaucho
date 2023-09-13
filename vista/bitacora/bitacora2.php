<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Bitacora</h3>
                <div class="nk-block-des text-soft">
                   
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        
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
                            
                            <div class="nk-tb-col"><span class="sub-text">Usuario</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Fecha Entrada</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Hora Entrada</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Fecha Salida</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="sub-text">Hora Salida</span></div>
                         
                        </div>
                       
                        
                            <?php foreach ($values->registros as $registro): ?>
                                <div class="nk-tb-item">
                               
                                <div class="nk-tb-col tb-col-mb">
                                    <span class="tb-lead"><?=$registro->nombres?> <?=$registro->apellidos?><span class="dot dot-success d-md-none ml-1"></span></span>
                                </div>
                                
                                <div class="nk-tb-col tb-col-mb">
                                    <span><?=$registro->fechaEntrada?></span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span><?=$registro->horaEntrada?></span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span><?=$registro->fechaSalida?> </span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span><?=$registro->horaSalida?> </span>
                                </div>
                               
                                </div>
                            <?php endforeach; ?>
                        
                        
                    </div><!-- .nk-tb-list -->
                   
                </div><!-- .card-inner -->
               
                        </div><!-- .pagination-goto -->
                    </div><!-- .nk-block-between -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
   