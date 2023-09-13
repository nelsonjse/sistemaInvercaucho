<!-- <body class="nk-body bg-white npc-default pg-error"> -->

    <!-- <div class="nk-app-root">
        
        <div class="nk-main ">
            
            
            
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-xs mx-auto">
                        <div class="nk-block-content nk-error-ld">                            
                            <h3 class="nk-error-title">Perfil</h3>
                            
                            <p class="nk-error-text">Estamos trabajando en las nuevas actualizaciones para el sistema .</p>
                            <a href="?pagina=home" class="btn btn-sm btn-primary mt-2">Volver atras</a>
                            <a href="?pagina=home" class="btn btn-sm btn-info mt-2">Actualizar</a>
                        </div>
                    </div>
                </div>
             
            
           
        </div>
       
    </div> -->



<!-- </body> -->
<div class="container justify-content-center">
    <div class="card p-3 py-6">
        <div class="text-center"> 
		  
            <h3 class="mt-2"><?php echo  $_SESSION['usuario'] ?></h3>
            <?php if($values->usuario->id_rol == "1"){ ?> 
                <span class="mt-1 clearfix">Usuario</span>
            <?php } ?>
            <?php if($values->usuario->id_rol == "2"){ ?> 
                <span class="mt-1 clearfix">SuperUsuario</span>
            <?php } ?>
            <?php if($values->usuario->id_rol == "3"){ ?> 
                <span class="mt-1 clearfix">Vendedor</span>
            <?php } ?>
			
			<div class="row mt-3 mb-3">
			
			  <div class="col-md-3">
				<h5>Nombre</h5>
                <span><?=$values->usuario->nombres?></span>				
			  </div>
			  <div class="col-md-3">
			  <h5>Apellido</h5>
				<span><?=$values->usuario->apellidos?></span>
			  </div>
			  <div class="col-md-3">
			  <h5>Correo</h5>
              <span><?=$values->usuario->correo?></span>
			  </div>
              <div class="col-md-3">
			  <h5>Cedula</h5>
              <span><?=$values->usuario->cedula?></span>
			  </div>
                          
			
			</div>
			
			<hr class="line">
            <?php if($values->usuario->id_rol == "1"){ ?>                          
			<small class="mt-4">Click en Actualizar para actualizar Datos. Para mas informacion consultar con su proveedor</small>
            <div class="profile mt-5">
			 
			    <a href="?pagina=usuarios/mostrar&id=<?=$values->usuario->id?>" class="profile_button btn btn-primary px-3">Actualizar</a>
                <a href="?pagina=home" class="profile_button btn btn-dark px-3">Volver</a>

		    </div>
            <?php } ?> 
            <?php if($values->usuario->id_rol == "2"){ ?>                             
			<small class="mt-4">Click en Actualizar para actualizar Clave. Para mas informacion consultar con su proveedor</small>
            <div class="profile mt-5">
			 
			    <a href="?pagina=usuarios/mostrar&id=<?=$values->usuario->id?>" class="profile_button btn btn-primary px-3">Actualizar</a>
                <a href="?pagina=home" class="profile_button btn btn-dark px-3">Volver</a>

		    </div>
            <?php } ?> 
            <?php if($values->usuario->id_rol == "3"){ ?>                            
			<small class="mt-4">Para mas informacion sobre actualizar sus datos consultar con su proveedor</small>
            <div class="profile mt-5">
			 
			   
                <a href="?pagina=home" class="profile_button btn btn-dark px-3">Volver</a>

		    </div>
            <?php } ?> 
			  
			
            
        </div>
    </div>
</div>
<script>
    // let linea = document.getElementById("id_rol").value = "<?=$values->usuario->id_rol?>";
</script> 