    <div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-heading">               
                 
                <small> Bienvenido <?php echo  $_SESSION['usuario'] ?> </small> </p>
                    
                    <h6 class="overline-title text-primary-alt">Sistema de Inventario y Facturacion </h6>
                </li><!-- TITULO DEL MENU -->
              
                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-signin"></em></span>
                        <span class="nk-menu-text">Gestionar Productos</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Gestionar Linea de Productos</span></a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="?pagina=lineas/crear"><span class="nk-menu-text">Registrar Linea de Producto</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="?pagina=lineas"><span class="nk-menu-text">Listar Lineas de Productos</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Gestionar Marcas</span></a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="?pagina=marcas/crear"><span class="nk-menu-text">Registrar Marca</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="?pagina=marcas"><span class="nk-menu-text">Listar Marcas</span></a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Gestionar Tipo de Vehiculo</span></a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="?pagina=vehiculos/crear"><span class="nk-menu-text">Registrar Tipo de Vehiculo</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="?pagina=vehiculos"><span class="nk-menu-text">Listar Tipos de Vehiculos</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=productos/crear"><span class="nk-menu-text ">Registrar Producto</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=productos"><span class="nk-menu-text">Listar de Productos</span></a>
                        </li>

                       
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
                        <span class="nk-menu-text">Gestionar Inventario</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="?pagina=inventarios/crear"><span class="nk-menu-text">Registrar Inventario</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=inventarios"><span class="nk-menu-text">Listar Inventario</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                        <span class="nk-menu-text">Gestionar Proveedor</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="?pagina=proveedores/crear"><span class="nk-menu-text">Registrar Proveedor</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=proveedores"><span class="nk-menu-text">Listar Proveedores</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                        <span class="nk-menu-text">Gestionar Clientess</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="?pagina=clientes/crear"><span class="nk-menu-text">Registrar Cliente</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=clientes"><span class="nk-menu-text">Listar Cliente</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                        <span class="nk-menu-text">Gestionar Factura</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="?pagina=despachos/crear" ><span class="nk-menu-text">Registrar Orden De Factura</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=despachos" ><span class="nk-menu-text">Gestionar Factura</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                        <small>Gestionar Mantenimiento</small>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Usuarios</span></a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="?pagina=usuarios/crear"><span class="nk-menu-text">Nuevo Usuario</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="?pagina=usuarios"><span class="nk-menu-text">Lista de Usuario</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=bitacora"><span class="nk-menu-text ">Bitacora</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=ayuda"><span class="nk-menu-text ">Ayuda del sistema</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=respaldo"><span class="nk-menu-text">Gestionar Reportes</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=backup"><span class="nk-menu-text">Respaldar base de datos</span></a>
                        </li>

                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
        <div class="nk-aside-close">
            <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
        </div><!-- .nk-aside-close -->
    </div><!-- .nk-aside -->