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
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Email</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Alamat</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Kota</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Kode Pos</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nomor HP</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama Ketua</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Email Ketua</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Alamat Ketua</th>
                <th colspan="2" style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nomor Hp Ketua</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($associations as $association)
                <tr>
                    <td colspan="2" style="padding: 4px">{{ $association->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->email }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->address }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->city }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->postal_code }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->phone_number }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->leader }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->email_leader }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->address_leader }}</td>
                    <td colspan="2" style="padding: 4px">{{ $association->phone_number_leader }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
