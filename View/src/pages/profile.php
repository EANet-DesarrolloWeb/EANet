<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil | EANet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/layout.css">
  <link rel="stylesheet" href="../styles/profile.css">
  <link rel="icon" href="../../assets/img/logo.png" type="image/png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="page-wrapper d-flex flex-column min-vh-100">
    <div id="navbar"></div>

    <main class="flex-fill container profile-container text-center mt-4">
      <div class="row">
        <div class="col-md-6 text-center mb-4">
          <img src="../../assets/img/perfil.png" class="profile-img mb-3" alt="Foto de perfil">
          <div>
            <span class="fw-bold" id="nombreCompleto"></span>
            <button class="icon-btn ms-2"><i class="bi bi-pencil-square"></i></button>
          </div>
          <div class="text-muted mb-3">Status</div>

          <div class="mb-2 input-group align-items-center">
            <span class="input-group-text">Número de documento</span>
            <input type="text" class="form-control" id="id" placeholder="Número de documento" disabled>
            <span class="input-group-text bg-light border-start-0">
              <i class="bi bi-info-circle-fill text-primary"
                title="Para cambiar tu número de documento, comunícate con soporte."></i>
            </span>
          </div>
          <div class="mb-2 input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="text" class="form-control" id="telefono" placeholder="Teléfono">
          </div>

          <div class="mb-2 input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="text" class="form-control" id="correo" placeholder="Correo electrónico" disabled>
          </div>

          <div class="input-group">
            <textarea class="form-control" placeholder="Acerca de ti..." id="Acerca_de_ti"></textarea>
            <span class="input-group-text"><i class="bi bi-pencil-square"></i></span>
          </div>
        </div>

        <div class="col-md-6 text-start">
          <select class="dropdown-btn cursor-not-allowed" disabled>
            <option>Idiomas</option>
          </select>

          <div class="mb-2 input-group align-items-center">
            <span class="input-group-text">Carrera</span>
            <input type="text" class="form-control" id="carrera_nombre" placeholder="Carrera asignada" readonly>
            <span class="input-group-text bg-light border-start-0">
              <i class="bi bi-info-circle-fill text-primary"
                title="Para cambiar tu carrera, comunícate con soporte."></i>
            </span>
          </div>


          <button class="upload-btn cursor-not-allowed" disabled>
            <i class="bi bi-paperclip me-2"></i>Anexa artículos académicos
          </button>
          <button class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#modalPassword">
            Cambiar contraseña
          </button>
        </div>
      </div>

      <div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="modalPasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content shadow">
            <div class="modal-header">
              <h5 class="modal-title" id="modalPasswordLabel">Cambiar contraseña</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label for="password_actual" class="form-label">Contraseña actual</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password_actual">
                  <span class="input-group-text">
                    <i class="bi bi-eye-slash toggle-password" data-target="password_actual"
                      style="cursor:pointer;"></i>
                  </span>
                </div>
              </div>

              <div class="mb-3">
                <label for="password_nueva" class="form-label">Nueva contraseña</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password_nueva">
                  <span class="input-group-text">
                    <i class="bi bi-eye-slash toggle-password" data-target="password_nueva" style="cursor:pointer;"></i>
                  </span>
                </div>
              </div>

              <div class="mb-3">
                <label for="password_confirmar" class="form-label">Confirmar nueva contraseña</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password_confirmar">
                  <span class="input-group-text">
                    <i class="bi bi-eye-slash toggle-password" data-target="password_confirmar"
                      style="cursor:pointer;"></i>
                  </span>
                </div>
              </div>

              <!-- Reglas de validación -->
              <ul class="list-unstyled ps-3 mb-3 small">
                <li id="rule-length" class="text-danger"><i class="bi bi-x-circle-fill me-1"></i> Mínimo 6 caracteres
                </li>
                <li id="rule-mayus" class="text-danger"><i class="bi bi-x-circle-fill me-1"></i> Al menos una mayúscula
                </li>
                <li id="rule-num" class="text-danger"><i class="bi bi-x-circle-fill me-1"></i> Al menos un número</li>
                <li id="rule-special" class="text-danger"><i class="bi bi-x-circle-fill me-1"></i> Al menos un carácter
                  especial</li>
              </ul>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button class="btn btn-primary" id="btn-actualizar-password">Actualizar</button>
            </div>
          </div>
        </div>
      </div>

      <button class="btn btn-save mt-4">Guardar cambios</button>
    </main>

    <div id="footer"></div>
  </div>

  <script src="../scripts/include.js"></script>
  <script src="../scripts/userData.js"></script>
</body>

</html>