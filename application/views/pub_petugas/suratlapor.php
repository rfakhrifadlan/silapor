<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/suratlapor.css') ?>">
    <!-- <link href=<?= base_url('assets/css/sb-admin-2.min.css') ?> rel="stylesheet"> -->
    <title>Surat Lapor</title>
</head>

<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <div class="heading">
                    <img src="<?= base_url('assets/img/lambang.png') ?>" alt="lambang" id="lambang">
                    <h4>KEPOLISIAN DAERAH ISTIMEWA YOGYAKARTA <br> RESOR KOTA YOGYAKARTA <br>SEKTOR PAKUALAMAN</h4>
                    <span>Jalan Purwanggan No. 53 Yogyakarta 55112 Telp.(0274)513178</span>
                </div>
                <div class="badan">
                    <div class="kop">
                        <span>SURAT KETERANGAN TANDA LAPOR <?= strtoupper($ds['nama_berkas']) ?></span><br>
                        <span>Nomor: <?= $ds['id_sttlp'] . '/' . $ds['no_lp'] . '/' . $ds['bulanlap'] . '/' . $ds['tahunlap'] . '/SPKT/DIY/SEK-PA' ?></span>
                    </div>
                    <div class="isi-surat">
                        <span>Yang bertanda tangan di bawah ini Kepada Kepolisian Sektor Pakualaman Yogyakarta, menerangkan bahwa pada tanggal <?= $ds['tgllap'] ?> tahun <?= $ds['tahunlap'] ?>, pukul <?= $ds['jamlap'] ?> wib, telah dilampirkan sebuah surat pelaporan dari pelapor yang mengaku beridentitas:</span>
                        <table class="tableidentitas">
                            <tr>
                                <td width="130">Nama</td>
                                <td>: </td>
                                <td><?= $ds['namapelapor'] ?></td>
                            </tr>
                            <tr>
                                <td width="130">Jenis Kelamin</td>
                                <td>: </td>
                                <td><?= $ds['jk'] ?></td>
                            </tr>
                            <tr>
                                <td width="130">Alamat</td>
                                <td>: </td>
                                <td><?= $ds['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td width="130">Email</td>
                                <td>: </td>
                                <td><?= $ds['email'] ?></td>
                            </tr>
                            <tr>
                                <td width="130">Nomor Telepon</td>
                                <td>: </td>
                                <td><?= $ds['notelp'] ?></td>
                            </tr>
                        </table>
                        <span>Melaporkan bahwa terjadi suatu perkara, sebagaimana keterangan: <?= $ds['keterangan'] ?> Terjadi pada tanggal <?= $ds['tgl_kejadian'] ?> beralamatkan di <?= $ds['tempat_kejadian'] ?>. Berdasarkan keterangan tersebut, telah diterima sebuah laporan dan diketahui di wilayah hukum Polsek Pakualaman Yogyakarta, Sehingga betul adanya surat ini dilaporkan oleh identitas yang bernama: <?= $ds['namapelapor'] ?> Demikian Surat Keterangan Tanda Lapor <b> <?= $ds['nama_berkas'] ?> </b>ini dibuat agar dapat dipergunakan seperlunya.</span>
                    </div>
                </div>
                <div class="footer-page">
                    <div class="row-date">
                        <div class="col-date">
                            <div id="waktutgl">Yogyakarta, <?= $datenow['hari'] . ' ' . $datenow['bulan'] . ' ' . $datenow['tahun'] ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="ttd">
                                <div>PELAPOR</div>
                                <div id="nama-pelapor"><?= strtoupper($ds['namapelapor']) ?></div>
                                <!-- <div id="nama-pelapor">SIGIT ARIYANTO ADI,S,ST,.M.M</div> -->
                                <!-- <div>KOMISARIS POLISI NRP 76120071</div> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="ttd">
                                <div>MENGETAHUI <br>PETUGAS SEKTOR PAKUALAMAN</div>
                                <div id="nama-kapolsek"><?= strtoupper($ds['namapetugas']) ?></div>
                                <div>ANGGOTA POLISI NRP <?= $ds['id_petugas'] ?></div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <div class="catatan">
                    <span><b>Catatan:</b></span>
                    <ul>
                        <li>Surat Keterangan Tanda Lapor <?= ($ds['nama_berkas'] == 'kehilangan') ? 'Kehilangan ini <b>Bukan Pengganti</b> barang berharga/surat yang hilang' : $ds['nama_berkas'] . ' ini <b>Bukan Permintaan</b> ganti rugi kepada kepolisian' ?>, melainkan untuk mengurus surat yang baru.</li>
                        <li>Surat ini berlaku selama <b>14 (Empat Belas)</b> hari sejak tanggal dikeluarkan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src=<?= base_url('assets/js/jquery-3.5.1.min.js') ?>></script>
    <script>
        window.print();
    </script>
</body>

</html>