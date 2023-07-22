<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Asignar Permisos</h3>
                
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
                        
                        <div class="nk-tb-col"><span class="sub-text">Modulos</span></div>                           
                        </div>
                        <form id="formulario" class="formulario" method="POST" onsubmit="registrarPermisos(event)">
                        <?php if (isset($values->permisos)): ?>
                            <?php foreach ($values->permisos as $permiso): ?>
                                <div class="nk-tb-item">
                                
                                <div class="nk-tb-col">
                                
                               
                                        <div class="user-card">
                                            <div class="custom-control custom-switch">
                                            <div class="user-info">
                                                <input type="checkbox" class="custom-control-input" id="<?=$permiso->id?>" name="permisos[]" value="<?=$permiso->id?>" <?php echo isset($values->asignados->{$permiso->id}) ? 'checked' : '' ?>>
                                                <label class="custom-control-label" for="<?=$permiso->id?>"><span class="tb-lead">  <b><?php echo $permiso->permiso?></b> </span></label>
                                                
                                            </div>
                                            </div> 
                                        </div>
                                    
                                </div>
                                
                                

                                
                                <!-- </div> -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <input type="hidden" name="id_usuario" value=" <?php echo $values->usuario->id; ?>">
                        <div class="nk-tb-col nk-tb-col-tools">
                        <button type="submit" class="btn btn-dark">Asignar</button>
                        <a href="?pagina=usuarios" class="btn btn-danger mt-2">Cancelar</a>
                        </div>
                        </form>
                    </div><!-- .nk-tb-list -->
                    
                </div><!-- .card-inner -->
                
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>

<script type="text/javascript" src="js/permisos.js"></script> 