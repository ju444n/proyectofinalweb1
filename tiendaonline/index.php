<?php

    require 'config/database.php';
    require 'config/config.php';
    $db = new Database();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    
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
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Tienda Online</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Inicio</a>
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
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">                
                    <a href="#">
                        <img src="img/banner/banner.jpg" width="100%" height="100%">
                    </a>                    
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="img/banner/banner1.jpg" width="100%" height="100%">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="img/banner/banner2.jpg" width="100%" height="100%">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img src="img/banner/banner4.jpg" width="100%" height="100%">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    <br>
    <h3 class="text-center">Productos</h3>
        <div class="container text-center">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php 
                            $id = $row['id'];
                            $imagen = "img/productos/" . $id . "/producto.jpg";
                            if(!file_exists($imagen)){
                                $imagen = "img/productos/nofoto.jpg";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                <p class="card-text fw-bold text-danger fs-4">$ <?php echo $row['precio']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'] , KEY_TOKEN); ?>" class="btn btn-dark">Detalles</a>
                                    </div>
                                    <button class="btn btn-dark" type="button" onclick="addproducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'] , KEY_TOKEN); ?>')"><i class="bi bi-cart-plus-fill"></i></button> 
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div> 
        </div>  

    </main>
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