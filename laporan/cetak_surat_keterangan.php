<?php 
    require_once('../proses/koneksi.php');
    require_once('../laporan/fungsi.php');
    $id = $_GET['id'];

    // Include mpdf library file
    require_once('../vendor/autoload.php');
    date_default_timezone_set('Asia/Jakarta');
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->SetHTMLHeader('
        <table style="width: 100%;font-family: Arial;">
            <tr>
                <td rowspan="7" style="width: 15%;padding-left:3px;padding-top:-17px;">
                    <img src="../assets/img/logo-jakarta-raya.jpeg" alt="unindra" width="120" height="125">
                </td>
                <td style="text-align:center;">
                    <p style="font-size:16px;">PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA <br> DINAS PENDIDIKAN </p> <b style="font-size:18px;">SMP NEGERI 223 JAKARTA</b> <br> <p style="font-size:15px;">Jl. Surilang No. 6 Kel. Gedong Kec. Pasar Rebo <br> Telepon (021) 8403316 Faximile (021) 8403316</p> E-mail : smpn223jktm@gmail.com <br> JAKARTA
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">
                    Kode Pos : 13760
                </td>
            </tr>
        </table>

        <hr style="margin-top:-2px;height:3px;">
    ');

    $mpdf->AddPage('P', '', '', '', '', 17, 14, 53, 12, 3, 5);

    $query = mysqli_query($konek,"SELECT a.*, b.nama as nama_guru, b.nip, b.nrk, b.pangkat, b.golongan, b.jabatan, 
    c.nama as nama_siswa, c.tempat_lahir, c.tgl_lahir, c.nipd, c.nisn
    FROM surat_keterangan a
    LEFT JOIN guru b ON a.id_guru = b.id
    LEFT JOIN siswa c ON a.id_siswa = c.id
    WHERE a.id = '$id'");
    $getdata = mysqli_fetch_array($query);

    $tbl = '<table width="100%" style="margin-bottom:40px;font-family: Arial;">
        <thead>
            <tr>
                <th style="text-align:center;font-size:20px;">SURAT KETERANGAN</th>
            </tr>
            <tr>
                <td style="text-align:center;font-size:17.5px;">NOMOR : '.$getdata['nomor_surat'].'</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="100%" style="font-family: Arial;margin-bottom:15px;">
        <thead>
            <tr>
                <td style="padding-left:3em;">Yang bertanda tangan dibawah ini : </td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="62%" style="font-family: Arial;margin-bottom:15px;">
        <thead>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>'.$getdata['nama_guru'].'</td>
            </tr>
            <tr>
                <td>NIP / NRK</td>
                <td>:</td>
                <td>'.$getdata['nip'].'/'.$getdata['nrk'].'</td>
            </tr>
            <tr>
                <td>Pangkat / Golongan</td>
                <td>:</td>
                <td>'.$getdata['pangkat'].'/ ('.$getdata['golongan'].')</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>'.$getdata['jabatan'].'</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="100%" style="font-family: Arial;margin-bottom:15px;">
        <thead>
            <tr>
                <td style="padding-left:3em;">menerangkan dengan sesungguhnya bahwa : </td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="55%" style="font-family: Arial;margin-bottom:15px;">
        <thead>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>'.$getdata['nama_siswa'].'</td>
            </tr>
            <tr>
                <td>TEMPAT/TANGGAL LAHIR</td>
                <td>:</td>
                <td>'.$getdata['tempat_lahir'].', '.tgl3($getdata['tgl_lahir']).'</td>
            </tr>
            <tr>
                <td>NIS/NISN</td>
                <td>:</td>
                <td>'.$getdata['nipd'].'/'.$getdata['nisn'].'</td>
            </tr>
            <tr>
                <td>Sekolah</td>
                <td>:</td>
                <td>SMP Negeri 223 Jakarta</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<p style="font-family: Arial;text-align: justify;text-indent: 3em;margin-bottom:30px;">'.$getdata['keterangan'].'</p>';

    $tbl .= '<p style="font-family: Arial;text-align: justify;text-indent: 3em;">Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>';

    $tbl .= '<table width="45%" align="right" style="font-family: Arial;margin-bottom:80px;">
        <thead>
            <tr>
                <td>Jakarta, '.tgl3($getdata['tgl_surat']).'</td>
            </tr>
            <tr>
                <td>Kepala SMP Negeri 223 Jakarta</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="45%" align="right" style="font-family: Arial;">
        <thead>
            <tr>
                <td>OMAN NURYANI, M.Pd.</td>
            </tr>
            <tr>
                <td>NIP. 196807191997031003</td>
            </tr>
        </thead>
        </table>';

    $mpdf->WriteHTML($tbl);

    // Output as a downloadable PDF file
    $mpdf->Output();
?>
