<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Dashboard</title>

        <style>
            body {
                font-family: sans-serif;
            }

            h1 {
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>LAPORAN PROGRAM MASJID</h1>

        <p>
            Tanggal Cetak :
            {{ now()->format('d-m-Y H:i') }}
        </p>

        <table>
            <tr>
                <th>Total Daerah</th>
                <td>{{ $totalDaerah }}</td>
            </tr>

            <tr>
                <th>Total Masjid</th>
                <td>{{ $totalMasjid }}</td>
            </tr>

            <tr>
                <th>Total Kelas</th>
                <td>{{ $totalKelas }}</td>
            </tr>

            <tr>
                <th>Total Murid</th>
                <td>{{ $totalMurid }}</td>
            </tr>

            <tr>
                <th>Total Pengajar</th>
                <td>{{ $totalPengajar }}</td>
            </tr>
        </table>
    </body>
</html>
