<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <form action="<?= site_url('admin/account/save') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="hd_id" value="<?= (isset($info)?$info['id']:'') ?>">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                <div class="app-card-header p-3 border-bottom-0">
                                    <div class="row align-items-center gx-3">
                                        <div class="col-auto">
                                            <div class="app-icon-holder">
                                                <i class="fas fa-user-tie"></i>
                                            </div><!--//icon-holder-->
                                            
                                        </div><!--//col-->
                                        <div class="col-auto">
                                            <h4 class="app-card-title">ข้อมูลบัญชี</h4>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//app-card-header-->
                                
                                <div class="app-card-body px-4 w-100">
                                    <?php if(isset($validation)): ?>
                                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                    <?php endif;?>
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-auto">
                                                <div class="item-label mb-2"><strong>Photo</strong></div>
                                                <div class="item-data">
                                                    <img class="profile-image rounded-circle" id="thumb-img" src="<?= (is_file($img['profile'])?site_url($img['profile']):site_url('assets/images/img-default.jpg')) ?>" alt="">
                                                </div>
                                            </div><!--//col-->
                                            <div class="col text-end">
                                                <input id="txt_thumbnail" name="txt_thumbnail" type="file" class="form-control input-hide" accept="image/*">
                                                <input type="hidden" name="hd_thumb" id="hd_thumb" value="<?= (isset($info)?$info['profile'] : '' ) ?>">
                                                <input type="hidden" name="hd_thumb_del" value="<?= (isset($info)?$info['profile'] : '' ) ?>">
                                                <label for="txt_thumbnail" class="btn-sm app-btn-secondary">รูปภาพ</label>
                                            </div><!--//col-->
                                        </div><!--//row-->
                                    </div><!--//item-->
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>ชื่อบัญชี</strong> <span class="text-danger">*</span></div>
                                                <input type="text" class="form-control" name="txt_account" value="<?= (isset($info)?$info['account'] : set_value('txt_account')) ?>" <?= (isset($info)?'disabled' : '') ?>>
                                            </div>
                                        </div>
                                    </div>                                                                        

                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>รหัสผ่าน</strong> <span class="text-danger">*</span></div>
                                                <input type="password" class="form-control pwd" name="txt_password" value="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>ยืนยันรหัสผ่าน</strong> <span class="text-danger">*</span></div>
                                                <input type="password" class="form-control pwd" name="txt_confirm_password" value="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="hd_password" value="password">
                                    <button type="button" class="btn btn-warning mt-3 <?= (isset($info)?'d-block' : 'd-none') ?>" id="change-password">
                                        <span class="text-password">เปลี่ยนรหัสผ่าน</span>
                                        <span class="text-password d-none">ยกเลิก</span>
                                    </button>
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>ชื่อ</strong></div>
                                                <input type="text" class="form-control" name="txt_name" value="<?= (isset($info)?$info['name'] : set_value('txt_name')) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>อีเมล</strong></div>
                                                <input type="email" class="form-control" name="txt_email" value="<?= (isset($info)?$info['email'] : set_value('txt_email')) ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item border-bottom py-3">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12">
                                                <div class="item-label mb-2"><strong>การใช้งาน</strong></div>
                                                <select name="ddl_status" id="ddl_status" class="form-control">
                                                    <option value="1">ใช้งาน</option>
                                                    <option value="0">ปิดการใช้งาน</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--//app-card-body-->
                                <div class="app-card-footer p-4 mt-auto">
                                    <button type="submit" class="btn btn-secondary">บันทึก</button>
                                </div><!--//app-card-footer-->
                                
                            </div><!--//app-card-->
                        </div><!--//col-->                
                    </div><!--//row-->
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>