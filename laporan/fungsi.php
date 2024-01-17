<?php
ob_start();

ini_set('session.gc_maxlifetime',21600);

session_start();

function query1($sql){
	include "koneksi.php";
	$data = $connL->query($sql);
	return $data;
}

function query($sql){
	include "koneksi2.php";
	$data = $conn->query($sql); 
	return $data;
}

function query_iqo($sql){
	include "koneksi_iqo.php";
	$data = $iqo->query($sql);
	return $data;
}

function stamp_page($user,$page){
	include "koneksi2.php";
	$data = $conn->query("INSERT INTO bsw_page_hit (`user_id`,`page_id`,`last_open`) VALUES ('$user','$page',CONVERT_TZ(now(),'+00:00','+07:00'))");
	return $data;
}

function permit_page($user,$page){
	include "koneksi2.php";
	if($user == "admin_app" || $user == "admin_app1" || $user == "admin_app2" || $user == "admin_app3"){
		return true;
	}else{
		$data = $conn->query("SELECT * FROM bsw_permit WHERE `user_id` = '$user' AND `page_id` = '$page'");
		$f = mysqli_num_rows($data);
		if($f==0){
			return false;
		}else{
			return true;
		}
	}
	
}

function num_rows1($sql){
	include "koneksi.php";
	$data = mysqli_num_rows($connL->query($sql));
	return $data;
}

function num_rows($sql){
	include "koneksi2.php";
	$data = mysqli_num_rows($conn->query($sql));
	return $data;
}

function fetch1($sql){
	include "koneksi.php";
	$data = mysqli_fetch_array($connL->query($sql));
	return $data;
}

function fetch($sql){
	include "koneksi2.php";
	$data = mysqli_fetch_array($conn->query($sql));
	return $data;
}


function fetch_iqo($sql){
	include "koneksi_iqo.php";
	$data = mysqli_fetch_array($iqo->query($sql));
	return $data;
}

function bulan_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $bulan.' '.$tahun; 
 }

function bulan_indo1($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = substr(getBulan(substr($tgl,5,2)),0,3);
	$tahun = substr($tgl,2,2);
	return $bulan.'-'.$tahun;
}

