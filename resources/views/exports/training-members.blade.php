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
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Posisi
                </th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Nomor Telephone</th>
                <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainingMembers as $trainingMember)
                <tr>
                    <td>{{ $trainingMember->name }}</td>
                    <td>{{ $trainingMember->position }}</td>
                    <td>{{ $trainingMember->phone_number }}</td>
                    <td>{{ $trainingMember->gender }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
