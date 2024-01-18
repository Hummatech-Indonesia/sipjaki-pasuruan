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

        .border td {
            border: 1px solid black;
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

        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                        Tahun</th>
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">Nama
                        Nama
                    </th>
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                        Nilai Kontrak
                    </th>
                    @role(['admin','superadmin','service provider'])
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                        Dinas
                    </th>
                    @endrole
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                        Pelaksana
                    </th>
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                        Konsultan
                    </th>
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                        Mulai
                    </th>
                    <th style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                        Selesai
                    </th>
                </tr>
            </thead>
            <tbody class="border">
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->fiscalYear->name }}</td>
                        <td>{{ $project->name }}</td>
                        <td>Rp.{{ number_format($project->project_value, 0, ',', '.') }}</td>
                        @role(['admin','superadmin','service provider'])
                        <td>{{ $project->consultantProject->dinas->user->name }}</td>
                        @endrole
                        <td>{{ $project->serviceProvider->user->name }}</td>
                        <td>{{ $project->consultantProject->serviceProvider->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($project->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($project->start_at)->locale('id_ID')->isoFormat('DD MMMM Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    .
</body>

</html>
