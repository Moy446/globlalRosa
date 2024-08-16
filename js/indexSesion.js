function iniciarSesion(usuario){
document.addEventListener('DOMContentLoaded',()=>{

    const nav = document.querySelector('#navProductos');
        
        nav.innerHTML = `
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://localhost/GlobalWebI/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">${usuario}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/GlobalWebI/php/logout.php">Cerrar Sesión</a>
            </li>
        `;
    })
}


function iniciarAdmin(usuario){
document.addEventListener('DOMContentLoaded',()=>{

    const nav = document.querySelector('#navProductos');
        
        nav.innerHTML = `
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://localhost/GlobalWebI/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./agregar.php">Agregar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./modificar.php">Modificar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./eliminar.php">Eliminar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./bitacora.php">Bitacora</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">${usuario}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/GlobalWebI/php/logout.php">Cerrar Sesión</a>
            </li>
        `;
    })
}