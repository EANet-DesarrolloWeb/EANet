document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("navbar").innerHTML = `
    <nav class="navbar navbar-dark navbar-custom p-3 d-flex justify-content-between">
      <a href="./dashboard.html" class="text-decoration-none">
        <div class="navbar-brand d-flex align-items-center gap-2">
          <img src="../../assets/img/logo.png" alt="Logo" height="30">
          <span class="text-white fw-bold">EANet</span>
        </div>
      </a>
      <div class="d-flex align-items-center gap-3">
        <i class="bi bi-bell-fill fs-4 text-white"></i>
        <a href="profile.html">
          <i class="bi bi-person-circle fs-4 text-white"></i>
        </a>
      </div>
    </nav>
  `;

  document.getElementById("footer").innerHTML = `
    <div class="footer bg-dark text-white text-center py-2 mt-4">
      Creado por Alejandra, Paula y Alejandro
    </div>
  `;
});
