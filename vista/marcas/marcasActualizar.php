
<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Actualizar Marca</h3>
                <div class="nk-block-des text-soft">
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=marcas/actualizar&id=<?=$values->marca->id?>" method="POST" id="formulario">
        <div class="form-row">
            <div class="col-8  ">
                <label for="nombreMarcas" class="col-8 col-form-label">Nombre</label> 
                <input type="text" class="form-control" id="nombre" name="nombreMarcas" value="<?=$values->marca->nombreMarcas?>" placeholder="Ingresar nombre">
                <span id="responseNombre" style="color: red;"></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Actualizar</button>
                <a href="?pagina=marcas" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</a>
                <p id="mensaje" style="color: red;"></p>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="js/marca.js"></script>
