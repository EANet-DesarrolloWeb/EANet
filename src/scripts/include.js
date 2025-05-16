document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname.split("/").pop(); // obtiene el nombre del archivo actual

  // Determina si mostrar íconos de usuario y notificaciones
  const showUserIcons = !["login.html", "createaccount.html"].includes(
    currentPage
  );

  document.getElementById("navbar").innerHTML = `
    <nav class="navbar navbar-dark navbar-custom p-3 d-flex justify-content-between">
      <a href=${
        !showUserIcons ? "./login.html" : "./dashboard.html"
      } class="text-decoration-none">
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
              <li><a class="dropdown-item" href="profile.html">Perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="./login.html">Cerrar sesión</a></li>
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
});
