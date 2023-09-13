<?php if (isset($values->productos[0])) : ?>
    <div class="card card-bordered">
        <div class="card-inner p-0">
            <div class="nk-tb-list nk-tb-ulist">
                <div class="nk-tb-item nk-tb-head">
                    <div class="nk-tb-col"><span class="sub-text">ID</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Producto:</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Disponible:</span></div>
                    <div class="nk-tb-col tb-col-mb"><span class="sub-text">Cantidad:</span></div>
                    
                </div>
                <?php foreach ($values->productos as $producto) : ?>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $producto->id_pro ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $producto->nombreProducto ?> <?= $producto->nombreMarcas ?> <?= $producto->descripcion ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col tb-col-mb">
                            <div class="user-card">
                                <div class="">
                                    <span><?= $producto->cantidad ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li>
                                    <button onclick='removerProducto2(<?=json_encode($producto)?>)' class="dropdown-toggle btn btn-icon btn-trigger">
                                        <em class="icon ni ni-minus"></em>
                                    </button>
                                </li>
                                <li>
                                    <div class="contador_<?=$producto->id_pro?>"></div>
                                </li>
                                <li>
                                    <button onclick='agregarProducto2(<?=json_encode($producto)?>)' class="dropdown-toggle btn btn-icon btn-trigger">
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