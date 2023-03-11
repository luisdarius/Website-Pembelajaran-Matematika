<?php
include 'header-public.php';
?>

<div class="container">
    <!-- GALLERY -->
    <h2 class="text-center">GALLERY</h2>

    <div class="row">
    <?php

    $no = 1;
    $kueri = 'SELECT * FROM produk ORDER BY id DESC LIMIT 4'; // sesuaikan kueri dengan kebutuhan Anda
    // $kueri = 'SELECT id, nama, harga FROM produk ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
    $hasil = mysqli_query($koneksi, $kueri);

    while ($data = mysqli_fetch_array($hasil)) {
    ?>

    <div class="col-md-3">
        <img src="img/<?php echo $data ['gambar']; ?>" alt="Belum upload" class="img-fluid">
        <h5><?php echo $data['nama'] ?></h5>
        <p><?php echo $data['harga'] ?></p>
        <div>
            <?php
                $intro = substr($data['deskripsi'], 0, 200);
                echo $intro;
            ?>
            <br>
            <a href="detail-content.php?id=<?php $data['id'] ?>" class="btn btn-primary">Baca selengkapnya</a>
        </div>
    </div>

    <?php } ?>

    </div>
</div>

<?php
include 'footer-public.php';
?>

