<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Pernyataan</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            margin: 0;
            padding: 25px;
            line-height: 1.6;
        }

        .container {
            width: 100%;
        }

        .header {
            text-align: center;
            position: relative;
        }

        .logo-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 90px;
        }

        .logo-container img {
            width: 80px;
        }

        .header-content {
            margin-left: 100px;
        }

        .header h1 {
            font-size: 16px;
            margin: 0;
            font-weight: bold;
        }

        .header h2 {
            font-size: 14px;
            margin: 0;
            font-weight: bold;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        .line {
            border-top: 3px solid black;
            border-bottom: 1px solid black;
            margin: 10px 0 20px 0;
            height: 3px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .content {
            text-align: justify;
        }

        .identitas {
            margin: 10px 0 20px 0;
        }

        .identitas table {
            width: 100%;
        }

        .identitas td {
            padding: 2px 5px;
        }

        .list {
            margin-left: 20px;
        }

        .list ol {
            padding-left: 20px;
        }

        .ttd {
            width: 250px;
            float: right;
            text-align: center;
            margin-top: 30px;
        }

        .materai {
            border: 1px solid black;
            width: 120px;
            height: 80px;
            margin: 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-style: italic;
        }

        .nama {
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">

            <div class="logo-container">
                @if(file_exists(base_path('public/logo/kapuas.png')))
                <img src="{{ base_path('public/logo/kapuas.png') }}">
                @endif
            </div>

            <div class="header-content">
                <h1>PEMERINTAH KABUPATEN KAPUAS</h1>
                <h2>DINAS SOSIAL</h2>
                <p>Jalan Patih Rumbih Nomor 21 Kode Pos 73500</p>
                <h2>K U A L A &nbsp; K A P U A S</h2>
                <p><b>Website : dissos.kapuaskab.go.id E-mail : dissos@kapuaskab.go.id</b></p>
            </div>

        </div>

        <div class="line"></div>

        <!-- JUDUL -->
        <div class="judul">
            SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK
        </div>

        <!-- ISI -->
        <div class="content">

            <p>Yang bertandatangan dibawah ini :</p>

            <div class="identitas">
                <table>
                    <tr>
                        <td width="120">Nama</td>
                        <td width="10">:</td>
                        <td>{{ $nama ?? '........................................' }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{ $nik ?? '........................................' }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $alamat ?? '........................................' }}</td>
                    </tr>
                </table>
            </div>

            <p>
                Sesuai Peraturan Bupati Kapuas Nomor : {{ $nomor ?? '...' }} tanggal
                {{ $tanggal ?? '...' }} tentang Pemberian Bantuan Usaha Ekonomi Produktif
                Tahun Anggaran {{ $tahun ?? '...' }}. Dengan ini menyatakan :
            </p>

            <div class="list">
                <ol>
                    <li>
                        Bahwa saya bertanggungjawab mutlak terhadap kebenaran permohonan
                        dan penggunaan bantuan modal usaha diatas, serta menggunakan
                        bantuan tersebut sesuai peruntukannya;
                    </li>
                    <li>
                        Apabila dikemudian hari diketahui terjadi penyimpangan terhadap
                        penggunaan bantuan tersebut, sehingga menimbulkan kerugian
                        negara/daerah, maka saya bersedia mengganti dan menyetorkan
                        kerugian tersebut ke Kas Daerah dan bersedia dituntut sesuai
                        peraturan perundang-undangan.
                    </li>
                </ol>
            </div>

            <p>
                Demikian pernyataan ini dibuat dengan sebenarnya, untuk dapat dipergunakan
                sebagaimana mestinya.
            </p>

        </div>

        <!-- TTD -->
        <div class="ttd">
            <p>Kuala Kapuas, {{ $date ?? '..................' }}</p>
            <p>Yang Menyatakan</p>

            <div class="materai">
                Materai 10.000
            </div>

            <div class="nama">
                <b>{{ $nama ?? '( Nama Lengkap )' }}</b><br>
                Penerima Bantuan
            </div>
        </div>

    </div>

</body>

</html>