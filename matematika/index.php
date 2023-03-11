<?php
include 'header.php';
?>

<a class="btn btn-primary" href="insert-produk.php">Tambah Produk</a>
<br><br>

<table class="table table-bordered table-striped" id="dataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php

        $no = 1;
        $kueri = 'SELECT * FROM produk ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
        // $kueri = 'SELECT id, nama, harga FROM produk ORDER BY nama'; // sesuaikan kueri dengan kebutuhan Anda
        $hasil = mysqli_query($koneksi, $kueri);

        while ($data = mysqli_fetch_array($hasil)) {
        ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['harga']; ?></td>

            <!-- Tombol aksi -->
            <td>
                <a class="btn btn-warning" href="edit-produk.php?id=<?php echo ($data['id']); ?>">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <a class="btn btn-danger" href="hapus-produk.php?id=<?php echo ($data['id']); ?>"
                onClick="javascript: return confirm('Yakin hapus data ini?');">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </td>
        </tr>

        <?php } ?>
    
    </tbody>
</table>

<?php
include 'footer.php';
?>