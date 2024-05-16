<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code Challenge RJZ</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="container">
        <h1>To-Do List</h1>
        <div class="tabla">
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
                            <input type="checkbox" {{ $to_dos->completed ? 'checked' : '' }} onclick="marcar(this, {{ $to_dos->id }})">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="botones">
            <button onclick="mostrarFormulario()">Agregar Tarea</button>
            <button onclick="eliminarCompletadas()">Eliminar Tareas Completadas</button>
            <button onclick="eliminarTodas()">Eliminar Todas las Tareas</button>
        </div>
        <div id="form" class="formulario" style="display: none;">
            <form>
                <input type="text" placeholder="Nombre de la Tarea">
                <input type="checkbox"> Completada
                <input type="submit" value="Agregar">
            </form>
        </div>
    </div>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>