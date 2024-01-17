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
                <td rowspan="7" style="width: 15%;padding-left:5px;padding-top:-18px;">
                    <img src="../assets/img/logo-jakarta-raya.jpeg" alt="unindra" width="120" height="125">
                </td>
                <td style="text-align:center;">
                    PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA <br> DINAS PENDIDIKAN <br> <b style="font-size:18px;">SMP NEGERI 223 JAKARTA</b> <br> Jl. Surilang No. 6 Kel. Gedong Kec. Pasar Rebo <br> Telepon (021) 8403316 Faximile (021) 8403316 <br> E-mail : smpn223jktm@gmail.com <br> JAKARTA
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">
                    Kode Pos : 13760
                </td>
            </tr>
        </table>

        <hr style="margin-top:2px;height:6px;color:solid black;">
    ');

    $mpdf->AddPage('P', '', '', '', '', 23, 26, 53, 12, 3, 5);

    $query = mysqli_query($konek,"SELECT a.*, b.* FROM surat_permohonan a
    LEFT JOIN guru b ON a.atas_nama = b.id
    WHERE a.id = '$id'");
    $getdata = mysqli_fetch_array($query);

    $tbl .= '<table width="100%" style="font-family: Arial;margin-bottom:15px;font-size:16px;">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>:</td>
                <td>'.$getdata['no_surat'].'</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>'.tgl3($getdata['tgl_surat']).'</td>
            </tr>
            <tr>
                <td>Sifat</td>
                <td>:</td>
                <td>'.$getdata['sifat'].'</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>'.$getdata['lampiran'].'</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>'.$getdata['perihal'].'</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Kepada</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="padding-top:-54px;">Yth.</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="width:180px;">'.$getdata['kepada'].'</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<p style="font-family: Arial;text-align: justify;text-indent: 4.5em;margin-bottom:20px;padding-left:1.5em;font-size:16px;">'.$getdata['keterangan'].'</p>';


    $tgl_pensiun = ($getdata['pensiun'] != '') ? tgl3($getdata['pensiun']) : 'Silahkan update tgl pensiun di master data guru terlebih dahulu';
    if ($getdata['jenis_permohonan'] == 'pensiun') {
        $pensiun = '
        <tr>
            <td>TMT Pensiun</td>
            <td>:</td>
            <td>'.$tgl_pensiun.'</td>
        </tr>
        ';
    }else {
        $pensiun = '';
    }

    $tbl .= '<table width="78%" style="font-family: Arial;margin-bottom:50px;padding-left:10em;">
    <thead>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>'.$getdata['nama'].'</td>
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
        <tr>
            <td>Tempat Tugas</td>
            <td>:</td>
            <td>SMP Negeri 223 Jakarta</td>
        </tr>
        '.$pensiun.'
    </thead>
    </table>';


    $tbl .= '<p style="font-family: Arial;text-align: justify;text-indent: 4.5em;padding-left:1.5em;font-size:16px;margin-bottom:50px;">Demikian atas perhatian Bapak di ucapkan terima kasih.</p>';
    
    
    $tbl .= '<table width="45%" align="right" style="font-family: Arial;margin-bottom:80px;text-align:center;">
        <thead>
            <tr>
                <td>Kepala SMP Negeri 223 Jakarta</td>
            </tr>
        </thead>
        </table>';

    $tbl .= '<table width="45%" align="right" style="font-family: Arial;text-align:center;">
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
