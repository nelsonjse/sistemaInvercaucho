<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Clientes</h3>
                <div class="nk-block-des text-soft">
                    <p>Tienes <?=count($values->clientes) ?> clientes. </p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                                <div class="drodown">
                                    <a href="?pagina=clientes/crear" class=" btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a>
                                   
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
                        <th>Direccion</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                <?php if (isset($values->clientes[0])): ?>
            <?php foreach ($values->clientes as $cliente): ?>
                    <tr>
                        <td class="align-middle"><?= $cliente->nombre?></td>
                        <td class="align-middle"><?= $cliente->rif?></td>
                        <td class="align-middle"><?= $cliente->direccion?></td>
                        <td class="align-middle">
                            <ul class="nk-tb-actions gx-1">
                                <ul class="link-list-opt no-bdr">
                                    <li><a href="?pagina=clientes/mostrar&id=<?=$cliente->id_cliente?>"><em class="icon ni ni-activity-round text-info"></em><span class="text-info">Actualizar</span></a></li>
                                    <li><a href="?pagina=clientes/eliminar&id=<?=$cliente->id_cliente?>"><em class="icon ni ni-trash text-danger"></em><span class="text-danger">Eliminar </span></a></li>
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
    <a href="?pagina=reporteCliente" type="button" class="btn btn-info" name="accion" value="reporte">Reporte</a>
    </div>   
        </div>
    </div>
    <?php if (!isset($values->clientes[0])): ?>
        <div class="nk-tb-item text-center w-100">
            No hay proveedores para mostrar
        </div>
    <?php endif; ?>
                        
               
                        