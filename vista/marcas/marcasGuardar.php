<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Registrar Marca</h3>
                <div class="nk-block-des text-soft">
                    <p>Registra nueva marca</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=marcas/guardar" id="formulario" method="POST" >
        <div class="form-row">
            <div class="col-8  ">
                <label for="nombreMarcas" class="col-8 col-form-label">Nombre</label>
                <input type="text" id="nombre" class="form-control" name="nombreMarcas" placeholder="Ingresar nombre">
                <span id="responseNombre" class="text-danger"></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Agregar</button>
                <a href="?pagina=marcas" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a Lista</a>
                <p id="mensaje" class="text-danger"></p>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="js/marca.js"></script>