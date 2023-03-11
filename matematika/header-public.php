<?php
    include 'database.php';
    
    //session_start();

    if(! empty($_SESSION['user_id']) ) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/admin-style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="css/datatables.min.css">
    <!-- Gijgo WYSIWYG Editor CSS -->
    <link rel="stylesheet" href="css/gijgo.min.css">
    <!-- Fontawesome Icons CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

</head>

<body>

    
