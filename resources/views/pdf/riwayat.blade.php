@php
use Carbon\Carbon;

// Misalnya $pemeriksaan->created_at adalah timestamp
$timestamp = $pemeriksaan->vital_sign->waktu_pengukuran; // Contoh: '2024-12-17 14:35:22'

// Memisahkan tanggal dan waktu
$tanggal = Carbon::parse($timestamp)->toDateString(); // '2024-12-17'
$waktu = Carbon::parse($timestamp)->toTimeString(); // '14:35:22'
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kop Surat</title>
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

        .dashed {
            border-bottom: 1px dashed black;
            margin-top: 20px;
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

        .container-table table {
            float: left;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <!-- Logo (Opsional) -->
        <img src="logo.png" alt="Logo Perusahaan/Instansi">

        <!-- Nama Instansi/Perusahaan -->
        <h1>iHealth</h1>

        <!-- Alamat -->
        <p>Jl. Contoh Alamat No.123, Kota, Provinsi, Kode Pos</p>

        <!-- Kontak -->
        <p>Telepon: (021) 12345678 | Email: info@instansi.com | Website: www.instansi.com</p>
    </div>

    <div class="content">
        <h3>Identitas Pasien</h3>
        <table>
            <tbody>
                <tr>
                    <td>Nama </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->pasien->nama }}</td>
                </tr>
                <tr>
                    <td>NIK </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->pasien->nik }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->pasien->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Usia </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->pasien->usia }} tahun</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->pasien->alamat }}</td>
                </tr>
                <tr>
                    <td>Keluhan </td>
                    <td>&nbsp;&nbsp;{{ $riwayatPenyakit->keluhan }}</td>
                </tr>
            </tbody>
        </table>
        <div class="dashed"></div>
        <h3>Pemeriksa</h3>
        <table>
            <tbody>
                <tr>
                    <td>Nama Dokter</td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->dokter->nama_dokter }}</td>
                </tr>
                <tr>
                    <td>No Tlp Dokter </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->dokter->no_telepon_dokter }}</td>
                </tr>
                <tr>
                    <td>Spesialisasi </td>
                    <td>&nbsp;&nbsp;{{ $pemeriksaan->dokter->spesialisasi }}</td>
                </tr>
            </tbody>
        </table>
        <div class="dashed"></div>
        <h3>Hasil Pemeriksaan</h3>
        <div class="container-table">
            <table>
                <tbody>
                    <tr>
                        <td>Kode ICD</td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->diagnosa->kode_icd }}</td>
                    </tr>
                    <tr>
                        <td>Saturasi Oksigen</td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->saturasi_oksigen }}</td>
                    </tr>
                    <tr>
                        <td>Detak Jantung </td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->detak_jantung }}</td>
                    </tr>
                    <tr>
                        <td>Suhu Badan </td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->suhu_badan }}</td>
                    </tr>
                    <tr>
                        <td>Tekanan Darah Sistol </td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->tekanan_darah_sistol }}</td>
                    </tr>
                    <tr>
                        <td>Tekanan Darah Diastol </td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->tekanan_darah_diastol }}</td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-left: 90px">
                <tbody>
                    <tr>
                        <td>Deskripsi</td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->diagnosa->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Rekomendasi</td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->diagnosa->rekomendasi }}</td>
                    </tr>
                    <tr>
                        <td>Catatan</td>
                        <td>&nbsp;&nbsp;{{ $pemeriksaan->catatan }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>&nbsp;&nbsp;{{ $riwayatPenyakit->status }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Pengukuran</td>
                        <td>&nbsp;&nbsp;{{ $waktu }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengukuran</td>
                        <td>&nbsp;&nbsp;{{ $tanggal }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>