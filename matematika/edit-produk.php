<?php
include 'header.php';

    $id = $_GET['id'];

    $kueri = "SELECT * FROM produk WHERE id = $id"; // sesuaikan kueri dengan kebutuhan anda
    $hasil = mysqli_query($koneksi, $kueri);
    $data = mysqli_fetch_array($hasil);

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
            $gambar = $data['gambar'];
        }
    
    $kueri = "UPDATE produk SET 
            nama='$name', 
            harga=$harga,
            deskripsi='$deskripsi', 
            materi_id=$materi_id,
            pengajar_id='$pengajar_id',
            gambar='$gambar'
            WHERE id=$id";; // sesuaikan kueri dengan kebutuhan Anda

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
        <input type="text" name="name" class="form-control"
        value="<?php echo $data['nama'];?>">
    </div>

    <div class="form-group">
        <label>Harga:</label>
        <input type="text" name="harga" class="form-control"
        value="<?php echo $data['harga'];?>">
    </div>

    <div class="form-group">
        <label>Materi</label>
        <select name="materi_id" class="form-control">
       
        <?php

        $kueri2 = 'SELECT * FROM kategori ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
        $hasil2 = mysqli_query($koneksi, $kueri2);

        while ($data2 = mysqli_fetch_array($hasil2)) {
        ?>
       
            <option value="<?php echo $data2['id']; ?>"
            <?php
            if ($data['materi_id'] == $data2['id']) {
                echo 'selected';
            }
            ?>>
            <?php echo $data2['nama']; ?> 
        </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
        <label>Pengajar</label>
        <select name="pengajar_id" class="form-control">

        <?php

        $kueri3 = 'SELECT * FROM pengajar ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
        $hasil3 = mysqli_query($koneksi, $kueri3);

        while ($data3 = mysqli_fetch_array($hasil3)) {
        ?>
       
       <option value="<?php echo $data3['id']; ?>"
            <?php
            if ($data['pengajar_id'] == $data3['id']) {
                echo 'selected';
            }
            ?>>
            <?php echo $data3['nama']; ?> 
        </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group">
    <label>Deskripsi</label>
    <textarea id="editor" name="deskripsi"> <?php echo $data['deskripsi']; ?></textarea>
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