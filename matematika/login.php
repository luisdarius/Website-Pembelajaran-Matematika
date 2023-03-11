<?php
include 'header-public.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $kueri = "SELECT * FROM user WHERE email='$email'";
    $hasil = mysqli_query($koneksi, $kueri); 

    if ($hasil == true) {
        $data  = mysqli_fetch_array($hasil);
        $verifikasi = password_verify($password, $data['password']);

        if ($verifikasi) {
            session_start();
            $_SESSION['user_id']      = $data['id'];
            $_SESSION['user_nama']    = $data['username'];

            header('Location: index.php?'); // loncat ke index.php bila berhasil. Ubah index.php sesuai kebutuhan Anda
        } else {
            $error = 'Error. email atau password salah';
        }
    } else {
        $error = 'Error. email atau password salah';
    }
}
?>

        <div id="content">         
                    <a href="index.html" class="btn btn-outline-dark float-center">Kembali</a>
                </div>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <form action="" autocomplete="off" method="POST">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="signup.php" class="btn btn-light">Signup</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'header-public.php';
?>