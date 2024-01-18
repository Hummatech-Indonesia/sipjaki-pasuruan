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
                <td style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    No
                </td>
                <td style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Nama
                </td>
                <td style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Dinas
                </td>
                <td style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Konsultan
                </td>
                <td style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Tahun
                </td>
                <td style="text-align: center; padding:4px; background-color:#1B3061; color:white">
                    Progres
                </td>

            </tr>

        </thead>
        <tbody>
            @foreach ($consultantProjects as $consultantProject)
                <tr>
                    <td class="text-center">
                        {{ $consultantProject->name }}
                    </td>
                    <td class="text-center">
                        {{ $consultantProject->dinas->user->name }}
                    </td>
                    <td class="text-center">
                        {{ $consultantProject->serviceProvider->user->name }}
                    </td>
                    <td class="text-center">
                        {{ $consultantProject->fiscalYear->name }}
                    </td>
                    <td class="text-center">
                        {{ $consultantProject->finance_progress }}%
                    </td>
                  
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
