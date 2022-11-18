<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="icon" href="img/icon/iconooficial.ico">
    <link rel="stylesheet" href="css/stylelogin.scss">
</head>
<body>
<form action="login.php" method="post">
    <div class="container">
            <div class="login-left">
                <div class="login-header">
                    <h1>Bienvenido a Tienda Online</h1>
                    <h3>Por favor inicie sesión para usar la plataforma</h3>
                </div>
                <form action="login-form">
                    <div class="login-from-content">
                        <div class="from-item">
                            <label for="email">Ingrese Usuario</label>
                            <input type="text" name="txtusuario" id="txtusuario">
                        </div>
                        <br>
                        <div class="from-item">
                            <label for="password">Ingrese Contraseña</label>
                            <input type="password" name="txtpassword" id="txtpassword">
                        </div>
                        <br>
                        <div class="form-item">
                            <div class="checbox">
                                <input type="checkbox" id="rememberMeCheckbox" onclick="verpass()">Mostrar Contraseña
                                <label for="rememberMeCheckbox" id="checkboxLabel"></label>
                            </div>
                        </div>
                        <br>
                        <div class="rol">SELECCIONE EL ROL</div>
                        <select name="rol" id="rol">
                        <option value="o" style="display:none;">
                            <label>Seleccionar</label>
                            <option value="Usuario">Usuario</option>
                            <option value="Admin">Administrador</option>
                        </option>
                        </select>
                        <br><br><br><br>
                        <button type="submit" value="Ingresar">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
        <div class="login-right">
            <img src="img/login/fondo2.jpg">
        </div>
    </div>
</form>   
</body>
<script>
    function verpass(){
        var tipo = document.getElementById("txtpassword");
        if(tipo.type == "password"){
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>
</html>