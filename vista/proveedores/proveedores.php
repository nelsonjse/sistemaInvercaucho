
<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Proveedores</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?=count($values->proveedores) ?> proveedores.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown">
                                    <!-- <a href="?pagina=proveedores/crear" class=" btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a> -->
                                   
<a id="openModalGuardar" type="button" class="btn btn-info text-white" name="accion" value="agregar"><em class="icon ni ni-plus"></em></a>
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
        <h2>Lista de Datos</h2>
        <div class="table-responsive">
       
            <table class="table table-bordered table-no-horizontal-border">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Rif</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($values->proveedores[0])): ?>
            <?php foreach ($values->proveedores as $proveedor): ?>
                    <tr>
                        <td class="align-middle"><?= $proveedor->nombres?></td>
                        <td class="align-middle"><?= $proveedor->rif?></td>
                        <td class="align-middle"><?= $proveedor->telefono?></td>
                        <td class="align-middle"><?= $proveedor->direccion?></td>
                        <td class="align-middle">
                            <ul class="nk-tb-actions gx-1">
                                <ul class="link-list-opt no-bdr">
                                    <!-- <li><a href="?pagina=proveedores/mostrar&id=<?=$proveedor->id?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar</span></a></li> -->
                                    <li>
                                    <a class="link-actualizar" data-toggle="modal" data-target="#modal-actualizar" data-proveedor-id="<?=$proveedor->id?>">
                                        <em class="icon ni ni-activity-round text-info"></em>
                                        <span class="text-info">Actualizar</span>
                                    </a>

                                    </li>
                                    <li><a href="?pagina=proveedores/eliminar&id=<?=$proveedor->id?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
                                </ul>                                    
                            </ul>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <div>

                </div>
            </table>
            <div class="text-align: center">
    <a href="?pagina=reporteProveedor" type="button" class="btn btn-info" name="accion" value="reporte">Reporte</a>
    </div>   
        </div>
    </div>
    <?php if (!isset($values->proveedores[0])): ?>
        <div class="nk-tb-item text-center w-100">
            No hay proveedores para mostrar
        </div>
    <?php endif; ?>



<a id="openModalGuardar" type="button" class="btn btn-info text-white" name="accion" value="agregar">Agregar</a>


    <!-- Modal -->
    <div id="registrar" class="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                <!-- Aquí coloca tu formulario -->
                
                    <div class="nk-block-head">
                        <div class="nk-block-between">
                        <div class="modal-header"  style="border: none;">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title page-title">Registrar Proveedor</h2>
                            </div>
                        </div>
                
            </div>
            <div class="modal-body">
            <form action="?pagina=proveedores/guardar" method="POST" id="formulario" class="formulario"">
                <div class="form-row">
                    <div class="col-6">
                        <label for="nombre" class="col-6 col-form-label">Nombre</label>
                        <input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre">
                        <p class="text-danger" id="responseNombre"></p>
                    </div>            
                    <div class="col-6"> 
                        <label for="rif" class="col-6 col-form-label">Rif</label>
                        <input type="text"  class="form-control" id="rif" name="rif" placeholder="Ingresar Rif">
                        <p class="text-danger" id="responseRif"></p>
                    </div>
                    <div class="col-6">
                        <label for="telefono" class="col-6 col-form-label">Telefono</label>
                        <input type="text"  class="form-control" id="telefono" name="telefono" placeholder="Ingresar Telefono">
                        <p class="text-danger" id="responseTelefono"></p>
                    </div>
                    <div class="col-6">
                        <label for="direccion" class="col-6 col-form-label">Direccion</label>
                        <input type="text"  class="form-control" id="direccion" name="direccion" placeholder="Ingresar Direccion">
                        <p class="text-danger" id="responseDireccion"></p>
                    </div>

                </div>
            
                <br>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" name="accion" value="agregar">Agregar</button>
                        <button type="button" id="closeModalBtn" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</button>
                        <p class="text-danger" id="mensaje"></p>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

        <script type="text/javascript" src="js/proveedores.js"></script> 
    </div>
    </div>                  

<!-- <a id="openModalActualizar" type="button" class="btn btn-info text-white" name="accion" value="actualizar">Actualizar</a> -->



<div id="modal-actualizar" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
            
        <div class="modal-content">           
            
            <div class="nk-block-head">
                <div class="nk-block-between">
                    <div class="modal-header"  style="border: none;">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Actualizar Proveedor</h2>
                        </div>
                    </div>   
                </div>         
            </div>

            <div class="modal-body">
                <form action="?pagina=proveedores/actualizar" method="POST" id="formulario">
                    <input type="hidden" name="proveedor_id" id="proveedor_id" value="">
                    <div class="form-row">
                        <div class="col-6 ">
                            <label for="nombre" class="col-8 col-form-label">Nombre</label>
                            <input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre">
                            <p class="text-danger" id="responseNombre"></p>
                        </div>            
                        <div class="col-6">
                            <label for="rif" class="col-6 col-form-label">Rif</label>
                            <input type="text"  class="form-control" id="rif" name="rif" placeholder="Ingresar Rif">
                            <p class="text-danger" id="responseRif"></p>
                        </div>
                        <div class="col-6">
                            <label for="telefono" class="col-6 col-form-label">Telefono</label>
                            <input type="text"  class="form-control" id="telefono" name="telefono" placeholder="Ingresar telefono">
                            <p class="text-danger" id="responseTelefono"></p>
                        </div>
                        <div class="col-6">
                            <label for="direccion" class="col-6 col-form-label">Direccion</label>
                            <input type="text"  class="form-control" id="direccion" name="direccion" placeholder="Ingresar direccion">
                            <p class="text-danger" id="responseDireccion"></p>
                        </div>

                    </div>
            </div>
            <div class="modal-footer" style="border: none;>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" name="accion" value="actualizar">Actualizar</button>
                                <button type="button" id="closeModalBtn2" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</button>
                                <p class="text-danger" id="mensaje"></p>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- <script type="text/javascript" src="js/proveedoresActualizar.js"></script>  -->
    
  

    <script src="js/modalProveedor.js"></script>                        