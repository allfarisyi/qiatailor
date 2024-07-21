<?php
include "../proses/connect.php"; // Pastikan jalur ini benar

// Mendapatkan data dari form
$nama = isset($_POST['nama']) ? htmlentities($_POST['nama']) : "";
$deskripsi = isset($_POST['deskripsi']) ? htmlentities($_POST['deskripsi']) : "";
$harga = isset($_POST['harga']) ? intval($_POST['harga']) : 0;
$stok = isset($_POST['stok']) ? intval($_POST['stok']) : 0;
$kat_design = isset($_POST['kat_design']) ? htmlentities($_POST['kat_design']) : "";

// Mendapatkan data file gambar
$gambar = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "";
$tmp_gambar = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : "";
$kode_rand = rand(10000, 99999) . "-";
$folder = "../upload/";
$target_file = $folder . $kode_rand . basename($gambar);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$message = ""; // Inisialisasi variabel pesan

if (!empty($_POST['input_design_validate'])) {
    // Cek apakah file gambar atau bukan
    $cek = getimagesize($tmp_gambar);
    if ($cek === false) {
        $message = "File ini bukan gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Maaf, file tersebut sudah ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { // 500kb
                $message = "File terlalu besar";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf, hanya bisa mengupload file JPG, PNG, JPEG, GIF";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        echo '<script>alert("' . $message . ', gambar tidak dapat diupload");
              window.location="../design" </script>';
    } else {
        $stmt = $conn->prepare("SELECT * FROM design WHERE nama = ?");
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Nama design yang dimasukkan telah ada");
                  window.location="../design"</script>';
        } else {
            if (move_uploaded_file($tmp_gambar, $target_file)) {
                $stmt = $conn->prepare("INSERT INTO design (nama, deskripsi, gambar_desain, harga, stok, kat_design) VALUES (?, ?, ?, ?, ?, ?)");
                $gambar_nama = $kode_rand . $gambar;
                $stmt->bind_param("sssdis", $nama, $deskripsi, $gambar_nama, $harga, $stok, $kat_design);

                if (!$stmt->execute()) {
                    echo '<script>alert("Data gagal dimasukkan");
                          window.location="../design"</script>';
                } else {
                    echo '<script>alert("Data berhasil dimasukkan");
                          window.location="../design"</script>';
                }
            } else {
                echo '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload");
                      window.location="../design"</script>';
            }
        }
    }
}
?>
