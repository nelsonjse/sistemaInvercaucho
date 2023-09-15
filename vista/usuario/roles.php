
<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Roles</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?=count($values->roles) ?> roles.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown mt-2 mr-4">                               
                                    <a class="link-guardar" data-toggle="modal" data-target="#modalGuardar">                                        
                                        <span class="btn btn-info text-white">Registrar Nuevo Rol</span>
                                    </a>            

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    .table-no-horizontal-border tbody tr td {
        border-top: none;
        border-bottom: none;
    }
    </style>
    <div class="container">
        <h2>Lista de Roles</h2>
        <div class="table-responsive">
       
            <table class="table table-bordered table-no-horizontal-border">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="">Accion</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($values->roles[0])): ?>
            <?php foreach ($values->roles as $rol): ?>
                    <tr>
                        <td class="align-middle"><?= $rol->descripcion?></td>                        
                        <td class="align-middle">
                            <ul class="nk-tb-actions gx-1">
                                <ul class="link-list-opt no-bdr">
                                   <?php if($rol->descripcion == "SuperUsuario"){?>
                                    <a class="link-actualizar" data-toggle="modal" data-target="#modal-actualizar" data-rol-id="<?=$rol->id_r?>">
                                        <em class="icon ni ni-activity-round text-info"></em>
                                        <span class="text-info">Actualizar</span>
                                    </a>
                                    <?php }else{ ?>
                                    <li>
                                    <a class="link-actualizar" data-toggle="modal" data-target="#modal-actualizar" data-rol-id="<?=$rol->id_r?>">
                                        <em class="icon ni ni-activity-round text-info"></em>
                                        <span class="text-info">Actualizar</span>
                                    </a>
                                    </li>
                                    <li><a href="?pagina=roles/eliminar&id=<?=$rol->id_r?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
                                    <?php }; ?>
                                </ul>                                    
                            </ul>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>            
            </table>
        <div>
    </div>
</div>

    

    <?php if (!isset($values->roles[0])): ?>
        <div class="nk-tb-item text-center w-100">
            No hay roles para mostrar
        </div>
    <?php endif; ?>



<!-- <a id="modalGuardar" type="button" class="btn btn-info text-white" name="accion" value="agregar">Agregar</a> -->


    <!-- Modal Guardar -->
    <div id="modalGuardar" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalGuardarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">            
            <div class="modal-content">                
                <div class="nk-block-head">
                    <div class="nk-block-between">
                        <div class="modal-header"  style="border: none;">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title page-title">Registrar Rol</h2>
                            </div>
                        </div>                
                    </div>
                </div>    
                <div class="modal-body">
                    <form action="?pagina=roles/guardar" method="POST" id="formulario2" class="formulario2">
                        <div class="form-row">
                            <div class="col-6">
                                <label for="descripcion" class="col-6 col-form-label">Descripcion:</label>
                                <input type="text"  class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar Rol">
                                <p class="text-danger" id="responseDescripcion"></p>
                            </div> 
                        </div>                    
                        <br>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Agregar</button>
                                <button type="button" id="closeModalBtn" class="CerrarModal btn btn-danger" name="accion" value="Cancelar">Cerrar</button>
                                <p class="text-danger" id="mensaje"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>                  





<div id="modal-actualizar" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">            
        <div class="modal-content"> 
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="modal-header"  style="border: none;">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Actualizar Rol</h2>
                        </div>
                    </div>   
                </div>         
            </div>

            <div class="modal-body"> 
                <form action="?pagina=roles/actualizar" method="POST" id="formulario">
                    <input type="hidden" name="rol_id" id="rol_id" value="">
                    <div class="form-row">
                        <div class="col-6 ">
                            <label for="descripcion" class="col-8 col-form-label">Descripcion:</label>
                            <input type="text"  class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar Rol">
                            <p class="text-danger" id="responseDescripcion"></p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer" style="border: none;>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" name="accion" value="actualizar">Actualizar</button>
                                <button type="button" id="closeModalBtn2" class="CerrarModal2 btn btn-danger" name="accion" value="Cancelar">Cerrar</button>
                                <p class="text-danger" id="mensaje"></p>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

      
    
<script src="js/modalRol.js"></script>    

                          