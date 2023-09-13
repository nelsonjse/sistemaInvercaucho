<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Lista de Usuarios</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?= count($values->usuarios) ?> usuarios.</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown">
                                    <a href="?pagina=usuarios/crear" class=" btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a>
                                   
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
                
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            
                            <div class="nk-tb-col"><span class="sub-text">Nombre y Apellido</span></div>
                            
                            <div class="nk-tb-col "><span class="sub-text">Correo</span></div>
                            <div class="nk-tb-col "><span class="sub-text">Cedula</span></div>
                            <div class="nk-tb-col "><span class="sub-text">Rol</span></div>
                            <div class="nk-tb-col "><span class="sub-text">Accion</span></div>
                            
                            
                            
                        </div>
                        <?php if (isset($values->usuarios[0])): ?>
                            <?php foreach ($values->usuarios as $usuario): ?>
                                <div class="nk-tb-item">
                                
                                <div class="nk-tb-col">
                                    <a href="html/user-details-regular.html">
                                        <div class="user-card">
                                            
                                            <div class="user-info">
                                                <span class="tb-lead"><?=$usuario->nombres?> <?=$usuario->apellidos?></span>
                                            </div>
                                            
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="nk-tb-col ">
                                    <span><?=$usuario->correo?></span>
                                </div>
                                <div class="nk-tb-col ">
                                    <span><?=$usuario->cedula?></span>
                                </div>
                                <div class="nk-tb-col ">
                                    <span><?=$usuario->descripcion?></span>
                                </div>

                                <div class="nk-tb-col "> 
                                    <ul class="">
                                    <ul class="link-list-opt no-bdr">
                                    <?php if($usuario->descripcion == "SuperUsuario"){ ?> 
                                        
                                    <li><a href="?pagina=usuarios/mostrar&id=<?=$usuario->id?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar </span></a></li>
                                    <?php } else {?>
                                    <li><a href="?pagina=usuarios/permisos&id=<?=$usuario->id?>"><em class="icon ni ni-activity-round text-dark"></em><span class="text-dark">Configurar </span></a></li>                                  
                                    <li><a href="?pagina=usuarios/mostrar&id=<?=$usuario->id?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar </span></a></li>
                                    <li><a href="?pagina=usuarios/eliminar&id=<?=$usuario->id?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
                                    <?php } ?>
                                </ul>   
                                   
                                    </ul>
                                </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        
                    </div><!-- .nk-tb-list -->
                    <?php if (!isset($values->usuarios[0])): ?>
                        <div class="nk-tb-item text-center w-100">
                            No hay usuarios para mostrar
                        </div>
                    <?php endif; ?>
                </div><!-- .card-inner -->
                
        </div><!-- .card -->
    </div><!-- .nk-block -->
</div>
   