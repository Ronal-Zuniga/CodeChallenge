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
                        <input type="checkbox" {{ $to_dos->completed ? 'checked' : '' }} disabled>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
