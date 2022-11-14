<?php

    require 'config/database.php';
    require 'config/config.php';
    $db = new Database();
    $con = $db->conectar();

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

    $lista_carrito = array();

    if($productos != null){
        foreach($productos as $clave => $cantidad){
            
            $sql = $con->prepare("SELECT id, nombre, precio, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    
        }
    }

    //session_destroy();
    //print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <strong>Tienda Online</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="contacto.php" class="nav-link">Contacto</a>
                    </li>
                </ul>
                <a href="login.php" class="btn btn-light">
                    <i class="bi bi-person-circle"></i> Iniciar Sesion 
                </a>
                
                <a href="#" class="btn btn-dark">
                    <i class="bi bi-cart-fill"></i> Mi Carrito 
                </a>
            </div>
        </div>
    </div>
    </header>

    <main>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="h5">Producto</th>
                            <th class="h5">Precio</th>
                            <th class="h5">Cantidad</th>
                            <th class="h5">Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><h3>Lista Vacía</h3></td></tr>';

                        } else {

                            $total = 0;
                            foreach($lista_carrito as $productos){
                                $_id = $productos['id'];
                                $nombre = $productos['nombre'];
                                $precio = $productos['precio'];
                                $cantidad = $productos['cantidad'];
                                $subtotal = $cantidad * $precio;
                                $total += $subtotal;
                            ?>
                        
                            <tr>
                                <td><?php echo $nombre; ?> </td>
                                <td><?php echo MONEDA . number_format($precio,2, '.', ',') ?> </td>
                                <td> 
                                    <input type="number" min="1" max="20" step="1" value="<?php echo $cantidad ?>" size="3" id="cantidad_<?php echo $_id; ?>" onchange="actualizarcantidad(this.value, <?php echo $_id ?>)"> 
                                </td>
                                <td>
                                    <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2, '.', ',') ?></div>
                                </td>
                                <td><a href="#" id="eliminar" class="btn btn-dark" data-bs-id="<?php $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminamodal"><i class="bi bi-trash-fill"></i></a></td>
                            </tr>
                            
                        <?php } ?>

                        <tr >
                            <td><h5>Precio Total </h5></td>
                            <td colspan="2"></td>
                            <td coldspan="2">
                                <p class="h3" id="total"><?php echo MONEDA . number_format($total,2, '.', ','); ?></p>
                            </td>
                        </tr>

                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-8 d-grid gap-2">
                    <a href="comprar.php" class="btn btn-dark btn-lg">Realizar Compra</a>                
                </div>
            </div>
        </div>
    </main>

    <div class="modal" id="eliminamodal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminamodalLabel">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="h5">¿Desea Eliminar el Producto de la Lista?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <footer class="container py-5">
        <div class="row">
                <div class="col-6 col-md">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1405347976984!2d-75.56407428516421!3d6.245203928068408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442859d833cfa3%3A0xa3fca5c91547777f!2sCESDE!5e0!3m2!1ses-419!2sco!4v1668094606594!5m2!1ses-419!2sco" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="col-6 col-md">
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-secondary" href="#">Home</a></li>
                        <li><a class="link-secondary" href="contacto.php">Contacto</a></li>
                        <li><a class="link-secondary" href="login.php">Mi cuenta</a></li> 
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-secondary" href="#">Home</a></li>
                        <li><a class="link-secondary" href="contacto.php">Contacto</a></li>
                        <li><a class="link-secondary" href="login.php">Mi cuenta</a></li> 
                    </ul>
                </div>
                <hr>
                <br>
                <p class="text-center text-muted">© Juan Manuel y Kevin INC </p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>

        let eliminamodal = document.getElementById('eliminamodal')
                eliminamodal.addEventListener('show.bs.modal', function(event){
                    let button = event.relatedTarget
                    let id = button.getAttribute('data-bs-id')
                    let buttonElimina = eliminamodal.querySelector('.modal-footer #btn-elimina')
                    buttonElimina.value = id

                })

        function actualizarcantidad($cantidad, id){
            let url='actualizarcarrito.php'
            let formData = new FormData()
            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub
                        
                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')

                        for(let i = 0; i < list.length; i++){
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }
                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)
                        document.getElementById('total').innerHTML = '<?php MONEDA; ?>' + total
                        
                    }
                })    
        }

        function eliminar(){

            let botonElimina = document.getElementById('btn-elimina')
            let id = botonElimina.value
            let url='actualizarcarrito.php'
            let formData = new FormData()
            formData.append('action', 'eliminar')
            formData.append('id', id)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        location.reload()
                    }
                })    
            }


    </script>

</body>
</html