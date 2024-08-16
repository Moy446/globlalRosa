const carrito = document.querySelector('#carrito');
const contenedorCarrito = document.querySelector('#lista-carrito tbody');
const Producto = document.querySelector('#Producto');
const vaciarCarrito = document.querySelector('#vaciar-carrito');
let articulosCarrito =[];


cargarEventListener();
function cargarEventListener(){
    //Mostrar Productos de localStorage
    document.addEventListener('DOMContentLoaded',()=>{
        articulosCarrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carritoHTML();
    })
    try{
        Producto.addEventListener('click',agregarCurso);

    }catch(error){console.log(error)};

    carrito.addEventListener('click', eliminarProducto);

    vaciarCarrito.addEventListener('click',()=>{
        articulosCarrito =[];
        limpiarCarritoHTML()
    })

}

function agregarCurso(e){
    if(e.target.classList.contains('referencia')){
        const productoSeleccionado =e.target.parentElement.parentElement.parentElement;
        leerDatosProducto(productoSeleccionado);
    }
}

function eliminarProducto(e){
    console.log(e.target.classList)
    if(e.target.classList.contains('borrar-producto')){
        console.log();
        const idProducto =e.target.getAttribute('data-id');
        articulosCarrito = articulosCarrito.filter(product => product.id !== idProducto);
        carritoHTML();
    }
}

function leerDatosProducto(product){
    const infoProduct ={
        id: product.querySelector('.referencia').getAttribute('data-id'),
        img: product.querySelector('img').src.replace(/%20/g, " "),
        Nombre: product.querySelector('h2').textContent,
        Precio: product.querySelector('h3').textContent,
        Cantidad : product.querySelector('input').value
    }
    articulosCarrito = [...articulosCarrito, infoProduct];

    
    carritoHTML();
}

function carritoHTML(){

    limpiarCarritoHTML();

    articulosCarrito.forEach(carrito => {
        const row = document.createElement('tr');
        row.innerHTML=`
        <td><img src ="${carrito.img}" width ="100"></td>
        <td>${carrito.Nombre}</td>
        <td>${carrito.Precio}</td>
        <td>${carrito.Cantidad}</td>
        <td><a href="#" class="borrar-producto" data-id="${carrito.id}">X</a></td>
        `;

        //agrega html
        contenedorCarrito.appendChild(row);
    });

    guardarStorage();
}
function guardarStorage(){
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito))
}
function limpiarCarritoHTML(){
    while(contenedorCarrito.firstChild){
        contenedorCarrito.removeChild(contenedorCarrito.firstChild);
    }
    guardarStorage();
}

