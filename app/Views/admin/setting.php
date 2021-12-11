<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <form action="<?= site_url('admin/setting/save') ?>" method="POST">
                <input type="hidden" name="hd_id" value="<?= (isset($info)?$info['id']:'') ?>">
                <div class="row">
                    <div class="col-6">
                        <h1 class="app-page-title">การตั้งค่า</h1>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn app-btn-primary">บันทึก</button>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">อีเมลผู้รับ</h3>
                        <div class="section-intro">เมื่อมีผู้ใช้ส่งอีเมลติดต่อ หรืออื่นๆ บนฟอร์มอีเมลหน้าเว็บไซต์ อีเมลทั้งหมดจะถูกส่งไปยังอีเมลนี้</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card shadow-sm p-4">
                            
                            <div class="app-card-body">
                                <div class="mb-3">
                                    <label for="receive_mail" class="form-label">อีเมลรับการติดต่อ <small class="text-danger">กรณีมีหลายอีเมลให้ใช้เครื่องหมาย "," คั่นระหว่าอีเมล</small></label>
                                    <input type="text" class="form-control" id="receive_mail" name="receive_mail" value="<?= $info['receive_mail'] ?>">
                                </div>
                                    
                            </div><!--//app-card-body-->
                            
                        </div><!--//app-card-->
                    </div>
                </div><!--//row-->
                <hr class="my-4">

                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">ตั้งค่า SMTP</h3>
                        <div class="section-intro">SMTP เป็นการตั้งค่าสำหรับการส่งอีเมลไปยังผู้ใช้</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card shadow-sm p-4">
                            
                            <div class="app-card-body">
                                <div class="mb-3">
                                    <label for="smtp_host" class="form-label">SMTP Host</label>
                                    <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?= $info['smtp_host'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="smtp_user" class="form-label">SMTP User</label>
                                    <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="<?= $info['smtp_user'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="smtp_password" class="form-label">SMTP Password</label>
                                    <input type="text" class="form-control" id="smtp_password" name="smtp_password" value="<?= $info['smtp_password'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="smtp_port" class="form-label">SMTP Port</label>
                                    <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="<?= $info['smtp_port'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="smtp_security" class="form-label">SMTP Security (SSL/TLS)</label>
                                    <input type="text" class="form-control" id="smtp_security" name="smtp_security" value="<?= $info['smtp_security'] ?>">
                                </div>
                                <button type="submit" class="btn app-btn-primary">บันทึก</button>
                            </div><!--//app-card-body-->
                            
                        </div><!--//app-card-->
                    </div>
                </div><!--//row-->
                <hr class="my-4">
            </form>
        </div><!--//container-fluid-->
    </div><!--//app-content-->

<?= $this->endSection() ?>