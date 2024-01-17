<?php 
    require_once('../proses/koneksi.php');
    require_once('../laporan/fungsi.php');
    $id = $_GET['id'];

    // Include mpdf library file
    require_once('../vendor/autoload.php');
    date_default_timezone_set('Asia/Jakarta');
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->SetHTMLHeader('
        <table align="center">
            <tr>
                <td>
                    <img src="../assets/img/logo-jakarta-raya.jpeg" width="85" height="100">
                </td>
            </tr>
        </table>
    ');

    $mpdf->AddPage('P', '', '', '', '', 18, 26, 35, 12, 5, 5);

    $query = mysqli_query($konek,"SELECT a.*, b.nama, DAYNAME(a.tgl_surat) as hari, b.nip, b.nik, b.jabatan FROM surat_tugas a
    LEFT JOIN guru b ON a.id_guru = b.id
    WHERE a.id = '$id'");
    $getdata = mysqli_fetch_array($query);

    $tbl = '
    <table style="width:100%;text-align:center;font-size:17px;margin-bottom:20px;">
        <tr>
            <td><b>SEKOLAH MENENGAH PERTAMA NEGERI 223 JAKARTA</b><br><b>DINAS PENDIDIKAN PROVINSI DKI JAKARTA</b></td>
        </tr>
    </table>
    ';

    $tbl .= '<table style="width:100%;text-align:center;font-size:19px;margin-top:10px;">
        <tr>
            <td>SURAT TUGAS<br>Nomor : '.$getdata['nomor_surat'].'</td>
        </tr>
    </table>';

    $tbl .= '<table style="width:100%;text-align:center;font-size:19px;margin-top:10px;">
        <tr>
            <td>TENTANG<br>'.strtoupper($getdata['tentang_surat']).'</td>
        </tr>
    </table>';

    $tbl .= '<p style="text-align: justify;text-indent: 6em;font-size:16px;">Yang bertanda tangan dibawah ini kepala SMP Negeri 223 Jakarta, dengan ini :</p>';
    
    $tbl .= '<p style="text-align: center;font-size:16px;">MENUGASKAN : </p>';

    $tbl .= '<p style="font-size:16px;">Kepada : </p>';

    $tbl .= '<table width="66%" style="padding-left:6em;font-size:16px;padding-top:-10px;">
    <thead>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>'.$getdata['nama'].'</td>
        </tr>
        <tr>
            <td>NIKKI</td>
            <td>:</td>
            <td>'.$getdata['nip'].'/'.$getdata['nrk'].'</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>'.$getdata['jabatan'].'</td>
        </tr>
        <tr>
            <td width="120px">Tempat Tugas</td>
            <td>:</td>
            <td>SMP Negeri 223 Jakarta</td>
        </tr>
    </thead>
    </table>';

    $tbl .= '<p style="font-size:16px;padding-top:-15px;">Untuk : </p>';

    $tbl .= '<table width="100%" style="padding-left:1.5em;font-size:16px;text-align: justify;vertical-align:top;">
    <thead>
        <tr>
            <td>1. &nbsp;</td>
            <td>'.$getdata['keterangan'].'</td>
        </tr>
    </thead>
    </table>';

    $tbl .= '<table width="100%" style="padding-left:6em;font-size:16px;vertical-align:top;">
    <thead>
        <tr>
            <td>Hari</td>
            <td>:</td>
            <td>'.gethari_lengkap($getdata['hari']).'</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>'.tgl3($getdata['tgl_surat']).'</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>'.$getdata['waktu_tugas'].'</td>
        </tr>
        <tr>    
            <td width="120px">Tempat</td>
            <td>:</td>
            <td>'.$getdata['tempat_tugas'].'</td>
        </tr>
    </thead>
    </table>';

    $tbl .= '<table width="100%" style="padding-left:1.5em;font-size:16px;text-align: justify;vertical-align:top;">
    <thead>
        <tr>
            <td>2. &nbsp;</td>
            <td>'.$getdata['keterangan2'].'</td>
        </tr>
    </thead>
    </table>';

    $tbl .= '<p style="text-align: justify;text-indent: 6em;font-size:16px;">Surat Tugas ini dibuat untuk dilaksanakan dengan sebaik-baiknya dan penuh tanggung jawab.</p>';

    $tbl .= '<table width="50%" align="right" style="margin-bottom:80px;font-size:16px;">
        <thead>
            <tr>
                <td>Dikeluarkan di Jakarta <br> pada tanggal '.tgl3($getdata['tgl_surat']).'</td>
            </tr>
            <tr>
                <td>Kepala SMP Negeri 223 Jakarta</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="50%" align="right" style="font-size:16px;">
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
