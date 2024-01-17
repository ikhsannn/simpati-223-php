<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $no_surat = $_POST['no_surat'];
        $pengirim = $_POST['pengirim']; 
        $alamat_pengirim = $_POST['alamat_pengirim'];
        $perihal = $_POST['perihal'];
        $tgl_surat = $_POST['tgl_surat'];
        $asal_surat = $_POST['asal_surat'];

        $allowed_ext	= array('docx','doc','pdf');
        $file_name = $_FILES['file']['name'];
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
		$rename		= "SM-".$_POST['tgl_surat'].".".$file_ext;
		$file_size		= $_FILES['file']['size'];
		$file_tmp		= $_FILES['file']['tmp_name'];

        if ($file_name != '') {
            if(in_array($file_ext, $allowed_ext) === true){
                if($file_size < 3211044070){
                    $sql = mysqli_query($konek, "SELECT nama_berkas FROM surat_masuk WHERE no_surat = '$no_surat' ");
					$b = mysqli_fetch_assoc($sql);
                    if ($b['nama_berkas'] != '') {
                        $delfoto = unlink("uploads/".$rename);
                        if ($delfoto) {
                           $lokasi = 'uploads/'.$rename;
                           move_uploaded_file($file_tmp, $lokasi);
                           $input = mysqli_query($konek, "UPDATE surat_masuk SET no_surat= '$no_surat', pengirim = '$pengirim', alamat_pengirim = '$alamat_pengirim', perihal= '$perihal', tgl_surat = '$tgl_surat', asal_surat = '$asal_surat',
                           nama_berkas = '$rename' WHERE id = '$id'");
                           if ($input) {
                               echo '<script>
                               alert("Berhasil Ubah Data!!!");
                               window.location.href = "../surat_masuk.php";
                               </script>';
                           }else {
                               echo '<script>
                               alert("Gagal Ubah Data!!!");
                               window.location.href = "../ubah_surat_masuk.php";
                               </script>';
                           }
                       }else {
                           echo '<script>
                           alert("File Gagal Upload!!!");
                           window.location.href = "../ubah_surat_masuk.php";
                           </script>';
                       }
                    }else {
                        $lokasi = 'uploads/'.$rename;
                        move_uploaded_file($file_tmp, $lokasi);
                        $input = mysqli_query($konek, "UPDATE surat_masuk SET no_surat= '$no_surat', pengirim = '$pengirim', alamat_pengirim = '$alamat_pengirim', perihal= '$perihal', tgl_surat = '$tgl_surat', asal_surat = '$asal_surat',
                        nama_berkas = '$rename' WHERE id = '$id'");
                        if ($input) {
                            echo '<script>
                            alert("Berhasil Ubah Data!!!");
                            window.location.href = "../surat_masuk.php";
                            </script>';
                        }else {
                            echo '<script>
                            alert("Gagal Ubah Data!!!");
                            window.location.href = "../ubah_surat_masuk.php";
                            </script>';
                        }
                    }
                }else {
                    echo '<script>
                    alert("Size File Melebihi Kapasitas!!!");
                    window.location.href = "../ubah_surat_masuk.php";
                    </script>';
                }
            }else {
                echo '<script>
                alert("File Ekstensi Tidak Diijinkan!!!");
                window.location.href = "../ubah_surat_masuk.php";
                </script>';
            }
        }else {
            $input = mysqli_query($konek, "UPDATE surat_masuk SET no_surat= '$no_surat', pengirim = '$pengirim', alamat_pengirim = '$alamat_pengirim', perihal= '$perihal', tgl_surat = '$tgl_surat', asal_surat = '$asal_surat'
            WHERE id = '$id'");
            if ($input) {
                echo '<script>
                alert("Berhasil Ubah Data!!!");
                window.location.href = "../surat_masuk.php";
                </script>';
            }else {
                echo '<script>
                alert("Gagal Ubah Data!!!");
                window.location.href = "../ubah_surat_masuk.php";
                </script>';
            }
        }
    }
?>