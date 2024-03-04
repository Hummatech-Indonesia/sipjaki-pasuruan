<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender PHP Native</title>
    
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td.today {
            background-color: #ffc107;
        }
    </style>
</head>

<body>

    <?php
    // Mendapatkan informasi tanggal dan waktu saat ini
    $today = new DateTime();
    $currentMonth = $today->format('m');
    $currentYear = $today->format('Y');
    
    // Mendapatkan jumlah hari dalam bulan ini
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
    
    // Menentukan tanggal pertama dalam bulan ini
    $firstDayOfMonth = new DateTime("$currentYear-$currentMonth-01");
    $firstDayOfWeek = $firstDayOfMonth->format('N'); // Mendapatkan hari dalam seminggu (1-7)
    
    // Membuat tabel kalender
    echo $firstDayOfWeek;
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Mon</th>';
    echo '<th>Tue</th>';
    echo '<th>Wed</th>';
    echo '<th>Thu</th>';
    echo '<th>Fri</th>';
    echo '<th>Sat</th>';
    echo '<th>Sun</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Mengisi sel-sel kosong sebelum tanggal pertama
    echo '<tr>';
    for ($i = 1; $i < $firstDayOfWeek; $i++) {
        echo '<td></td>';
    }
    
    // Menampilkan tanggal-tanggal dalam bulan ini
    for ($day = 1; $day <= $daysInMonth; $day++) {
        echo '<td';
        // Menyorot tanggal saat ini
        if ($today->format('Y-m-d') === "$currentYear-$currentMonth-$day") {
            echo ' class="today"';
        }
        echo ">$day</td>";
    
        // Pindah ke baris baru setiap akhir pekan
        if (($firstDayOfWeek + $day - 1) % 7 == 0) {
            echo '</tr><tr>';
        }
    }
    
    // Menutup baris terakhir jika tidak penuh
    if (($firstDayOfWeek + $daysInMonth - 1) % 7 != 0) {
        echo str_repeat('<td></td>', 7 - (($firstDayOfWeek + $daysInMonth - 1) % 7));
    }
    
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    ?>

</body>

</html>
