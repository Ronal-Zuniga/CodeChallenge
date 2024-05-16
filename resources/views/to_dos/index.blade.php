<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Dos</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="container">
        <h1>To-Dos</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Nombre de la Tarea</th>
                        <th>Completada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($to_dos as $to_dos)
                    <tr>
                        <td>{{ $to_dos->description }}</td>
                        <td>
                            <input type="checkbox" {{ $to_dos->completed ? 'checked' : '' }} enabled>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <button>Agregar Tarea</button>
            <button>Eliminar Tareas Completadas</button>
            <button>Eliminar Todas las Tareas</button>
        </div>
        <div id="form" style="display: none;">
            <form>
                <input type="text" placeholder="Nombre de la Tarea">
                <input type="checkbox"> Completada
                <button>Agregar</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>