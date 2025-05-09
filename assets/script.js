document.querySelectorAll('input[name="taskColor"]').forEach((input) => {
    input.addEventListener('change', function () {
        const modal = document.getElementById('modalContenido');
        modal.style.backgroundColor = this.value || '#FFFFFF';
    });

    // Establece el color inicial cuando se abre
    // if (input.checked) {
    //     document.getElementById('modalContenido').style.backgroundColor = input.value;
    // }
});

document.getElementById('agregar').addEventListener('click', function () {
    const nuevoDiv = document.createElement('div');
    nuevoDiv.classList.add('mb-2', 'input-group');

    const text = document.createElement('input');
    text.type = 'text';
    text.classList.add('form-control');
    text.placeholder = '...';

    const boton = document.createElement('button');
    boton.textContent = '+';
    boton.classList.add('btn');

    boton.addEventListener('click', function () {
      const valor = text.value.trim();
    //   const csrfTokenName = document.getElementById('token');
    //   const csrfHash = document.getElementById('hash');

      if (valor !== '') {
        // Enviar valor al servidor con AJAX (Fetch API)
        fetch('form/subtask', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest',
            //   [csrfTokenName]: csrfHash 
            },
            body: JSON.stringify({ valor: valor })
          })
          
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            // Agregar valor a la lista visual
            const li = document.createElement('li');
            li.classList.add('list-group-item');
            li.textContent = valor;
            document.getElementById('valoresIngresados').appendChild(li);
            text.value = '';
          }
        });
      }
    });

    nuevoDiv.appendChild(text);
    nuevoDiv.appendChild(boton);
    document.getElementById('contenedor').appendChild(nuevoDiv);
  });
