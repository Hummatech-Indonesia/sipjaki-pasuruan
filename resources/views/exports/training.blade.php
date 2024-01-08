<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama</th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Organisasi
                </th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Metode Pelatihan</th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Lokasi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($trainings as $training)
                <tr>
                    <td>{{ $training->name }}</td>
                    <td>{{ $project->organizer }}</td>
                    <td>{{ $project->trainingMethod->name }}</td>
                    <td>{{ $training->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
