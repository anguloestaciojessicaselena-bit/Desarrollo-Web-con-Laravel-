// Validación cliente simple que aprovecha HTML5 + clases de Bootstrap
// Aplica a formularios con atributo `novalidate` para no interferir con el comportamiento del navegador

document.addEventListener('DOMContentLoaded', function(){
  const forms = document.querySelectorAll('form[novalidate]');

  forms.forEach(form => {
    form.addEventListener('submit', function(event){
      // Reset previous feedback classes
      form.classList.remove('was-validated');

      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
        // Focus al primer campo inválido
        const firstInvalid = form.querySelector(':invalid');
        if(firstInvalid) firstInvalid.focus();
      }
      // si es válido, se deja que envíe (servidor hará validación extra)
    }, false);
  });
});