function tgl_indo($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = getBulan(substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				return $tahun.' '.$bulan;
		}

function tgl2($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = getBulan(substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				return $bulan.' '.$tahun;
}

function tgl_3($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = substr($tgl,5,2);
				$tahun = substr($tgl,0,4);
				return $bulan.'/'.$tanggal.'/'.$tahun;
		}

function tgl_tgl($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = cari_bulan(substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				return $tanggal.' '.$bulan.' '.$tahun;
		}
function tgl_tgl1($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = (substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				return $tanggal.' '.$bulan.' '.$tahun;
		}
function tgl3($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = getBulan(substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				return $tanggal.' '.$bulan.' '.$tahun;
		}

function tgl_1($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = bulan1(substr($tgl,5,2));
				$tahun = substr($tgl,2,2);
				return $tanggal.'-'.$bulan.'-'.$tahun;
		}

		function tgl_eng($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = bulan1(substr($tgl,5,2));
			$tahun = substr($tgl,2,2);
			return $tanggal.' '.$bulan.' '.$tahun;
	}

function tgl_pfi($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = cari_bulan(substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				$tahun1 = substr($tahun,2,4);
				return $tanggal.'-'.$bulan.'-'.$tahun1;
		}

function tgl_pfi2($tgl){
				$tanggal = substr($tgl,0,2);
				$bulan = getBulan(substr($tgl,4,5));
				$tahun = substr($tgl,6,10);
				$tahun1 = substr($tahun,2,4);
				return $tanggal.' '.$bulan.' '.$tahun;
		}
		
		function gethari_angka2($hari){
			switch ($hari){
				case '5':
					return "Jumat";
					break;
				case '6':
					return "Sabtu";
					break;
				case '7':
					return "Minggu";
					break;
				case '1':
					return "Senin";
					break;
				case '2':
					return "Selasa";
					break;
				case '3':
					return "Rabu";
					break;
				case '4':
					return "Kamis";
					break;
			}
		}

		function gethari_angka($hari){
			switch ($hari){
				case 'Friday':
					return "5";
					break;
				case 'Saturday':
					return "6";
					break;
				case 'Sunday':
					return "7";
					break;
				case 'Monday':
					return "1";
					break;
				case 'Tuesday':
					return "2";
					break;
				case 'Wednesday':
					return "3";
					break;
				case 'Thursday':
					return "4";
					break;
			}
		}

		function gethari_lengkap($hari){
			switch ($hari){
				case 'Friday':
					return "Jumat";
					break;
				case 'Saturday':
					return "Sabtu";
					break;
				case 'Sunday':
					return "Minggu";
					break;
				case 'Monday':
					return "Senin";
					break;
				case 'Tuesday':
					return "Selasa";
					break;
				case 'Wednesday':
					return "Rabu";
					break;
				case 'Thursday':
					return "Kamis";
					break;
			}
		}

	function getBulan($bln){
				switch ($bln){
					case 1:
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}
			function getBulanS1($bln){
				switch ($bln){
					case 1:
						return "7";
						break;
					case 2:
						return "8";
						break;
					case 3:
						return "9";
						break;
					case 4:
						return "10";
						break;
					case 5:
						return "11";
						break;
					case 6:
						return "12";
						break;
					case 7:
						return "1";
						break;
					case 8:
						return "2";
						break;
					case 9:
						return "3";
						break;
					case 10:
						return "4";
						break;
					case 11:
						return "5";
						break;
					case 12:
						return "6";
						break;
				}
			}
			function getBulanS($bln){
				switch ($bln){
					case 1:
						return "Juli";
						break;
					case 2:
						return "Agustus";
						break;
					case 3:
						return "September";
						break;
					case 4:
						return "Oktober";
						break;
					case 5:
						return "November";
						break;
					case 6:
						return "Desember";
						break;
					case 7:
						return "Januari";
						break;
					case 8:
						return "Februari";
						break;
					case 9:
						return "Maret";
						break;
					case 10:
						return "April";
						break;
					case 11:
						return "Mei";
						break;
					case 12:
						return "Juni";
						break;
				}
			}
	function bulan1($bln){
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Oct";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Dec";
						break;
				}
			}
			function cari_bulan2($bln){
				switch ($bln){
					case "01":
						return "Jan";
						break;
					case "02":
						return "Feb";
						break;
					case "03":
						return "Mar";
						break;
					case "04":
						return "Apr";
						break;
					case "05":
						return "Mei";
						break;
					case "06":
						return "Jun";
						break;
					case "07":
						return "Jul";
						break;
					case "08":
						return "Aug";
						break;
					case "09":
						return "Sep";
						break;
					case "10":
						return "Okt";
						break;
					case "11":
						return "Nov";
						break;
					case "12":
						return "Des";
						break;
				}
			}
function cari_bulan($bln){
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Okt";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Des";
						break;
				}
			}

$log = "0.70";
$password_malang = "bsw18";

function blc_bbi_all(){
	include "koneksi3.php";
	include "koneksi.php";

	$connLokal->query("TRUNCATE temp_blc_bbi_jati_all;");

	$ck = "IF OBJECT_ID('dbo.vout_bbi_jati_all', 'V') IS NOT NULL
    DROP VIEW dbo.vout_bbi_jati_all
GO

CREATE VIEW dbo.vout_bbi_jati_all AS
SELECT        SUM(dbo.TblLog.VolLog) AS vout, dbo.TblLog.IDPas
FROM            dbo.TblLog INNER JOIN
                         dbo.TblLogOut ON dbo.TblLog.IDLog = dbo.TblLogOut.IDLog
GROUP BY dbo.TblLog.IDPas";
// $stmt2 = sqlsrv_query($conn12,$ck);

	$ck2 = "IF OBJECT_ID('dbo.blc_bbi_log_jati_all', 'V') IS NOT NULL
    DROP VIEW dbo.blc_bbi_log_jati_all
GO

CREATE VIEW dbo.blc_bbi_log_jati_all AS
SELECT        dbo.TblPerni.IDPas, dbo.TblPerni.TglTerbit, dbo.TblPerni.KPH, dbo.TblPerni.TPK, dbo.TblPerni.JnsByr, dbo.TblPerni.JnsLog, SUM(CASE WHEN dbo.TblLog.Qty = 0 THEN 1 ELSE dbo.TblLog.Qty END) AS QIN,
                         SUM(CASE WHEN dbo.TblLogOut.Qty = 0 THEN 1 ELSE dbo.TblLogOut.Qty END) AS Qout, SUM(dbo.TblLog.VolLog) AS vin, dbo.vout_bbi_jati_all.vout
FROM            dbo.TblLog INNER JOIN
                         dbo.TblPerni ON dbo.TblPerni.IDPas = dbo.TblLog.IDPas LEFT OUTER JOIN
                         dbo.TblLogOut ON dbo.TblLog.IDLog = dbo.TblLogOut.IDLog LEFT OUTER JOIN
                         dbo.vout_bbi_jati_all ON dbo.vout_bbi_jati_all.IDPas = dbo.TblLog.IDPas
GROUP BY dbo.TblPerni.IDPas, dbo.TblPerni.TglTerbit, dbo.TblPerni.HrgThn, dbo.TblPerni.Smstr, dbo.TblPerni.Wil, dbo.TblPerni.KPH, dbo.TblPerni.TPK, dbo.TblPerni.NoTruck, dbo.TblPerni.NoFAKB, dbo.TblPerni.JnsLog,
                         dbo.TblPerni.JnsByr, dbo.vout_bbi_jati_all.vout";
// $stmt3 = sqlsrv_query($conn12,$ck2);

	$sql = "SELECT * FROM blc_bbi_log_jati_all";
	// $stmt = sqlsrv_query($conn12,$sql);

	// while($data = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
	// 	$vblc = $data['vin']-$data['vout'];
	// 	$blcq = $data['QIN']-$data['Qout'];

	// 	$date = $data['TglTerbit'];
	// 	$date = date_format($date, 'Y-m-d');

	// 	$connLokal->query("INSERT INTO temp_blc_bbi_jati_all VALUES ('$data[IDPas]','$date','$data[KPH]','$data[TPK]','$data[JnsLog]','$data[QIN]','$data[Qout]','$blcq','$data[vin]','$data[vout]','$vblc')");
	// }


}

function exportToOn(){
	include "koneksi3.php";
	include "koneksi2.php";

	$conn->query("TRUNCATE temp_blc_bbi_jati_all;");

	$kll = $connLokal->query("SELECT * FROM temp_blc_bbi_jati_all");
	while($data = $kll->fetch_assoc()){
		$conn->query("INSERT INTO temp_blc_bbi_jati_all VALUES ('$data[IDPas]','$data[TglTerbit]','$data[KPH]','$data[TPK]','$data[Jenis]','$data[QIn]','$data[QOut]','$data[Qblc]','$data[Vin]','$data[Vout]','$data[Vblc]')");
	}
}

function ckKnds(){
	include "koneksi2.php";

	$ck = $conn->query("SELECT * FROM bsw_user_login WHERE online = '0' AND user_id = 'Admin1'");
	if(mysqli_num_rows($ck) > 0){
		$kondisi = "<center><h1> OFFLINE </h1></center>";
	}
}


function cekUser($user,$page,$aksi,$kondisi){
	require 'koneksi2.php';
	$user_id = $user;
	$cek_boss = $conn->query("SELECT * FROM bsw_user_login WHERE user_id = '$user_id' AND user_level = 'boss'");
	if(mysqli_num_rows($cek_boss)>0){
		if($kondisi == "disabled"){
			return "";
		}else if($kondisi == "redirect") {
			return "";
		}else{
			return "";
		}
	}else{
		$cek_page = $conn->query("SELECT * FROM bsw_user_permit WHERE user_id = '$user_id' AND page = '$page' AND `$aksi` = 'Yes'");
		if(mysqli_num_rows($cek_page)>0){
			if($kondisi == "disabled"){
				return "";
			}else if($kondisi == "redirect") {
				return "<script>alert('Anda Belum Mendapatkan Izin');location.href = 'index.php';";
			}else{
				return "";
			}
		}else{
			if($kondisi == "disabled"){
				return "disabled";
			}else if($kondisi == "redirect") {
				return "<script>alert('Anda Belum Mendapatkan Izin');location.href = 'index.php';";
			}else{
				return "display:none;";
			}
		}
	}
}


function insert_log($user,$page,$tanggal,$aksi,$bagian,$prevVal,$currVal){
	include "koneksi2.php";

	$conn->query("INSERT INTO bsw_log_activity VALUES ('','$user','$page','$tanggal','$aksi','$bagian','$prevVal','$currVal')");
}

function gabung_log_perni(){
	include "koneksi2.php";

	$cek = $conn->query("CALL gabung_log_perni()");

	if($cek){
		echo "Sukses Menggabungkan Perni JT & MH <br>";
	}else{
		echo "Gagal Menggabungkan Perni JT & MH <br>";
	}
}

function gabung_log_masuk(){
	include "koneksi2.php";

	$cek = $conn->query("CALL gabung_log_masuk()");

	if($cek){
		echo "Sukses Menggabungkan Log Masuk JT & MH <br>";
	}else{
		echo "Gagal Menggabungkan Log Masuk JT & MH <br>";
	}
}

function gabung_log_keluar(){
	include "koneksi2.php";

	$cek = $conn->query("CALL gabung_log_keluar()");

	if($cek){
		echo "Sukses Menggabungkan Log Keluar JT & MH <br>";
	}else{
		echo "Gagal Menggabungkan Log Keluar JT & MH <br>";
	}
}

function gabung_log_potong(){
	include "koneksi2.php";
	$conn->query("DELETE FROM tabel_potong_gabungan WHERE sumber = 'AppWeb'");
	$conn->query("INSERT INTO tabel_potong_gabungan
SELECT
bsw_data_runtime_head.tanggal,
bsw_data_runtime_head.mesin,
bsw_data_runtime_detail.idpass,
bsw_data_runtime_detail.idlog,
bsw_data_runtime_detail.potke,
bsw_data_runtime_detail.mutu,
bsw_data_runtime_detail.tebal,
bsw_data_runtime_detail.kanan,
bsw_data_runtime_detail.kiri,
bsw_data_runtime_detail.panjang,
bsw_data_runtime_detail.volume,
bsw_data_runtime_detail.update_tgl,
bsw_data_runtime_detail.nopra,
bsw_data_runtime_detail.season,
bsw_data_runtime_detail.palet,
bsw_data_runtime_detail.jns,
'AppWeb'
FROM `bsw_data_runtime_detail` INNER JOIN bsw_data_runtime_head ON bsw_data_runtime_detail.idhead = bsw_data_runtime_head.id
WHERE bsw_data_runtime_detail.jns = 'JT' AND bsw_data_runtime_head.tanggal >= '2019-07-09'");
	$cek = $conn->query("INSERT INTO tabel_potong_gabungan
	SELECT
	bsw_data_runtime_head.tanggal,
	bsw_data_runtime_head.mesin,
	bsw_data_runtime_detail.idpass,
	bsw_data_runtime_detail.idlog,
	bsw_data_runtime_detail.potke,
	bsw_data_runtime_detail.mutu,
	bsw_data_runtime_detail.tebal,
	bsw_data_runtime_detail.kanan,
	bsw_data_runtime_detail.kiri,
	bsw_data_runtime_detail.panjang,
	bsw_data_runtime_detail.volume,
	bsw_data_runtime_detail.update_tgl,
	bsw_data_runtime_detail.nopra,
	bsw_data_runtime_detail.season,
	bsw_data_runtime_detail.palet,
	bsw_data_runtime_detail.jns,
	'AppWeb'
	FROM `bsw_data_runtime_detail` INNER JOIN bsw_data_runtime_head ON bsw_data_runtime_detail.idhead = bsw_data_runtime_head.id
	WHERE bsw_data_runtime_detail.jns = 'MH' AND bsw_data_runtime_head.tanggal >= '2019-07-09';");

	if($cek){
		echo "Sukses Menggabungkan Log Potong JT & MH <br>";
	}else{
		echo "Gagal Menggabungkan Log Potong JT & MH <br>";
	}
}

function ctw($cur,$f){
	$l = strlen($cur);
	$c = str_split($cur);
	$w = '';
	$counter = 1;
	$no = 1;
	$non = 1;
	$nonj = 1;
	$nonm = 1;
	$nont = 1;
	$nonb = 1;
	for($i=0;$i<$l;$i++){
		$dec = $l-$i;
		if($c[$i]==1) $v = "satu ";
		if($c[$i]==2) $v = "dua ";
		if($c[$i]==3) $v = "tiga ";
		if($c[$i]==4) $v = "empat ";
		if($c[$i]==5) $v = "lima ";
		if($c[$i]==6) $v = "enam ";
		if($c[$i]==7) $v = "tujuh ";
		if($c[$i]==8) $v = "delapan ";
		if($c[$i]==9) $v = "sembilan ";
		if($c[$i]==0) $v = "";
		if($dec==17){					// puluhan bilyar
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonb = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==16){					// bilyar
			if($nonb==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." bilyar ";
			}  
			else $w = $w."bilyar ";
		}
		if($dec==14){					// puluhan trilyun
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nont = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==13){					// trilyun
			if($nont==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." trilyun ";
			}  
			else $w = $w."trilyun ";
		}
		if($dec==11){					// puluhan milyar
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonm = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==10){					// milyar
			if($nonm==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." milyar ";
			} 
			else $w = $w."milyar ";
		}
		if($dec==8){					// puluhan juta
			if($v=="satu "){				
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$nonj = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==7){					// jutaan
			if($nonj==1){ 
				if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." juta ";
			}
			else $w = $w."juta ";
		}
		if($dec==5){					// puluhan ribu
			if($v=="satu "){
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$non = 0;
			}
			else if($v=="") $w = $w."";
			else
				$w = $w."".$v." puluh ";
		}
		if($dec==4){					// ribuan
			if($non==1){
				if($v=="satu "&&$l==4) $w = $w."seribu ";
				else if($v==""&&$c[$i-1]==0&&$c[$i-2]==0) $w = $w."";
				else $w = $w."".$v." ribu ";
			} 
			else $w = $w."ribu ";
		} 
		// ratusan, ratusan ribu, ratusan juta, ratusan milyar, ratusan trilyun, ratusan bilyar >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
		if($dec==3||$dec==6||$dec==9||$dec==12||$dec==15||$dec==18){	
			if($v=="satu ") $w = $w."seratus ";
			else if($v=="") $w = $w."";
			else $w = $w."".$v." ratus ";
		} 
		if($dec==2){					// puluhan
			if($v=="satu "){
				if($c[$i+1]==0) $w = $w."sepuluh ";
				if($c[$i+1]==1) $w = $w."sebelas ";
				if($c[$i+1]==2) $w = $w."dua belas ";
				if($c[$i+1]==3) $w = $w."tiga belas ";
				if($c[$i+1]==4) $w = $w."empat belas ";
				if($c[$i+1]==5) $w = $w."lima belas ";
				if($c[$i+1]==6) $w = $w."enam belas ";
				if($c[$i+1]==7) $w = $w."tujuh belas ";
				if($c[$i+1]==8) $w = $w."delapan belas ";
				if($c[$i+1]==9) $w = $w."sembilan belas ";
				$no = 0;
			}
			else if($v=="") $w = $w."";
			else $w = $w."".$v." puluh ";
		} 
		if($dec==1){					// satuan
			if($no==0) $w = $w."";
			else $w = $w."".$v;
		}
		
	}
	$w = $w." rupiah";
	if($f==0) return $w;
	else if($f==1) return ucfirst($w);
	else if($f==2) return ucwords($w);
}

?>
