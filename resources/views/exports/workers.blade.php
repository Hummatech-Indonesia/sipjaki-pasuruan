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
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Penyedia
                    Jasa</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Tanggal Lahir</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Edukasi</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nomor Registrasi</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Jumlah Sertifikat
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
                <tr>
                    <td colspan="2" style="padding: 4px">{{ $worker->serviceProvider->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $worker->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $worker->birth_date }}</td>
                    <td colspan="2" style="padding: 4px">{{ $worker->education }}</td>
                    <td colspan="2" style="padding: 4px">{{ $worker->registration_number }}</td>
                    <td colspan="2" style="padding: 4px">{{ $worker->cerificate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
