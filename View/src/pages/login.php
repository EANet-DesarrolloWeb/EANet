<?php
require_once("../../../Model/contador.php");
$visitas = Contador::incrementarYObtener();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In | EANet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/layout.css">
  <link rel="stylesheet" href="../styles/login.css">
  <link rel="icon" href="../../assets/img/logo.png" type="image/png">
</head>

<body data-visitas="<?php echo $visitas; ?>">
  <div class="page-wrapper d-flex flex-column min-vh-100">
    <div id="navbar"></div>

    <main>
      <section class="log-In">
        <div>
          <h1 class="text-center">¡Hola Eanista!</h1>


          <?php if (isset($_GET['error'])): ?>
            <p class="text-danger text-center">Correo o contraseña incorrectos</p>
          <?php endif; ?>

          <form action="../../../Controller/logicController.php" method="POST" id="inicioSesion">
            <div class="mb-3">
              <input type="email" name="correo" id="email" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
              <input type="password" name="password" id="contraseña" placeholder="Contraseña" required>
            </div>
            <div id="restablecerContraseña">
              <a href="#" id="restablecerContraseña">¿Haz olvidado tu contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Iniciar sesión</button>
            <button type="button" id="crearCuenta" class="btn btn-primary mb-3">Crear cuenta</button>
          </form>
        </div>
        <div>
          <a href="https://es.vecteezy.com/png-gratis/networking">
            <img src="../../assets/img/networking.png" alt="Networking PNGs por Vecteezy">
          </a>
        </div>
      </section>
    </main>

    <div id="footer"></div>
  </div>

  <script src="../scripts/include.js"></script>
  <script src="../scripts/login.js"></script>
</body>

</html>