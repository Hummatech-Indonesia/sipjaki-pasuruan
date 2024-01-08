@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #1B3061;
            color: #FFFFFF;
        }

        td {
            border: none;
            /* Menghapus garis-garis di antara kolom-kolom */
        }
    </style>
</head>

<body>
    <header>
        <table style="width: 100%;">
            <tr>
                <td style="text-align: left">
                    <img src="logo-3.png" width="120" alt="" srcset="">
                </td>
                <td style="text-align: right;">
                    <img src="DefaultHD.png" width="40" alt="" srcset="">
                </td>
            </tr>
        </table>
    </header>
    <div class="">
        <p style="font-weight:bold;text-align:center;">Data Paket Pekerjaan</p>
        <p style="text-align:right">Di eksport pada
            {{ Carbon::now()->locale('id_ID')->isoFormat('DD MMMM Y') }}
        </p>

        <table>
            <thead>
                <th>Nama Dinas</th>
                <th>Nama Konsultan</th>
                <th>Nama Eksekutor</th>
                <th>Nama</th>
                <th>Tahun</th>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <td colspan="2" style="padding: 4px">{{ $project->dinas->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->consultant->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->executor->user->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->name }}</td>
                    <td colspan="2" style="padding: 4px">{{ $project->year }}</td>
                @endforeach
            </tbody>
        </table>
    </div>
    .
</body>

</html>
