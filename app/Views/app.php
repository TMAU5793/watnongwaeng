<!doctype html>
<html>
<head>
    <title><?= (isset($title)?$title:'Wat Nong Waeng') ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- shortcut icon -->
    <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('assets/images/favicon.png'); ?>">
    <!-- เรียกใช้ Library fontawesome -->
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css'); ?>">
    <!-- เรียกใช้ Library bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-5/css/bootstrap.min.css'); ?>">

    <!-- Fancybox -->
    <link rel="stylesheet" href="<?= base_url('assets/fancybox/jquery.fancybox.css'); ?>">

    <!-- Custom style -->
    <link rel="stylesheet" href="<?= base_url('assets/stylesheet/css/style.css'); ?>">

    <!-- Load Font -->
    <link rel="stylesheet" href="<?= base_url('assets/fonts/sarabun/stylesheet.css'); ?>">
</head>
<body class="bg-light-orange">
    
    <?= $this->include('nav-menu') ?>
    <?= $this->renderSection('content') ?>
    <?= $this->include('footer') ?>

    <!-- jQuery -->
    <script src="<?= base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/bootstrap-5/js/bootstrap.min.js'); ?>"></script>
    <!-- Fancybox -->
    <script src="<?= site_url('assets/fancybox/jquery.fancybox.js'); ?>"></script>
</body>
</html>