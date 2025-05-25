document.addEventListener("DOMContentLoaded", async () => {
  const form = document.getElementById("createUserForm");
  const rolSelect = document.getElementById("rol_id");
  const carreraSelect = document.getElementById("carrera_id");

  // Cargar roles
  const resRoles = await fetch("../../../Controller/getInfoUser.php?action=getRoles");
  const roles = await resRoles.json();
  roles.forEach((r) => {
    const option = document.createElement("option");
    option.value = r.id;
    option.textContent = r.nombre;
    rolSelect.appendChild(option);
  });

  // Cargar carreras
  const resCarreras = await fetch("../../../Controller/getInfoUser.php?action=getCarreras");
  const carreras = await resCarreras.json();
  carreras.forEach((c) => {
    const option = document.createElement("option");
    option.value = c.id;
    option.textContent = c.nombre;
    carreraSelect.appendChild(option);
  });

  rolSelect.addEventListener("change", () => {
    const rol = parseInt(rolSelect.value);
    carreraSelect.disabled = !(rol === 4 || rol === 3);
  });

  // Mostrar/Ocultar contraseñas
  document.querySelectorAll("input[type='password']").forEach((input) => {
    const wrapper = document.createElement("div");
    wrapper.className = "input-group";
    const toggle = document.createElement("span");
    toggle.className = "input-group-text toggle-password";
    toggle.innerHTML = '<i class="bi bi-eye-slash" style="cursor:pointer;"></i>';
    const parent = input.parentElement;
    parent.replaceChild(wrapper, input);
    wrapper.appendChild(input);
    wrapper.appendChild(toggle);

    toggle.addEventListener("click", () => {
      const icon = toggle.querySelector("i");
      input.type = input.type === "password" ? "text" : "password";
      icon.classList.toggle("bi-eye");
      icon.classList.toggle("bi-eye-slash");
    });
  });

  // Validación visual de contraseña
  const passwordInput = document.getElementById("password");
  const ul = document.createElement("ul");
  ul.className = "list-unstyled ps-3 small mt-2";

  const reglas = {
    length: crearRegla("Mínimo 6 caracteres"),
    mayus: crearRegla("Al menos una mayúscula"),
    num: crearRegla("Al menos un número"),
    special: crearRegla("Al menos un carácter especial")
  };
  Object.values(reglas).forEach(r => ul.appendChild(r));
  passwordInput.closest(".mb-3").appendChild(ul);

  passwordInput.addEventListener("input", () => {
    const val = passwordInput.value;
    actualizarRegla(reglas.length, val.length >= 6);
    actualizarRegla(reglas.mayus, /[A-Z]/.test(val));
    actualizarRegla(reglas.num, /\d/.test(val));
    actualizarRegla(reglas.special, /[^A-Za-z0-9]/.test(val));
  });

  function crearRegla(text) {
    const li = document.createElement("li");
    li.className = "text-danger";
    li.innerHTML = `<i class="bi bi-x-circle-fill me-1"></i> ${text}`;
    return li;
  }

  function actualizarRegla(element, valid) {
    const icon = element.querySelector("i");
    element.classList.toggle("text-danger", !valid);
    element.classList.toggle("text-success", valid);
    icon.className = valid ? "bi bi-check-circle-fill me-1" : "bi bi-x-circle-fill me-1";
  }

  // Envío
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form).entries());
    data.action = "crearUsuario";

    if (!data.correo.endsWith("@universidadean.edu.co")) {
      return alert("El correo debe terminar en @universidadean.edu.co");
    }

    if (data.password !== data.confirmar_password) {
      return alert("Las contraseñas no coinciden.");
    }

    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{6,}$/;
    if (!passwordRegex.test(data.password)) {
      return alert("La contraseña no cumple con los requisitos de seguridad.");
    }

    delete data.confirmar_password;

    const res = await fetch("../../../Controller/logicController.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    });

    const result = await res.json();
    if (result.success) {
      alert("Usuario creado correctamente");
      form.reset();
      location.href = "login.php";
    } else {
      alert(result.message || "Error al crear usuario");
    }
  });
});
