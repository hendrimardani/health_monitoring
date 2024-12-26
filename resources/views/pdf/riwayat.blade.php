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
        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop-surat img {
            max-width: 100px;
            height: auto;
        }

        .kop-surat h1 {
            font-size: 18px;
            margin: 0;
        }

        .kop-surat h2 {
            font-size: 16px;
            margin: 5px 0;
        }

        .kop-surat p {
            font-size: 14px;
            margin: 5px 0;
        }

        .content {
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
        }

        table th {
            padding: 5px;
        }

        table td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <!-- Logo (Opsional) -->
        {{-- <img src="{{ $image }}" alt=""> --}}

        <!-- Nama Instansi/Perusahaan -->
        <h1>iHealth</h1>

        <!-- Alamat -->
        <p> Jalan Kesehatan No.2, Jakarta, Indonesia</p>

        <!-- Kontak -->
        <p>Telepon: (021) 12345678 | Email: support@ihealth.com | Website: www.iHealth.com</p>
    </div>
    <div class="content">
        <p>Berikut adalah riwayat keluhan dan pemeriksaan medis yang telah dilakukan atas nama pasien <strong>{{
                $namaPasien->nama }}</strong>. Pemeriksaan ini dilakukan pada <strong>{{ $tanggalOld }}</strong>
            sampai
            <strong>{{ $tanggalLatest }}</strong>.
            Harap diperhatikan bahwa hasil ini merupakan catatan kesehatan Anda selama berada di fasilitas kami.
        </p>
        <h3>Riwayat Keluhan Anda</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keluhan</th>
                    <th>Jam Pemeriksaan</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Dokter Pemeriksa</th>
                    <th>No Telepon Dokter</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayatPenyakits as $riwayatPenyakit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="max-width: 300px; word-wrap: break-word; word-break: break-word; white-space: normal;">
                        {{
                        $riwayatPenyakit->keluhan }}</td>
                    {{-- Konversi ke Jam --}}
                    <td>{{ Carbon::parse($riwayatPenyakit->pemeriksaan->vital_sign->waktu_pengukuran)->toTimeString() }}
                    </td>
                    {{-- Konversi ke Tanggal --}}
                    <td>{{ Carbon::parse($riwayatPenyakit->pemeriksaan->vital_sign->waktu_pengukuran)->toDateString() }}
                    </td>
                    <td>{{ $riwayatPenyakit->pemeriksaan->dokter->nama_dokter }}</td>
                    <td>{{ $riwayatPenyakit->pemeriksaan->dokter->no_telepon_dokter }}</td>
                    <td>{{ $riwayatPenyakit->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Untuk
            informasi lebih lanjut, silakan hubungi dokter yang bersangkutan. Pastikan Anda selalu menjaga pola hidup
            sehat!</p>
    </div>
</body>

</html>