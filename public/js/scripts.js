function mostrarFormulario() {
    var formulario = document.getElementById('form');
    formulario.style.display = 'block';
    formulario.style.transform = 'translateY(0)';
}

function eliminarCompletadas() {
    if (confirm('¿Estás seguro de que deseas eliminar todas las tareas completadas?')) {
        fetch('/to_dos/completed', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.text())
        .then(data => {
            const container = document.querySelector('.container');
            container.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function eliminarTodas() {
    if (confirm('¿Estás seguro de que deseas eliminar todas las tareas?')) {
        fetch('/to_dos', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.text())
        .then(data => {
            const container = document.querySelector('.container');
            container.innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function marcar(checkbox, taskId) {
    var completada = checkbox.checked;
    fetch(`/to_dos/${taskId}/complete`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ completed: completada })
    })
    .then(response => response.text())
    .then(data => {
        const container = document.querySelector('.container');
        container.innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
        checkbox.checked = !completada;
    });
}

function agregarTarea(event) {
    event.preventDefault();

    const nombreTarea = document.getElementById('nombreTarea').value;
    const completadaTarea = document.getElementById('completadaTarea').checked;

    fetch('/to_dos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ description: nombreTarea, completed: completadaTarea })
    })
    .then(response => response.text())
    .then(data => {
        const container = document.querySelector('.container');
        container.innerHTML = data;
        document.getElementById('nombreTarea').value = '';
        document.getElementById('completadaTarea').checked = false;
        ocultarFormulario();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function ocultarFormulario() {
    const formulario = document.getElementById('form');
    formulario.style.display = 'none';
}