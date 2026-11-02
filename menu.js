(function () {
  const toggles = document.querySelectorAll('.toggle');
  const salida = document.getElementById('seleccion');

  function cerrarTodos(excepto) {
    toggles.forEach(function (t) {
      if (t !== excepto) {
        t.setAttribute('aria-expanded', 'false');
        t.nextElementSibling.hidden = true;
      }
    });
  }

  toggles.forEach(function (t) {
    t.addEventListener('click', function (e) {
      e.stopPropagation();
      const sub = t.nextElementSibling;
      const abrir = sub.hidden;           // si está oculto, lo mostramos
      cerrarTodos(t);
      sub.hidden = !abrir;
      t.setAttribute('aria-expanded', String(abrir));
    });
  });

  // Clic en una opción del submenú
  document.querySelectorAll('.submenu a').forEach(function (a) {
    a.addEventListener('click', function (e) {
      e.preventDefault();
      salida.textContent = 'Seleccionaste: ' + a.dataset.op;
      cerrarTodos(null);
    });
  });

  // Clic fuera del menú o tecla Escape cierran los submenús
  document.addEventListener('click', function () { cerrarTodos(null); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') cerrarTodos(null); });
})();
