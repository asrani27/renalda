<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Penerima Bantuan</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 80px;
            height: 120px;
        }

        .logo-container img {
            width: 100%;
            height: auto;
            max-height: 100px;
        }

        .header-content {
            margin-left: 100px;
        }

        .header h1 {
            font-size: 16px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 14px;
            font-weight: bold;
            margin: 1px 0;
            text-transform: uppercase;
        }

        .header p {
            font-size: 11px;
            margin: 2px 0;
        }

        .line {
            border-top: 3px solid black;
            margin: 10px 0 20px 0;
            border-bottom: 1px solid black;
            padding-bottom: 5px;
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul h4 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
            text-decoration: underline;
        }

        .info-table {
            width: 100%;
            margin-bottom: 15px;
        }

        .info-table td {
            padding: 3px 10px;
            font-size: 12px;
        }

        .summary {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid black;
        }

        .summary table {
            width: 100%;
        }

        .summary td {
            padding: 5px;
            border: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
            font-size: 11px;
        }

        table th {
            font-weight: bold;
            font-size: 11px;
            text-align: center;
            background-color: #f0f0f0;
        }

        table td:nth-child(1),
        table td:nth-child(6),
        table td:nth-child(7) {
            text-align: center;
        }

        table td:nth-child(5) {
            text-align: right;
        }

        .ttd {
            width: 300px;
            float: right;
            margin-top: 20px;
            text-align: center;
        }

        .ttd p {
            margin: 3px 0;
            font-size: 12px;
        }

        .ttd .nama {
            margin-top: 50px;
            font-weight: bold;
            text-decoration: underline;
        }

        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #000;
            font-size: 10px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <div class="logo-container">
                @if(file_exists(base_path('public/logo/kapuas.png')))
                <img src="{{ base_path('public/logo/kapuas.png') }}" width="80px" alt="Logo">
                @else
                <div
                    style="width: 80px; height: 80px; background: #009639; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 18px; text-align: center;">

                </div>
                @endif
            </div>
            <div class="header-content">
                <h1>PEMERINTAH KABUPATEN KAPUAS</h1>
                <h2>DINAS SOSIAL</h2>
                <p>Jl. Patih Rumbih No 21 Kodepos 71500</p>
                <h2>KUALA KAPUAS</h2>
                <p>website : dissos.kapuaskab.go.id Email : dissos@kapuaskab.go.id</p>
            </div>

        </div>

        <div class="line"></div>

        <div class="judul">
            <h4>LAPORAN PENERIMA BANTUAN PERIODE {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }} - {{
                \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y') }}</h4>
        </div>

        <table class="info-table">
            <tr>
                <td width="150">Periode Laporan</td>
                <td>: {{ \Carbon\Carbon::parse($tanggalMulai)->format('d F Y') }} s/d {{
                    \Carbon\Carbon::parse($tanggalSelesai)->format('d F Y') }}</td>
            </tr>
            <tr>
                <td>Tanggal Cetak</td>
                <td>: {{ \Carbon\Carbon::now()->format('d F Y') }}</td>
            </tr>
        </table>

        <div class="summary">
            <table>
                <tr>
                    <td width="200"><strong>Total Penerima</strong></td>
                    <td>: {{ $totalPenerima }} orang</td>
                </tr>
                <tr>
                    <td><strong>Total Nilai Bantuan</strong></td>
                    <td>: Rp {{ number_format($totalBantuan, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penerima</th>
                    <th>NIK</th>
                    <th>Usaha</th>
                    <th>Jenis Bantuan</th>
                    <th>Nilai Bantuan</th>
                    <th>Tgl Penyaluran</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($penerima as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->calonPenerima ? $item->calonPenerima->nama : '-' }}</td>
                    <td>{{ $item->calonPenerima ? $item->calonPenerima->nik : '-' }}</td>
                    <td>{{ $item->calonPenerima ? $item->calonPenerima->usaha : '-' }}</td>
                    <td>{{ $item->bantuan ? $item->bantuan->nama : '-' }}</td>
                    <td>{{ $item->bantuan ? number_format($item->bantuan->nilai, 0, ',', '.') : '-' }}</td>
                    <td>
                        @if($item->penyaluranBantuan->isNotEmpty())
                        {{ $item->penyaluranBantuan->first()->tanggal->format('d/m/Y') }}
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $item->status_penerima ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 20px;">Tidak ada data penyaluran</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="ttd">
            <p>Kuala Kapuas, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Kepala Dinas Sosial</p>

            <p class="nama">Nama Kepala Dinas Sosial</p>
            <p>NIP. 19800101 200501 1 001</p>
        </div>


    </div>

</body>

</html>