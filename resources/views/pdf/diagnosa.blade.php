<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Diagnosa</title>
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

        /* Kode ini memastikan bahwa elemen dengan kelas clearfix akan memulai posisi barunya setelah semua elemen dengan float selesai,
        menghindari konflik layout atau tumpang tindih antara elemen yang melayang.  */
        .container-table .clearfix {
            clear: both;
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
        <h3>Identitas Pasien</h3>
        <div class="container-table">
            <table>
                <tbody>
                    <tr>
                        <td>Nama </td>
                        <td>&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->pasien->nama }}</td>
                    </tr>
                    <tr>
                        <td>NIK </td>
                        <td>&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->pasien->nik }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin </td>
                        <td>&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->pasien->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Usia </td>
                        <td>&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->pasien->usia }} tahun</td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-left: 140px; margin-top: -60px;">
                <h3>Pemeriksa</h3>
                <tbody>
                    <tr>
                        <td>Nama Dokter</td>
                        <td>&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->dokter->nama_dokter }}</td>
                    </tr>
                    <tr>
                        <td>No Tlp Dokter </td>
                        <td>&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->dokter->no_telepon_dokter }}</td>
                    </tr>
                    <tr>
                        <td>Spesialisasi </td>
                        <td style="max-width:100px;">&nbsp;&nbsp;:&nbsp;{{ $pemeriksaan->dokter->spesialisasi }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Fungsi clearfix untuk menghilangkan efek float: left, supaya teks tidak meneruskan ke kiri --}}
            <div class="clearfix"></div>
        </div>
    </div>
    <table>
        <tbody>
            <tr>
                <td>Alamat </td>
                <td style="padding-left: 50px;">:&nbsp;{{ $pemeriksaan->pasien->alamat }}</td>
            </tr>
            <tr>
                <td>Keluhan </td>
                <td style="padding-left: 50px;">:&nbsp;{{ $riwayatPenyakit->keluhan }}</td>
            </tr>
        </tbody>
    </table>
    <div class="dashed"></div>
    <div class="content">
        <div class="container-table">
            <h3>Hasil Pemeriksaan</h3>
            <table>
                <tbody>
                    <tr>
                        <td>Kode ICD</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->diagnosa->kode_icd }}</td>
                    </tr>
                    <tr>
                        <td>Saturasi Oksigen</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->saturasi_oksigen }} %</td>
                    </tr>
                    <tr>
                        <td>Detak Jantung </td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->detak_jantung }} Bpm</td>
                    </tr>
                    <tr>
                        <td>Suhu Badan </td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->suhu_badan }} °C</td>
                    </tr>
                    <tr>
                        <td>Berat Badan </td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->berat_badan }} kg</td>
                    </tr>
                    <tr>
                        <td>Tekanan Darah Sistol </td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->tekanan_darah_sistol }} mmHg</td>
                    </tr>
                    <tr>
                        <td>Tekanan Darah Diastol </td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->vital_sign->tekanan_darah_diastol }} mmHg</td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-left: 50px">
                <tbody>
                    <tr>
                        <td>Status</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $riwayatPenyakit->status }}</td>
                    </tr>
                    <tr>
                        <td>Jam Pengukuran</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $waktu }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengukuran</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $tanggal }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Fungsi clearfix untuk menghilangkan efek float: left, supaya teks tidak meneruskan ke kiri --}}
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content">
        <table>
            <tbody>
                <tr>
                    <td>Deskripsi</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->diagnosa->deskripsi }}</td>
                </tr>
                <tr>
                    <td>Rekomendasi</td>
                    <td style="word-wrap: break-word; max-width: 350px">&nbsp;&nbsp;:&nbsp;&nbsp;{{
                        $pemeriksaan->diagnosa->rekomendasi }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td style="word-wrap: break-word; max-width: 350px">&nbsp;&nbsp;:&nbsp;&nbsp;{{
                        $pemeriksaan->catatan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="content">
        <div class="container-table">
            <table>
                <tbody>
                    <tr>
                        <td>Nama Obat</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->resep->obat->nama_obat }}</td>
                    </tr>
                    <tr>
                        <td>Kategori Obat</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->resep->obat->kategori_obat->nama_kategori }}
                        </td>
                    </tr>
                    <tr>
                        <td>Dosis Obat</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->resep->obat->dosis_tersedia }} mg</td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-left: 95px">
                <tbody>
                    <tr>
                        <td>Unit Obat</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->resep->obat->unit }} unit</td>
                    </tr>
                    <tr>
                        <td>Frekuensi</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->resep->frekuensi }}</td>
                    </tr>
                    <tr>
                        <td>Durasi Hari</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;{{ $pemeriksaan->resep->durasi_hari }} kali dalam sehari</td>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix"></div>
        </div>
        <table>
            <tbody>
                <tr>
                    <td>Cara Penggunaan</td>
                    {{-- menggunakan nl2br() untuk mengganti newline menjadi <br> agar formatnya tetap rapi: --}}
                    <td style="padding-left: 20px;">:&nbsp;{!! nl2br(e($pemeriksaan->resep->cara_penggunaan)) !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="content" style="margin-left: 2px;">
        <span>Hasil pemeriksaan menunjukkan bahwa <strong>{{ $pemeriksaan->diagnosa->rekomendasi }}<strong></span>
    </div>
    </div>
</body>

</html>