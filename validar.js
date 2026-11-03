(function () {
  const form = document.getElementById('contacto');
  if (!form) return;

  const reglas = {
    nombre:  function (v) { return v.length >= 3 ? '' : 'El nombre debe tener al menos 3 caracteres.'; },
    correo:  function (v) {
      if (v === '') return 'El correo es obligatorio.';
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) ? '' : 'Ingresa un correo electrónico válido.';
    },
    mensaje: function (v) { return v.length >= 10 ? '' : 'El mensaje debe tener al menos 10 caracteres.'; }
  };

  function validarCampo(nombre) {
    const campo = form.elements[nombre];
    const vacio = campo.value.trim() === '';
    const error = vacio ? 'Este campo es obligatorio.' : reglas[nombre](campo.value.trim());
    document.getElementById('err-' + nombre).textContent = error;
    campo.setAttribute('aria-invalid', error ? 'true' : 'false');
    return error === '';
  }

  // Validación por campo al salir de él
  Object.keys(reglas).forEach(function (n) {
    form.elements[n].addEventListener('blur', function () { validarCampo(n); });
  });

  // Validación de todos los campos antes de enviar
  form.addEventListener('submit', function (e) {
    let ok = true;
    Object.keys(reglas).forEach(function (n) { if (!validarCampo(n)) ok = false; });
    if (!ok) e.preventDefault();
  });
})();
