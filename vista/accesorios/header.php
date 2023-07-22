<?php

// session_start();

// if(!isset($_SESSION['id'])){

//     redirect("login");
// }

?>
<div class="nk-header nk-header-fixed is-light">
    <div class="container-lg wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-header-brand">
                <a href="?pagina=home" class="logo-link">
                    <img class="logo-light logo-img " width="70" height="70" src="vista/assets/images/fondodark.png"  alt="logo">
                    <img class="logo-dark logo-img" width="70" height="70" src="vista/assets/images/logoinver.jpg" alt="logo-dark">
                </a>
                <a href="?pagina=home"><h2 class="navbar-brand" >Invercauchos C.A.</h2></a>
            </div><!-- .nk-header-brand -->
            
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                <li>
                <a href="?pagina=home">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                </svg>
                </a>
                </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-lg-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar sm" >                                        
                                        <span><?php echo  $_SESSION['id'] ?></span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">Usuario: <?php echo  $_SESSION['usuario'] ?></span>
                                        
                                    </div>
                                    <div class="user-action">
                                        <a class="btn btn-icon mr-n2" href="?pagina=usuarios/mostrar&id=<?=$_SESSION['id']?>"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="?pagina=usuarios/perfil"><em class="icon ni ni-user-alt"></em><span>Ver perfil</span></a></li>
                                    
                                 
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Modo oscuro</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="?pagina=logout"><em class="icon ni ni-signout"></em><span>Cerrar sesion</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                    <li class="d-lg-none">
                        <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                    </li>
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>