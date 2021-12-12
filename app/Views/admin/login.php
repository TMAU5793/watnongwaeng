<!DOCTYPE html>
<html lang="en"> 
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

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper justify-content-center">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><img class="logo-icon me-2" width="100" src="<?= site_url('assets/images/favicon.png') ?>" alt="logo"></div>
					<h2 class="auth-heading text-center mb-5">ระบบ Back Office</h2>
			        <div class="auth-form-container text-start">
                        <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif;?>
						<form class="auth-form login-form" action="<?= site_url('admin/login/auth') ?>" method="POST">
							<div class="email mb-3">
								<label class="mb-2" for="txt_account">ชื่อบัญชี</label>
								<input id="txt_account" name="txt_account" type="text" class="form-control signin-email" placeholder="ชื่อบัญชี" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="mb-2" for="txt_password">รหัสผ่าน</label>
								<input id="txt_password" name="txt_password" type="password" class="form-control signin-password" placeholder="รหัสผ่าน" required="required">
								
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
                
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
    
    </div><!--//row-->
</body>
</html> 