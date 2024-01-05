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
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                    Dinas</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                    Konsultan</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                    Eksekutor</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                </th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Tahun
                </th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Lokasi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td colspan="2" style="padding: 4px">{{ $project->dinas->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->consultant->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->executor->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
