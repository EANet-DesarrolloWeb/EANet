<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | EANet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/layout.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
  <link rel="icon" href="../../assets/img/logo.png" type="image/png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="page-wrapper d-flex flex-column min-vh-100">
    <div id="navbar"></div>

    <main class="flex-fill container-fluid mt-3">
      <div class="row gy-3">
        <div class="col-md-3">
          <div class="sidebar text-center">
            <img src="../../assets/img/perfil.png" alt="Perfil" class="profile-img mb-2">
            <h5 id="nombreUsuario"></h5>
            <p id="acerca_de_ti"></p>
            <img src="../../assets/img/perfil.png" alt="Foto de perfil" class="profile-img mb-2">
            <h5>Pepito Perez</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <h6 class="fw-bold">Reconocimientos</h6>
            <div class="d-flex justify-content-center gap-2">
              <img src="../../assets/img/thumbs.png" width="30" alt="Pulgar arriba">
              <img src="../../assets/img/medalla.png" width="30" alt="Medalla de reconocimiento">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3 position-relative">
            <textarea class="form-control pe-5" rows="2" placeholder="¿Qué hay de nuevo?"></textarea>
            <div class="post-icons position-absolute end-0 bottom-0 p-2">
              <i class="bi bi-camera-fill me-2"></i>
              <i class="bi bi-geo-alt-fill me-2"></i>
              <i class="bi bi-emoji-smile"></i>
            </div>
          </div>

          <div class="card card-post">
            <div class="card-header d-flex justify-content-between">
              <span>Usuario</span>
              <span>Ubicación - Hora</span>
            </div>
            <div class="card-body">
              <img src="../../assets/img/post.png" class="card-img-top" alt="Post">
              <div class="post-text text-center" id="acerca_de_ti_center">
              <img src="../../assets/img/post.png" class="card-img-top" alt="Imagen de publicación">
              <div class="post-text text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </div>
              <div class="icons">
                <i class="bi bi-star"></i>
                <i class="bi bi-heart"></i>
                <i class="bi bi-chat-dots"></i>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="sidebar p-3">
            <h6 class="fw-bold">Artículos académicos</h6>
            <img src="../../assets/img/articulos.png" width="50" class="mb-3" alt="Ícono de artículos académicos">
            <h6 class="fw-bold">Noticias relevantes</h6>
            <img src="../../assets/img/noticias.png" width="50" alt="Ícono de noticias relevantes">
            <h6 class="fw-bold">Google Books</h6>
          </div>
        </div>
      </div>
    </main>

    <div id="footer"></div>
  </div>

  <script src="../scripts/include.js"></script>
  <script src="../scripts/userData.js"></script>

</body>

</html>
