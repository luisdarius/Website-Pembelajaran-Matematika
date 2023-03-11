<!DOCTYPE html>
<html>
<head>
	<title>HALAMAN PERHITUNGAN MATEMATIKA MENGGUNAKAN PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body style="background-color:lightblue;">

        <!-- Page Content  -->
        <div id="content">         
                    <a href="index.html" class="btn btn-outline-dark float-center">Kembali</a>
                </div>

                <h1>HALAMAN PERHITUNGAN MATEMATIKA MENGGUNAKAN PHP</h1>
	<?php 
	if(isset($_POST['hitung'])){
		$bil1 = $_POST['bil1'];
		$bil2 = $_POST['bil2'];
		$operasi = $_POST['operasi'];
		switch ($operasi) {
			case 'tambah':
				$hasil = $bil1+$bil2;
			break;
			case 'kurang':
				$hasil = $bil1-$bil2;
			break;
			case 'kali':
				$hasil = $bil1*$bil2;
			break;
			case 'bagi':
				$hasil = $bil1/$bil2;
			break;			
		}
	}
	?>
	<div class="kalkulator">
		<p class="judul">1.PERHITUNGAN TAMBAH, KURANG, BAGI DAN KALI DENGAN PHP</p>
		<form method="post" action="page.php">			
			<input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Pertama">
			<input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Masukkan Bilangan Kedua">
			<select class="opt" name="operasi">
				<option value="tambah">+</option>
				<option value="kurang">-</option>
				<option value="kali">x</option>
				<option value="bagi">/</option>
			</select>
			<input type="submit" name="hitung" value="Hitung" class="tombol">											
		</form>
		<?php if(isset($_POST['hitung'])){ ?>
			<input type="text" value="<?php echo $hasil; ?>" class="bil">
		<?php }else{ ?>
			<input type="text" value="0" class="bil">
		<?php } ?>			
	</div>

<p class="judul">2.MENGHITUNG LUAS PERSEGI DENGAN PHP</p>
<?php 
    @$sisi = $_GET['sisi'];
    @$luas = $sisi * $sisi;
    @$keliling = 4 * $sisi;
?>

<form  method="GET">
s (Sisi) = 
<input type="text" name="sisi" value="<?php echo $sisi; ?>"/>cm<br/>
<input type="submit" name="submit" value="SUBMIT"/><br/><br/>
<?php
	echo "Luas Persegi = ".$luas." cm^2<br/>";
	echo "Keliling Persegi = ".$keliling," cm";
	?>
</form>

<p class="judul">3.MENGHITUNG LUAS DAN KELILING PERSEGI PANJANG DENGAN PHP</p>
<?php 
    @$panjang = $_GET['panjang'];
    @$lebar = $_GET['lebar'];
    @$luas = $panjang * $lebar;
    @$keliling = 2 * ($panjang + $lebar);
?>
<form method="GET">
p (Panjang) = 
<input type="text" name="panjang" value="<?php echo $panjang; ?>"/>cm<br/>
l (Lebar) = 
<input type="text" name="lebar" value="<?php echo $lebar; ?>"/>cm<br/>
<input type="submit" name="submit" value="SUBMIT"/><br/><br/>
            <?php
            echo "Luas Persegi Panjang = ".$luas." cm^2<br/>";
            echo "Keliling Persegi Panjang = ".$keliling," cm";
            ?>
</form>

<p class="judul">4.MENGHITUNG VOLUME PRISMA DENGAN PHP</p>
<?php 
    @$alas = $_REQUEST['alas'];
    @$tinggi = $_REQUEST['tinggi'];
    @$sisi = $_REQUEST['sisi'];
    @$tinggi_prisma = $_REQUEST['tinggi_prisma'];
    @$luas_alas_segitiga = 1/2 * $alas * $tinggi;
    @$volume_prisma_segitiga = $luas_alas_segitiga * $tinggi_prisma;
    @$luas_alas_persegi = $sisi * $sisi;
    @$volume_prisma_persegi = $luas_alas_persegi * $tinggi_prisma;
?>
<form method="REQUEST">
            <table>
                <tr>
                    <td>Alas</td>
                    <td>=</td>
                    <td><input type="text" name="alas" value="<?php echo $alas; ?>"/>cm<br/></td>
                </tr>
                <tr>
                    <td>Tinggi</td>
                    <td>=</td>
                    <td><input type="text" name="tinggi" value="<?php echo $tinggi; ?>"/>cm<br/></td>
                </tr>
                <tr>
                    <td>Tinggi Prisma</td>
                    <td>=</td>
                    <td><input type="text" name="tinggi_prisma" value="<?php echo $tinggi_prisma; ?>"/>cm<br/></td>
                </tr>
                <tr>
                    <td>Sisi</td>
                    <td>=</td>
                    <td><input type="text" name="sisi" value="<?php echo $sisi; ?>"/>cm<br/></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="SUBMIT"/><br/><br/>
            <?php
                echo "Luas Alas Prisma Segitiga= ".$luas_alas_segitiga." cm^2<br/>";
                echo "Volume Prisma Segitiga = ".$volume_prisma_segitiga." cm^3<br/><br/>";
                echo "Luas Alas Prisma Persegi = ".$luas_alas_persegi." cm^2<br/>";
                echo "Volume Prisma Persegi = ".$volume_prisma_persegi." cm^3<br/>";
            ?>
        </form>

</body>
</html>