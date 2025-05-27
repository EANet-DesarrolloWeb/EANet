document.addEventListener("DOMContentLoaded", function () {
  const params = new URLSearchParams(window.location.search);
  if (params.has("error")) {
    alert("Correo o contraseña incorrectos. Intente de nuevo.");
  }
});

document.getElementById("crearCuenta").addEventListener("click", function (e) {
  e.preventDefault();
  window.location.href = "../pages/createaccount.php";
});

// Botón "¿Olvidaste tu contraseña?"
document
  .getElementById("restablecerContraseña")
  .addEventListener("click", async function (e) {
    e.preventDefault();

    const email = document.getElementById("email").value.trim();

    if (email === "") {
      alert("Ingrese un correo electrónico");
      return;
    }

    try {
      const res = await fetch(
        `../../../Controller/getInfoUser.php?action=validarCorreo&correo=${encodeURIComponent(
          email
        )}`
      );
      const result = await res.json();

      if (result.existe) {
        alert("Se ha enviado un enlace de restablecimiento a " + email);
        // Aquí podrías redirigir o activar el flujo de recuperación real si lo implementas
      } else {
        alert("Usuario no existente. Por favor cree una cuenta.");
      }
    } catch (error) {
      console.error("Error al validar correo:", error);
      alert("Error al verificar el correo.");
    }
  });
