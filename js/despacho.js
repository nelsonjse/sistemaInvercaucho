


const setCantidadProducto =(id)=>{
    let orden = getStorage("orden");
    let temp = orden.productos;
    
    const input = document.getElementById(id);
    const finded = temp.find(item => item.id_pro == id);
    const index = temp.indexOf(finded);
    const item_producto = document.getElementById(`item_${id}`);


    if(Number(input.value)>Number(finded.cantidad)){
        temp[index] = { ...finded, agregado: Number(finded.cantidad) };
        setStorage("orden", {...orden, productos: temp});
        input.value = Number(finded.cantidad);
        return;
    }

    if(Number(input.value)==0){
        temp.splice(index, 1);
        item_producto.remove();
        setStorage("orden", {...orden, productos: temp});

        // Swal.fire({    
        //     icon: 'success',
        //     title: 'Se ha removido el producto de la orden',
        //     showConfirmButton: false,            
        //     timer: 1500  
        //   });           
        
        alert(`Se ha removido el producto "${finded.nombreProducto}" de la orden!!!`);
        temp.splice(index, 1);
        item_producto.remove();
        return;
    }
    
    temp[index] = { ...finded, agregado: Number(input.value) };
    setStorage("orden", {...orden, productos: temp});
    
}
  window.addEventListener("actualizar_datos_cliente", (e) => {
    console.log("hola",e.detail)
    const dataClient = document.getElementById("contenedor_datos_cliente");
        dataClient.innerHTML = `
        <h5><em class="title"></em><span>Datos del cliente:</span></h5>
        <li><em class="icon ni ni-user"></em><span>cliente :${e.detail.nombre}</span></li>
        <li><em class="icon ni ni-eye"></em><span>rif :${e.detail.rif}</span></li>
        <li><em class="icon ni ni-map"></em><span>direccion : ${e.detail.direccion}</span></li>
        `;
  
    });
const agregarCliente = (client) => {
    const data = {
        id : client.id,
        nombre : client.nombre,
        rif: client.rif,
        direccion: client.direccion,
    }
    setStorage("cliente",data);

    window.dispatchEvent(new CustomEvent('actualizar_datos_cliente',{"detail":data}));


}

const agregarProducto2 = (prod) => {

    let orden = getStorage("orden");
    let temp = orden.productos;

    const contador_producto = document.getElementsByClassName(`contador_${prod.id_pro}`);
    const finded = temp.find(item => item.id_pro == prod.id_pro);
    const index = temp.indexOf(finded);

    if (!finded) {

        if (0 === Number(prod.cantidad)) {
            alert(`Se ha agotado ${prod.nombreProducto} en el inventario!`);
            return;
        }

        temp.push({...prod, disponible: Number(prod.cantidad), agregado: 1 });

        for (let i = 0; i < contador_producto.length; i++) {
            contador_producto[i].innerHTML = "1";
            contador_producto[i].value = "1";
        }

    } else {

        if (0 === Number(finded.disponible)) {
            alert(`Se ha agotado ${finded.nombreProducto} en el inventario!`);
            return;
        }
        
        if ((Number(finded.agregado)+1) > Number(finded.cantidad)) {
            Swal.fire({    
                icon: 'info',
                title: 'No hay mas disponibilidad!',
                showConfirmButton: false,            
                timer: 1500  
              });  

            alert(`Solo hay ${finded.disponible} ${finded.nombreProducto} en el inventario!`);
        
        } else {
            temp[index] = { ...finded, agregado: ((finded?.agregado || 0) + 1) };

            console.log("Encontrado, sumando 1");
            for (let i = 0; i < contador_producto.length; i++) {
                contador_producto[i].innerHTML = String((finded?.agregado || 0) + 1);
                contador_producto[i].value = String((finded?.agregado || 0) + 1);
            }
        }
    }

    setStorage("orden", {...orden, productos: temp});
    window.dispatchEvent(new Event('actualizar_botones_orden'));

}

const removerProducto2 = (prod) => {
    let orden = getStorage("orden");
    
    let temp = orden.productos;

    const contador_producto = document.getElementsByClassName(`contador_${prod.id_pro}`);
    const item_producto = document.getElementById(`item_${prod.id_pro}`);

    const finded = temp.find(item => item.id_pro == prod.id_pro);
    const index = temp.indexOf(finded);

    if (finded){ 
        if (Number(finded.agregado) == 1) {

            // Swal.fire({    
            //     icon: 'success',
            //     title: 'Se ha removido el producto de la orden',
            //     showConfirmButton: false,                
            //     timer: 1500                
            //   });
            // setTimeout( function() {
            //     temp.splice(index, 1);
            //     item_producto.remove();
            //   }, 1500);

            alert(`Se ha removido el producto "${finded.nombreProducto}" de la orden!!!!`);
            temp.splice(index, 1);
            item_producto.remove();
            
            for (let i = 0; i < contador_producto.length; i++) {
                contador_producto[i].innerHTML = "0";
                contador_producto[i].value = 0
            }

        } else {
            temp[index] = { ...finded, agregado: (finded.agregado - 1) };
        }

        for (let i = 0; i < contador_producto.length; i++) {
            contador_producto[i].innerHTML = ((finded?.agregado || 0) - 1);
            contador_producto[i].value = ((finded?.agregado || 0) - 1);
        }

    }

    setStorage("orden", {...orden, productos: temp});
    if (temp.length < 1) window.location.reload();
}

const agregarProducto_bd = async (id_orden) => {

    let orden = getStorage("orden");
    let client = getStorage("cliente");
    
    if (orden.length < 1) {
        alert("Agrege almenos un producto a la orden!!!");
        return;
    }
console.log("holaaaaa",client.id);
    const { code, errors, message } = await fetch("?pagina=despachos/guardar", {
        method: "POST",
        body: JSON.stringify({...orden, clientId: client.id}),
    })
    .then(async res => res.json()).catch(err => err);

    if (code != 200) {
        alert(message, "Archivos no subidos: " + errors);
        return;
    }

    setStorage("orden", {...orden, productos: []});
    
    Swal.fire({
        icon: 'success',
        title: 'Despacho Realizado',
        showConfirmButton: false,
        timer: 1500
    });
    setTimeout( function() {
        window.location.href ='?pagina=despachos';
    },1500);
   
}

const elements = document.getElementsByClassName("cantidad");
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('keyup', async (e) => {

        if (e.target.value == "0") {
            const res = confirm("Quieres eliminar este producto?");
            if (res) {
                deleteProduct(e.target.dataset.idx);
                return;
            }
        }

        const res = await fetch("?pagina=despachos/actualizarCantidad&id=" + e.target.dataset.idx + "&cantidad=" + Number(e.target.value)).then(res => res.json());

        console.log(e.target.value);

        if (res.code != 200) {
            alert(res.message);
            return;
        }


    });

    elements[i].addEventListener('keydown', (e) => {
        var pattern = /^\d+\.?\d*$/;
        if (!pattern.test(e.key) && e.key == "backspace") { e.preventDefault(); }
    });
}
