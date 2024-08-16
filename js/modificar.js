const select = document.querySelector('#selectProduct')
const selectProveedor = document.querySelector('#selectProveedor')
const divMenuProducto = document.querySelector('#divInfoProducto');
const divMenuProvedor = document.querySelector('#divInfoProveedor');
let option=0;

seleccionarProducto();
function seleccionarProducto(){
    select.addEventListener('change',mostrarInfoProducto)

    selectProveedor.addEventListener('change', mostrarInfoProvedor);
}

function mostrarInfoProducto(){
    let id = select.options[select.selectedIndex].getAttribute('data-id');
    divMenuProducto.style.display = 'block';

    let xhr = new XMLHttpRequest();
    xhr.open('POST', './php/infoProducto.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Respuesta del servidor
            let respuestaJSON = JSON.parse(xhr.response);
            console.log(respuestaJSON)
            const Nombre = document.querySelector('#NombreProducto');
            const Descripccion = document.querySelector('#DescripccionProducto');
            const Cantidad = document.querySelector('#CantidadProducto');
            const Precio = document.querySelector('#PrecioProducto');
            const provedor = document.querySelector('#provedorModificar')
            const formulario = document.querySelector('#modificarProductoForm');
            
            Nombre.value = respuestaJSON.Nombre;
            Descripccion.value = respuestaJSON.Descripccion;
            Cantidad.value = respuestaJSON.Cantidad;
            Precio.value = respuestaJSON.Precio;
            for (let i = 0; i < provedor.options.length; i++) {
                if (provedor.options[i].innerHTML === respuestaJSON.Proveedor) {
                    // Establecer la opción como seleccionada
                    provedor.options[i].selected = true;
                    break; // Terminar el bucle una vez que se encuentre la opción
                }
            }
            formulario.action = './php/modificarProducto.php?id=' + encodeURIComponent(id);
        }
    };
    xhr.send('id=' + encodeURIComponent(id));
}

function mostrarInfoProvedor(){
    let id = selectProveedor.options[selectProveedor.selectedIndex].getAttribute('data-id');
    divMenuProvedor.style.display = 'block';

    let xhr = new XMLHttpRequest();
    xhr.open('POST', './php/infoProvedor.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Respuesta del servidor
            let respuestaJSON = JSON.parse(xhr.response);
            console.log(respuestaJSON)
            const Nombre = document.querySelector('#NombreProveedor');
            const TipoProducto = document.querySelector('#TiposProductos');
            const Empresa = document.querySelector('#EmpresaProveedor');
            const Status = document.querySelector('#provedorStatus');
            const formulario = document.querySelector('#modificarProveedorForm');

            Nombre.value = respuestaJSON.Nombre;
            TipoProducto.value = respuestaJSON.TipoProducto;
            Empresa.value = respuestaJSON.Empresa;
            for (let i = 0; i < Status.options.length; i++) {
                if (Status.options[i].innerHTML === respuestaJSON.Status) {
                    // Establecer la opción como seleccionada
                    Status.options[i].selected = true;
                    break; // Terminar el bucle una vez que se encuentre la opción
                }
            }
            formulario.action = './php/modificarProveedor.php?id=' + encodeURIComponent(id);
        }
    };
    xhr.send('id=' + encodeURIComponent(id));
}