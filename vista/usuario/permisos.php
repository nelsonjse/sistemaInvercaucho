<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Asignar Permisos</h3>                
            </div>
           
        </div>
    </div>
    <div class="table-responsive">
    <div class="container d-flex flex-column align-items-center vh-80 justify-content-center">
    
        <h4>Modulos</h4>
   
                        
                        <form id="formulario" class="formulario" method="POST" onsubmit="registrarPermisos(event)">
                        <?php if (isset($values->permisos)): ?>
                            <?php foreach ($values->permisos as $permiso): ?>
                               

                                
                                <div class="form-group list-inline-item ml-4 mr-4">
                                <input type="checkbox" class="custom-control-input" id="<?=$permiso->id?>" name="permisos[]" value="<?=$permiso->id?>" <?php echo isset($values->asignados->{$permiso->id}) ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="<?=$permiso->id?>"><span class="tb-lead">  <b><?php echo $permiso->permiso?></b> </span></label>
                                                
                                </div>
                               
                                               
                                
                                

                                
                                <!-- </div> -->
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <input type="hidden" name="id_usuario" value=" <?php echo $values->usuario->id; ?>">
                        <div class="d-flex text-align: center">
                        <button type="submit" class="btn btn-dark mr-1">Asignar</button>
                        <a href="?pagina=usuarios" class="btn btn-danger ml-1">Cancelar</a>
                        </div>
                        </form>
                        
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/permisos.js"></script> 