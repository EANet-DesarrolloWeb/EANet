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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

<footer style="background-color: #222; color: white; text-align: center; padding: 20px;">
  <p>&copy; 2025 Mi Aplicación Web</p>
  
 <!-- <div style="font-size: 24px; display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-top: 10px;">
    <a href="https://openweathermap.org/api" target="_blank" title="OpenWeatherMap" style="color: #66ccff;">
      <i class="fas fa-cloud-sun"></i>  -->
    </a>
    <a href="https://www.google.com/maps/place/Universidad+Ean/" class="footer" target="_blank" title="Ubicación" style="color: rgb(255, 255, 255);">
      <i class="fas fa-map-marker-alt"></i>
    </a>
    <a href="https://www.youtube.com/watch?v=G9laMqCP_ho" class="footer" target="_blank" title="YouTube" style="color: rgb(255, 255, 255);">
      <i class="fab fa-youtube"></i>
    </a>
    <a href="https://newsapi.org" class="footer" target="_blank" title="Noticias" style="color: rgb(255, 255, 255);">
      <i class="fas fa-newspaper"></i>
    </a>
    <a href="https://www.instagram.com/" class="footer" target="_blank" title="Instagram" style="color: #E1306C;">
      <i class="fab fa-instagram"></i>
    </a>
    <a href="https://www.linkedin.com/school/universidadean/" class="footer"  target="_blank" title="LinkedIn" style="color: #0077B5;">
      <i class="fab fa-linkedin"></i>
    </a>
  </div>
</footer>


  </div>

  <script src="../scripts/include.js"></script>
  <script src="../scripts/login.js"></script>
</body>

</html>