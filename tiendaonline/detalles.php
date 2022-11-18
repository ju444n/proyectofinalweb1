<?php

    require 'config/config.php';
    require 'config/database.php';
    $db = new Database();
    $con = $db->conectar();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if($id == '' || $token == '') {
        echo "ERROR!!";
        exit;
    } else {
        $token_tem = hash_hmac('sha1', $id, KEY_TOKEN);

        if($token == $token_tem){

            $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
            $sql->execute([$id]);

            if($sql->fetchColumn() > 0){
                
                $sql = $con->prepare("SELECT nombre, descripcion, precio, especificaciones FROM productos WHERE id=? AND activo=1 LIMIT 1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $especificaciones = $row['especificaciones'];
                $imagen_dir = 'img/productos/' . $id . '/';

                $ruta_img = $imagen_dir . 'producto.jpg';

                if(!file_exists($ruta_img)){
                    $ruta_img = 'img/productos/nofoto.jpg';
                }

                $images = array();
                $dir = dir($imagen_dir);

                while(($archivo = $dir->read()) != false){
                    if($archivo != 'producto.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'png'))){
                        $images[] = $imagen_dir . $archivo;     
                    }
                }
                $dir->close();
        
            } else {
                echo "ERROR!!";
                exit;
            }
        } else {
            echo "ERROR!!";
            exit;
        }
    }
    
    $sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="icon" href="img/icon/iconooficial.ico">
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

                <a href="check.php" class="btn btn-light">
                    <i class="bi bi-cart-fill"></i> Mi Carrito <span id="num_cart" class="badge bg-dark"><?php echo $num_cart; ?></span>
                </a>
            </div>
        </div>
    </div>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md"> 
                    <div class="d-flex align-items-center">
                        <img src="<?php echo $ruta_img; ?>" class="d-block w-100">
                    </div>
                </div>  
                <div class="col-md-6 col-md">                          
                    <h3 class="display-6 fw-bold"><?php echo $nombre ?></h3>
                    <br>
                    <h3 class="text-danger fs-2 fw-normal"><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></h3>
                    <br>
                    <h4 class="card-title fw-bold lh-1">Especificaciones</h4>
                    <p class="lead"><?php echo $especificaciones ?></p>
                    <br><br>
                    <div class="d-grid gap-3 col-7 mx-auto">
                        <a href="comprar.php" class="btn btn-dark btn-lg">Comprar Ahora</a> 
                        <a href="check.php" class="btn btn-dark btn-lg" type="button" onclick="addproducto(<?php echo $id; ?>, '<?php echo $token_tem; ?>')"><i class="bi bi-cart-plus-fill"></i> Agregar al Carrito </a> 
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md">
                    <h3 class="fw-bold">Descripcion</h3> 
                    <p class="lead"><?php echo $descripcion ?></p>
                </div>
            </div>
        </div>
        <hr>
    </main>

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
                        <li><a class="link-secondary" href="index.php">Home</a></li>
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

        function addproducto(id, token){
            let url='carrito.php'
            let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        let elemento = document.getElementById("num_cart")
                        elemento.innerHTML = data.numero
                    }
                })    
        }
        
    </script>

</body>
</html