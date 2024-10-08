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
    <div class="">
        <p style="font-weight:bold;text-align:center;">Data Pelatihan</p>
        <p style="text-align:right">Di eksport pada
            {{ Carbon::now()->locale('id_ID')->isoFormat('DD MMMM Y') }}
        </p>

        <table>
            <thead>
                <th>Nama</th>
                <th>Organisasi</th>
                <th>Metode Latihan</th>
                <th>Lokasi</th>
                <th>Tahun</th>
            </thead>
            <tbody>
                @foreach ($trainings as $training)
                    <td>{{ $training->name }}</td>
                    <td>{{ $training->organizer }}</td>
                    <td>{{ $training->trainingMethod->name }}</td>
                    <td>{{ $training->location }}</td>
                    <td>{{ $training->fiscalYear->name }}</td>
                @endforeach
            </tbody>
        </table>
    </div>
    .
</body>

</html>
