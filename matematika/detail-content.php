<?php
    include 'database.php';
    
    session_start();

    if(! empty($_SESSION['user_id']) ) {
        header('Location: index.php');
    }
    echo "Koneksi Berhasil";
?>

