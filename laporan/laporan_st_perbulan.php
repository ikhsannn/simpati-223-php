<?php 
    require_once('../proses/koneksi.php');
    require_once('../laporan/fungsi.php');
    $bulan = $_GET['bulan'];

    // Include mpdf library file
    require_once('../vendor/autoload.php');
    date_default_timezone_set('Asia/Jakarta');
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->SetHTMLHeader('
        <table width="100%" style="text-align:center;" >
            <tr>
                <td style="font-size:20px;font-weight:bold;">Laporan Surat Tugas Bulan '.bulan_indo($bulan).'</td>
            </tr>
        </table>
    ');

    $mpdf->SetHTMLFooter('
    <table width="100%" style="font-size:12;">
        <tr>
            <td width="50%" align="left">{DATE d M Y} / {DATE H:i} WIB</td>
            <td width="50%" align="right">{PAGENO}/{nbpg}</td>
        </tr>
    </table>');

    $mpdf->AddPage('P', '', '', '', '', 8, 8, 27, 12, 5, 5);

    $tbl = '<table width="100%" style="font-size:12px;margin-top:5px;margin-bottom:10px;border-collapse:collapse">
        <thead>
            <tr>
                <th style="text-align:center;border:1px solid grey;">#</th>
                <th style="text-align:center;border:1px solid grey;">No Surat</th>
                <th style="text-align:center;border:1px solid grey;">Tanggal Surat</th>
                <th style="text-align:center;border:1px solid grey;">Tentang Surat</th>
                <th style="text-align:center;border:1px solid grey;">Menugaskan Kepada</th>
            </tr>
        </thead>
        <tbody>';

    $no = 0;
    $query = mysqli_query($konek, "SELECT a.*,b.* from surat_tugas a 
    LEFT JOIN guru b ON a.id_guru = b.id
    WHERE DATE_FORMAT(tgl_surat, '%Y-%m') = '$bulan'");
    if (!$query) {
        die('Database query error: ' . mysqli_error($konek));
    }

    while($dt = mysqli_fetch_assoc($query)){
        $no++;
        $tbl .= '<tr>
          <td style="text-align:center;border:1px solid grey;" width="20px">'.$no.'</td>
          <td style="text-align:left;border:1px solid grey;padding-left:5px;" width="100px">'.$dt['nomor_surat'].'</td>
          <td style="text-align:left;border:1px solid grey;padding-left:5px;" width="100px">'.$dt['tgl_surat'].'</td>
          <td style="text-align:left;border:1px solid grey;padding-left:5px;" width="100px">'.$dt['tentang_surat'].'</td>
          <td style="text-align:left;border:1px solid grey;padding-left:5px;" width="100px">'.$dt['nama'].'</td>
        </tr>';
    }

    $tbl .= '</tbody>
        <tfoot>
            <tr>
                <td style="text-align:center;border:1px solid grey;">&nbsp;</td>
                <td style="text-align:center;border:1px solid grey;">&nbsp;</td>
                <td style="text-align:center;border:1px solid grey;">&nbsp;</td>
                <td style="text-align:center;border:1px solid grey;">&nbsp;</td>
                <td style="text-align:center;border:1px solid grey;">&nbsp;</td>
            </tr>
        </tfoot>
    </table>';

    $mpdf->WriteHTML($tbl);

    // Output as a downloadable PDF file
    $mpdf->Output();
?>
