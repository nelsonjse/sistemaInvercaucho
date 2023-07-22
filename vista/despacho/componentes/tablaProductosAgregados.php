<div class="card card-bordered">
    <div class="card-inner p-0">
        <div id="contenedor_items" class="nk-tb-list nk-tb-ulist">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col"><span class="sub-text">ID</span></div>
                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Producto</span></div>
                <div class="nk-tb-col nk-tb-col-tools"></div>
            </div>
        </div>
    </div>
</div>
<script>

    window.addEventListener("storage", () => {
        const contenedor_items = document.getElementById("contenedor_items");
        let productos = getStorage("orden").productos;
        
        contenedor_items.innerHTML="";
        productos&&productos.map(producto=>{
        contenedor_items.innerHTML = contenedor_items.innerHTML + (`
            <div id="item_${producto.id_pro}" class="nk-tb-item">
                <div class="nk-tb-col">
                    <div class="user-card">
                        <div class="">
                            <span>${producto.id_pro}</span>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <div class="user-card">
                        <div class="">
                            <span>${producto.nombreProducto}, ${producto.nombreMarcas}, ${producto.descripcion}</span>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-1">
                        <li>
                            <button onclick='removerProducto2(${JSON.stringify(producto)})' class="dropdown-toggle btn btn-icon btn-trigger">
                                <em class="icon ni ni-minus"></em>
                            </button>
                        </li>
                        <li>
                            <div>
                                <input id="${producto.id_pro}" data-type="numbers" onkeyup="setCantidadProducto(${producto.id_pro})" style="min-width: 60px;" class="form-control contador_${producto.id_pro}" value="${producto.agregado}" />
                            </div>
                        </li>
                        <li>
                            <button onclick='agregarProducto2(${JSON.stringify(producto)})' class="dropdown-toggle btn btn-icon btn-trigger">
                                <em class="icon ni ni-plus"></em>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            `);
        });
    });

const validate=()=>{
    const numbers = document.querySelectorAll('[data-type="numbers"]');
    [...numbers].map(item=>{ 
        item.addEventListener("keydown", (e)=>{ 
            !["1","2","3","4","5","6","7","8","9","0","Backspace"].includes(e.key)&&e.preventDefault();
        });
    });
}

validate();
</script>
