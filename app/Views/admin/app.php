<!doctype html>
<html>
<head>
    <title>Backoffice | Panel</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- shortcut icon -->
    <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('assets/images/favicon.png'); ?>">
    <!-- เรียกใช้ Library fontawesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css'); ?>">
    <!-- เรียกใช้ Library bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-5/css/bootstrap.min.css'); ?>">
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/admin-portal/css/portal.css') ?>">
    <!-- Load Font -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/sarabun/stylesheet.css'); ?>">
    <!-- Custom style -->
    <link rel="stylesheet" href="<?= base_url('assets/stylesheet/css/backoffice.css'); ?>">
</head>
<body class="app">

    <?= $this->include('admin/sidemenu') ?>
    <?= $this->renderSection('content') ?>

    <!-- jQuery -->
    <script src="<?= base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin-portal/plugins/popper.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/bootstrap-5/js/bootstrap.min.js'); ?>"></script>            

    <!-- Charts JS -->
    <script src="<?= base_url('assets/admin-portal/plugins/chart.js/chart.min.js') ?>"></script> 
    <!-- <script src="<?= base_url('assets/admin-portal/js/index-charts.js') ?>"></script>  -->
    
    <!-- Page Specific JS -->
    <script src="<?= base_url('assets/admin-portal/js/app.js') ?>"></script>

    <!-- เรียกใช้ ckeditor -->
    <script src="<?= site_url('assets/ckeditor4/ckeditor.js'); ?>"></script>

    <!-- เรียกใช้ ckfinder -->
    <script src="<?= site_url('assets/ckfinder/ckfinder.js'); ?>"></script>

    <!-- Load custom script -->
    <?= $this->include('admin/script') ?>
</body>
</html>