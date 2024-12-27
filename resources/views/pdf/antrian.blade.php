<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .center {
        text-align: center;
    }
</style>

<body>
    <h1 class="center">Pengajuan Antrian Online</h1>
    <span>Data pengajuan antrian online anda sebagai berikut:</span>
    <ul>
        <li>Nama Pasien &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{
            $riwayatPenyakit->pasien->nama }}
        </li>
        <li>Keluhan Pasien &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $riwayatPenyakit->keluhan }}
        </li>
        <li>Jam Pendaftaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $jam }}</li>
        <li>Tanggal Pendaftaran &nbsp;&nbsp;: {{ $tanggal }}</li>
        <li>Antrian
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
            Ke- {{ $jumlahAntrian }}</li>
    </ul>
    <span>Saudara/i dimohon untuk hadir pada pukul <strong>{{ $tambahTigaJam }}</strong> untuk melakukan pemeriksaan.
    </span><br><br>
    <span>Terimakasih telah menggunakan layanan antrian online Health Medical Clinic. </span>
</body>

</html>