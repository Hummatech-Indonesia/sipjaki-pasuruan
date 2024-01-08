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
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                    Dinas</th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                    Konsultan
                </th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Nama Eksekutor</th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Tahun</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->dinas->user->name }}</td>
                    <td>{{ $project->consultant->user->name }}</td>
                    <td>{{ $project->executor->user->name }}</td>
                    <td>{{ $project->year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
