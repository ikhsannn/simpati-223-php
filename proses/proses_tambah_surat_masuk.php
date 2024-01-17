<?php
    require_once('koneksi.php');

    if (isset($_POST['submit'])) {
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
                    $lokasi = 'uploads/'.$rename;
                    move_uploaded_file($file_tmp, $lokasi);
                    $input = mysqli_query($konek, "INSERT INTO surat_masuk (no_surat,pengirim,alamat_pengirim,perihal,tgl_surat,asal_surat,nama_berkas) 
                    VALUES('$no_surat','$pengirim','$alamat_pengirim','$perihal','$tgl_surat','$asal_surat','$rename')");
                    if ($input) {
                        echo '<script>
                        alert("Berhasil Tambah Data!!!");
                        window.location.href = "../surat_masuk.php";
                        </script>';
                    }else {
                        echo '<script>
                        alert("Gagal Tambah Data!!!");
                        window.location.href = "../tambah_surat_masuk.php";
                        </script>';
                    }
                }else {
                    echo '<script>
                    alert("Size File Melebihi Kapasitas!!!");
                    window.location.href = "../tambah_surat_masuk.php";
                    </script>';
                }
            }else {
                echo '<script>
                alert("File Ekstensi Tidak Diijinkan!!!");
                window.location.href = "../tambah_surat_masuk.php";
                </script>';
            }
        }else {
            $input = mysqli_query($konek, "INSERT INTO surat_masuk (no_surat,pengirim,alamat_pengirim,perihal,tgl_surat,asal_surat) 
            VALUES('$no_surat','$pengirim','$alamat_pengirim','$perihal','$tgl_surat','$asal_surat')");
            if ($input) {
                echo '<script>
                alert("Berhasil Tambah Data!!!");
                window.location.href = "../surat_masuk.php";
                </script>';
            }else {
                echo '<script>
                alert("Gagal Tambah Data!!!");
                window.location.href = "../tambah_surat_masuk.php";
                </script>';
            }
        }
    }
?>