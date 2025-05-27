document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname.split("/").pop();
  const showUserIcons = !["login.php", "createaccount.php"].includes(currentPage);

  document.getElementById("navbar").innerHTML = `
    <nav class="navbar navbar-dark navbar-custom p-3 d-flex justify-content-between">
      <a href="${!showUserIcons ? './login.php' : './dashboard.php'}" class="text-decoration-none">
        <div class="navbar-brand d-flex align-items-center gap-2">
          <img src="../../assets/img/logo.png" alt="Logo" height="30">
          <span class="text-white fw-bold">EANet</span>
        </div>
      </a>
      ${
        showUserIcons
          ? `
        <div class="d-flex align-items-center gap-3">
          <i class="bi bi-bell-fill fs-4 text-white"></i>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-4"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser">
              <li><a class="dropdown-item" href="profile.php">Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" id="cerrarSesion" href="#">Cerrar sesión</a></li>
            </ul>
          </div>
        </div>
      `
          : ""
      }
    </nav>
  `;

  document.getElementById("footer").innerHTML = `
    <div class="footer bg-dark text-white text-center py-2 mt-4">
      Creado por Alejandra, Paula y Alejandro
    </div>
  `;

  if (document.getElementById("cerrarSesion")) {
    document.getElementById("cerrarSesion").addEventListener("click", (e) => {
      e.preventDefault();
      sessionStorage.removeItem("info_usuario");
      window.location.href = "login.php";
    });
  }

  const rutasProtegidas = ["dashboard.php", "profile.php"];
  if (rutasProtegidas.includes(currentPage)) {
    const infoUsuario = sessionStorage.getItem("info_usuario");
    if (!infoUsuario) {
      alert("Debes iniciar sesión para acceder a esta página.");
      window.location.href = "login.php";
    }
  }
});
