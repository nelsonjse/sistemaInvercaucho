    <div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
        <div class="nk-sidebar-menu" data-simplebar>
            <ul class="nk-menu">
                <li class="nk-menu-heading">  
                <p><small> Tipo: Vendedor</small> <br/>        
                <small> Bienvenido <?php echo  $_SESSION['usuario'] ?> </small> </p>
                    <h6 class="overline-title text-primary-alt">Sistema de Inventario </h6>
                </li><!-- TITULO DEL MENU -->
              
                
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
                        <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                        <span class="nk-menu-text">Gestionar Despacho</span>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="?pagina=despachos/crear" ><span class="nk-menu-text">Registrar Despacho</span></a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="?pagina=despachos" ><span class="nk-menu-text">Gestionar Orden de Despacho</span></a>
                        </li>
                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

                <li class="nk-menu-item has-sub">
                    <a href="#" class="nk-menu-link nk-menu-toggle">
                        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                        <small>Ayudas</small>
                    </a>
                    <ul class="nk-menu-sub">
                        <li class="nk-menu-item">
                            <a href="?pagina=ayuda"><span class="nk-menu-text ">Ayuda del sistema</span></a>
                        </li>           

                    </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->

            </ul><!-- .nk-menu -->
        </div><!-- .nk-sidebar-menu -->
        <div class="nk-aside-close">
            <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
        </div><!-- .nk-aside-close -->
    </div><!-- .nk-aside -->