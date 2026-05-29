<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <title>Laporan Dashboard - Program Masjid</title>

        <style>
            /* Pengaturan Halaman Cetak A4 */
            @page {
                size: A4;
                margin: 2cm 2cm 2.5cm 2cm;
            }

            body {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: #1e293b;
                line-height: 1.5;
                margin: 0;
                padding: 0;
            }

            /* Header Laporan Premium */
            .header-container {
                border-bottom: 3px double #0f766e;
                padding-bottom: 16px;
                margin-bottom: 30px;
            }

            .report-title {
                text-align: center;
                font-size: 22px;
                font-weight: 800;
                color: #115e59;
                margin: 0;
                letter-spacing: 1px;
                text-transform: uppercase;
            }

            .report-subtitle {
                text-align: center;
                font-size: 12px;
                color: #64748b;
                margin: 6px 0 0 0;
                font-weight: 500;
            }

            /* Metadata Cetak */
            .meta-info {
                font-size: 11px;
                color: #64748b;
                margin-bottom: 20px;
                text-align: right;
                font-style: italic;
            }

            /* Tabel Data Ringkasan */
            .report-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                background-color: #ffffff;
            }

            .report-table tr {
                border-bottom: 1px solid #e2e8f0;
            }

            /* Kolom Label (Kiri) */
            .report-table th {
                text-align: left;
                padding: 16px 20px;
                font-size: 13px;
                font-weight: 600;
                color: #334155;
                background-color: #f8fafc;
                width: 65%;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border-left: 4px solid #0f766e; /* Aksen Hijau Teal tebal di tepi kiri */
            }

            /* Kolom Angka/Nilai Data (Kanan) */
            .report-table td {
                text-align: right;
                padding: 16px 24px;
                font-size: 16px;
                font-weight: 700;
                color: #0f766e;
                background-color: #f0fdfa; /* Tint warna emerald super soft */
                width: 35%;
            }

            /* Efek Baris Alternatif untuk Estetika Berkelas */
            .report-table tr:nth-child(even) th {
                background-color: #f1f5f9;
                border-left: 4px solid #10b981; /* Variasi aksen hijau emerald terang */
            }

            .report-table tr:nth-child(even) td {
                background-color: #ccfbf1;
                color: #115e59;
            }
        </style>
    </head>
    <body>
        <!-- Header Laporan -->
        <div class="header-container">
            <h1 class="report-title">Laporan Konsolidasi Program Masjid</h1>
            <p class="report-subtitle">
                Ringkasan Eksekutif Data Statistik Integrasi Wilayah dan
                Operasional
            </p>
        </div>

        <!-- Meta Informasi Dokumen -->
        <p class="meta-info">
            Dibuat Otomatis Sistem &bull; Tanggal Cetak:
            {{ now()->format('d-m-Y H:i') }} WIB
        </p>

        <!-- Tabel Ringkasan Komponen Dashboard -->
        <table class="report-table">
            <tbody>
                <tr>
                    <th>Total Cakupan Daerah</th>
                    <td>{{ $totalDaerah }}</td>
                </tr>

                <tr>
                    <th>Total Masjid Binaan</th>
                    <td>{{ $totalMasjid }}</td>
                </tr>

                <tr>
                    <th>Total Kelas Aktif</th>
                    <td>{{ $totalKelas }}</td>
                </tr>

                <tr>
                    <th>Total Murid Terdaftar</th>
                    <td>{{ $totalMurid }}</td>
                </tr>

                <tr>
                    <th>Total Tenaga Pengajar</th>
                    <td>{{ $totalPengajar }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
