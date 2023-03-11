<?php
include 'header.php';

$id = $_GET['id']; // mengambil id dari url

$kueri = "DELETE FROM produk WHERE id=$id"; // sesuaikan kueri dengan kebutuhan Anda
$hasil = mysqli_query($koneksi, $kueri);

if ($hasil) {
    header('Location: index.php'); // kembali ke index.php bila berhasil. Ubah index.php sesuai kebutuhan Anda
}

include 'footer.php';
?>