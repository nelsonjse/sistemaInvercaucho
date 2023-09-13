<?php if (isset($values->clientes[0])) : ?>
    <div class="card card-bordered">
        <div class="card-inner p-0">
            <div class="nk-tb-list nk-tb-ulist">
                <div class="nk-tb-item nk-tb-head">
                    <div class="nk-tb-col"><span class="sub-text">ID</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Nombre:</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Rif:</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Direccion:</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text"></span></div>
                    
                </div>
                <?php foreach ($values->clientes as $cliente) : ?>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $cliente->id ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $cliente->nombre ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $cliente->rif ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $cliente->direccion ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li>
                                    <button onclick='agregarCliente(<?=json_encode($cliente)?>)' data-dismiss="modal" aria-label="Close" class="dropdown-toggle btn btn-icon btn-trigger">
                                        <em class="icon ni ni-plus"></em>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>