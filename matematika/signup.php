<?php
include 'header-public.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $k_password = $_POST['k_password'];

    if ($password == $k_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $kueri = "INSERT INTO user(email, password) 
                    VALUES('$email', '$hashed_password')";
        $hasil = mysqli_query($koneksi, $kueri);

        if ($hasil) {
            header('Location: login.php'); // loncat ke login.php bila berhasil
        }

    } else {
        $error = 'Kesalahan. Passoword tidak sama.';
    }
}
?>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Signup</h5>

                    <?php if (isset($error) ){ ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php } ?>

                    <form action="" autocomplete="off" method="POST">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password:</label>
                            <input type="password" class="form-control" name="k_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Signup</button>
                        <a href="login.php" class="btn btn-light">Login</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer-public.php';
?>

