document.addEventListener("DOMContentLoaded", async () => {
  const usuario = JSON.parse(sessionStorage.getItem("info_usuario"));
  if (!usuario) return;

  // Construcción de nombre completo
  const nombreCompleto = [
    usuario.primer_nombre,
    usuario.segundo_nombre,
    usuario.tercer_nombre,
    usuario.primer_apellido,
    usuario.segundo_apellido,
    usuario.tercer_apellido,
  ]
    .filter(Boolean)
    .join(" ");

  const acerca =
    usuario.acerca_de_ti ||
    usuario.Acerca_de_ti ||
    "No hay información disponible";

  // Asignación general
  const nombreSpan =
    document.getElementById("nombreUsuario") ||
    document.getElementById("nombreCompleto");
  if (nombreSpan) nombreSpan.textContent = nombreCompleto;

  const telInput = document.getElementById("telefono");
  const idInput = document.getElementById("id");
  const correoInput = document.getElementById("correo");
  const acercaInput = document.getElementById("Acerca_de_ti");

  if (telInput) telInput.value = usuario.telefono || "";
  if (idInput) idInput.value = usuario.id;
  if (correoInput) correoInput.value = usuario.correo || "";
  if (acercaInput) acercaInput.value = acerca;

  // Asignación visual también en dashboard y otras vistas
  const acercaCenter = document.getElementById("acerca_de_ti_center");
  const acercaLabel = document.getElementById("acerca_de_ti");
  if (acercaCenter) acercaCenter.textContent = acerca;
  if (acercaLabel) acercaLabel.textContent = acerca;

  // Obtener nombre de la carrera
  const carreraInput = document.getElementById("carrera_nombre");
  if (carreraInput && usuario.carrera_id) {
    try {
      const res = await fetch(
        `../../../Controller/getInfoUser.php?action=getCarreraById&id=${usuario.carrera_id}`
      );
      const data = await res.json();
      carreraInput.value = data.nombre || "Carrera desconocida";
    } catch {
      carreraInput.value = "Error al cargar carrera";
    }
  }

  // Guardar cambios (teléfono y acerca de ti)
  const guardarBtn = document.querySelector(".btn-save");
  if (guardarBtn) {
    guardarBtn.addEventListener("click", async () => {
      const nuevoTel = telInput?.value.trim();
      const nuevoAcerca = acercaInput?.value.trim();

      const response = await fetch("../../../Controller/updateProfile.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          id: usuario.id,
          telefono: nuevoTel,
          acerca_de_ti: nuevoAcerca,
        }),
      });

      const result = await response.json();
      if (result.success) {
        alert("Información actualizada correctamente.");
        usuario.telefono = nuevoTel;
        usuario.acerca_de_ti = nuevoAcerca;
        sessionStorage.setItem("info_usuario", JSON.stringify(usuario));
      } else {
        alert("Error al guardar los cambios.");
      }
    });
  }

  // Validación de nueva contraseña en tiempo real
  const passwordNueva = document.getElementById("password_nueva");
  const reglas = {
    length: document.getElementById("rule-length"),
    mayus: document.getElementById("rule-mayus"),
    num: document.getElementById("rule-num"),
    special: document.getElementById("rule-special"),
  };

  if (passwordNueva) {
    passwordNueva.addEventListener("input", () => {
      const valor = passwordNueva.value;
      const tieneLongitud = valor.length >= 6;
      const tieneMayus = /[A-Z]/.test(valor);
      const tieneNum = /\d/.test(valor);
      const tieneEspecial = /[\W_]/.test(valor);

      actualizarRegla(reglas.length, tieneLongitud);
      actualizarRegla(reglas.mayus, tieneMayus);
      actualizarRegla(reglas.num, tieneNum);
      actualizarRegla(reglas.special, tieneEspecial);
    });
  }

  function actualizarRegla(elemento, valido) {
    if (!elemento) return;
    const icono = elemento.querySelector("i");
    if (valido) {
      elemento.classList.remove("text-danger");
      elemento.classList.add("text-success");
      icono.classList.remove("bi-x-circle-fill");
      icono.classList.add("bi-check-circle-fill");
    } else {
      elemento.classList.add("text-danger");
      elemento.classList.remove("text-success");
      icono.classList.add("bi-x-circle-fill");
      icono.classList.remove("bi-check-circle-fill");
    }
  }

  // Mostrar/Ocultar contraseñas
  document.querySelectorAll(".toggle-password").forEach((icon) => {
    icon.addEventListener("click", () => {
      const input = document.getElementById(icon.dataset.target);
      if (!input) return;
      input.type = input.type === "password" ? "text" : "password";
      icon.classList.toggle("bi-eye");
      icon.classList.toggle("bi-eye-slash");
    });
  });

  // Cambio de contraseña
  const btnActualizar = document.getElementById("btn-actualizar-password");
  if (btnActualizar) {
    btnActualizar.addEventListener("click", async () => {
      const actual = document.getElementById("password_actual").value;
      const nueva = document.getElementById("password_nueva").value;
      const confirmar = document.getElementById("password_confirmar").value;

      if (!actual || !nueva || !confirmar) {
        alert("Todos los campos son obligatorios.");
        return;
      }

      if (nueva !== confirmar) {
        alert("Las contraseñas no coinciden.");
        return;
      }

      const valido =
        nueva.length >= 6 &&
        /[A-Z]/.test(nueva) &&
        /\d/.test(nueva) &&
        /[\W_]/.test(nueva);

      if (!valido) {
        alert("La nueva contraseña no cumple los requisitos.");
        return;
      }

      try {
        const res = await fetch("../../../Controller/updateProfile.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            id: usuario.id,
            actual,
            nueva,
          }),
        });

        const data = await res.json();
        if (data.success) {
          alert("Contraseña actualizada correctamente.");
          document.getElementById("password_actual").value = "";
          document.getElementById("password_nueva").value = "";
          document.getElementById("password_confirmar").value = "";
          bootstrap.Modal.getOrCreateInstance(
            document.getElementById("modalPassword")
          ).hide();
        } else {
          alert(data.message || "No se pudo actualizar la contraseña.");
        }
      } catch (error) {
        alert("Error al conectar con el servidor.");
      }
    });
  }
});
