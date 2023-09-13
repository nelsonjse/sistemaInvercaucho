<div class="nk-content-wrap">
    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Registrar Linea de Producto</h3>
                <div class="nk-block-des text-soft">
                    <p>Registra nueva linea de producto</p>
                </div>
            </div><!-- .nk-block-head-content -->

        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <form action="?pagina=lineas/guardar" method="POST" id="formulario">
        <div class="form-row">
            <div class="col-8  ">
                <label for="nombreProducto" class="col-8 col-form-label">Nombre</label>
                <input type="text"  class="form-control" id="nombre" name="nombreProducto" placeholder="Ingresar nombre">
                <span id="responseNombre" style="color: red;"></span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary" name="accion" value="agregar">Agregar</button>
                <a href="?pagina=lineas" type="button" class="btn btn-danger" name="accion" value="Cancelar">Volver a la Lista</a>
                <p id="mensaje" style="color: red;"></p>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="js/linea.js"></script>