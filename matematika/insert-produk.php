<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $harga = $_POST['harga'];
    $materi_id = $_POST['materi_id'];
    $pengajar_id = $_POST['pengajar_id'];
    $deskripsi = $_POST['deskripsi'];
   
    echo $gambar = rand(10, 100) . $_FILES['gambar']['name']; // kurung siku pertama untuk name
    echo "<br>" . $gambar_tmp = $_FILES['gambar']['tmp_name'];
    echo "<br>" . $gambar_ext =  strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
    
    $target_file = 'img/'.$gambar; // ubah img dengan nama folder gambar Anda
    $upload_gambar = true;

    if ($gambar_ext != 'bmp' &&
        $gambar_ext != 'gif' &&
        $gambar_ext != 'jpg' &&
        $gambar_ext != 'png' &&
        $gambar_ext != 'jpeg') {
            $upload_gambar = false;
            $gambar = '';
        }
    
    $kueri = "INSERT INTO produk(nama, harga, deskripsi, materi_id, pengajar_id, gambar)
              VALUES('$name', $harga, '$deskripsi', $materi_id, $pengajar_id,  '$gambar')"; // sesuaikan kueri dengan kebutuhan Anda

    $hasil = mysqli_query($koneksi, $kueri);

    if ($hasil == true) {
        if ($upload_gambar == true) {
            move_uploaded_file($gambar_tmp, $target_file); // upload gambar
        }

        header('Location: index.php?'); // kembali ke index.php bila berhasil. Ubah index.php sesuai kebutuhan Anda
   
    } else {
        $error = 'Error '. mysqli_error($koneksi);
    }
}
?>

<?php if (isset($error) ){ ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>

<a href="index.php" class="btn btn-outline-dark">Kembali</a>
<br><br>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Nama Produk:</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label>Harga:</label>
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="form-group">
        <label>Materi</label>
        <select name="materi_id" class="form-control">
       
        <?php

        $kueri = 'SELECT * FROM kategori ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
        $hasil = mysqli_query($koneksi, $kueri);

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
       
            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama'] ?> </option>
        <?php } ?>

        </select>
    </div>

    <div class="form-group">
        <label>Pengajar</label>
        <select name="pengajar_id" class="form-control">

        <?php

        $kueri = 'SELECT * FROM pengajar ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
        $hasil = mysqli_query($koneksi, $kueri);

        while ($data = mysqli_fetch_array($hasil)) {
        ?>
       
            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama'] ?> </option>
        <?php } ?>

        </select>
    </div>

    <div class="form-group">
    <label>Deskripsi</label>
    <textarea id="editor" name="deskripsi"></textarea>
</div>

<div class="form-group">
    <label>Gambar</label>
    <input type="file" name="gambar" class="form-control-file">
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-success">
</div>

</form>

<?php
include 'footer.php';
?>