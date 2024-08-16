const datosStorage = JSON.parse(localStorage.getItem('carrito'));
const TableProductos = document.querySelector('#tablaPagar');
const txtTotal = document.querySelector('#txtTotal');
const pagar = document.querySelector('#btnPagar');
let totalCompra = 0;
let articulosPagar=[];

cargarEventListener()
function cargarEventListener(){
    pagar.addEventListener('click', generarPDF);
}

imprimirDatos();
function imprimirDatos(){
    datosStorage.forEach(carrito => {
        const row = document.createElement('tr');
        const cantidad = parseFloat(carrito.Cantidad);
        const precio = parseFloat(carrito.Precio);
        total = cantidad * precio;
        row.innerHTML=`
        <td><img src ="${carrito.img}" width ="100"></td>
        <td>${carrito.Nombre}</td>
        <td>${carrito.Precio}</td>
        <td>${carrito.Cantidad}</td>
        <td>${total}</td>
        `;
        totalCompra += total;

        TableProductos.appendChild(row);
    });
    txtTotal.textContent = txtTotal.textContent +parseFloat(totalCompra);

}

function generarPDF(){
    const carrito = JSON.stringify({datos: datosStorage});
    fetch('./pdf.php',{
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: carrito
    }).then(response => response.text()).then(data =>{
        generarCompra();
    }).catch (error=> console.error(error));
}

function generarCompra(){
    let infoCompra = [];
    datosStorage.forEach(precios => {
        const infoTotalPagar ={
            Precio: precios.Precio,
            Cantidad: precios.Cantidad 
        };
        infoCompra = [...infoCompra, infoTotalPagar];
    });
    let detallesPrecio = JSON.stringify({datos: infoCompra});
    fetch('./php/generarCompra.php',{
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: detallesPrecio
    }).then(response => response.text()).then(data => {
        console.log(data);
        procesoPago();
    }).catch(error => console.error(error))
}

function procesoPago(){
    console.log('pago');
    datosStorage.forEach(carrito => {
        const infoPagar ={
            id: carrito.id,
            Cantidad: carrito.Cantidad,
            Precio: carrito.Precio
        };
        articulosPagar = [...articulosPagar,infoPagar];
    });
    generarTicket(articulosPagar);
}
function generarTicket(articulos){
    console.log(JSON.stringify(articulos));
    let articulosFinales = [];
    articulosFinales = JSON.stringify({datos: articulos});
    fetch('./php/crearTicket.php',{
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: articulosFinales
    }).then(response => response.text()).then(data =>{
        console.log(data);
        if(data ==='Se realizo la compra correctamente'){
            localStorage.removeItem('carrito');
            generarCorreo();    
            alert(data+", se le enviara un correo con su recibo de compra");
            window.location='./index.php'
        }
    }).catch (error=> console.error(error));
}

function generarCorreo(){
    fetch ('./php/generarCorreo.php',{
        method: 'POST',
        headers: {'Content-type': 'application/x-www-form-urlencoded'}
    }).then(response => response.text()).then(data => {
        console.log(data);
        
    }).catch(error => console.error(error));
}