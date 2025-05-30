<?php
require_once("../../../Model/contador.php");
$visitas = Contador::incrementarYObtener();
?><!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crear Usuario | EANet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/layout.css">
  <link rel="stylesheet" href="../styles/profile.css">
  <link rel="icon" href="../../assets/img/logo.png" type="image/png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body data-visitas="<?php echo $visitas; ?>">
  <div class="page-wrapper d-flex flex-column min-vh-100">
    <div id="navbar"></div>

    <main class="flex-fill container mt-5">
      <h2 class="text-center mb-4">Crear Cuenta</h2>

      <form id="createUserForm" class="mx-auto" style="max-width: 700px;">
        <div class="row">
          <!-- Documento -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Número de documento</label>
            <input type="text" class="form-control" name="id" required>
          </div>

          <!-- Fecha nacimiento -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" required>
          </div>

          <!-- Nombres y apellidos -->
          <div class="col-md-4 mb-3">
            <label class="form-label">Primer nombre</label>
            <input type="text" class="form-control" name="primer_nombre" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Segundo nombre</label>
            <input type="text" class="form-control" name="segundo_nombre">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Tercer nombre</label>
            <input type="text" class="form-control" name="tercer_nombre">
          </div>

          <div class="col-md-4 mb-3">
            <label class="form-label">Primer apellido</label>
            <input type="text" class="form-control" name="primer_apellido" required>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Segundo apellido</label>
            <input type="text" class="form-control" name="segundo_apellido">
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label">Tercer apellido</label>
            <input type="text" class="form-control" name="tercer_apellido">
          </div>

          <!-- Teléfono -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" required>
          </div>

          <!-- Correo -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Correo institucional <i class="bi bi-info-circle"
                title="Debe terminar en @universidadean.edu.co"></i></label>
            <input type="email" class="form-control" name="correo" required>
          </div>

          <!-- Contraseña -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Contraseña </label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <!-- Confirmar contraseña -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" name="confirmar_password" required>
          </div>

          <!-- Rol -->
          <div class="col-md-6 mb-3">
            <label for="rol_id" class="form-label">Rol</label>
            <select id="rol_id" name="rol_id" class="form-select" required>
              <option value="">Selecciona un rol</option>
            </select>
          </div>

          <!-- Carrera -->
          <div class="col-md-6 mb-3">
            <label for="carrera_id" class="form-label">Carrera</label>
            <select id="carrera_id" name="carrera_id" class="form-select" required disabled>
              <option value="">Selecciona una carrera</option>
            </select>
          </div>

          <!-- Acerca de ti -->
          <div class="col-12 mb-3">
            <label class="form-label">Acerca de ti</label>
            <textarea class="form-control" name="Acerca_de_ti" rows="3" placeholder="Opcional..."></textarea>
          </div>
    
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
      </form>
    </main>

    <div id="footer" class="mt-5"></div>
  </div>

  <script src="../scripts/include.js"></script>
  <script src="../scripts/createaccount.js"></script>
</body>

</html>