<!DOCTYPE html>
<html lang="en">

<?php
    $estado = @$_SESSION['actor'];
    if(@$estado != 'hotel' || @$estado ==''){
        echo 'USTED NO TIENE AUTORIZACION';
        die();
    }

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url().'/asset/css/all.css' ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'/asset/css/sb-admin-2.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'/asset/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this page -->
    <link href="<?php echo base_url().'/asset/css/dataTables.bootstrap4.min.css'?>" rel="stylesheet">

</head>

<body id="page-top">
