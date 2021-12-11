<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

    <div class="app-wrapper">	    
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <form action="<?= site_url('admin/banner/save') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="hd_id" value="<?= (isset($info)?$info['id']:'') ?>">
                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">แบนเนอร์</h1>
                        </div>
                        <div class="col-auto">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">                                                        
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success text-white">บันทึก</button>
                                        <a class="btn btn-warning" href="<?= site_url('admin/banner') ?>">
                                            ยกเลิก
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif;?>
                       
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body p-4">                        
                                <div class="form-group mb-3">
                                    <label for="">หน้าเพจ <span class="text-danger">*</span></label>
                                    <select name="ddl_page" id="ddl_page" class="form-control">
                                        <option value="">-- เลือกหน้าเพจ --</option>
                                        <option value="home" <?= (isset($info) && $info['page']=='home'?'selected':'') ?>>หน้าหลัก</option>
                                        <option value="news" <?= (isset($info) && $info['page']=='news'?'selected':'') ?>>หน้าข่าวสาร</option>
                                        <option value="activity" <?= (isset($info) && $info['page']=='activity'?'selected':'') ?>>หน้ากิจกรรม</option>
                                        <option value="blog" <?= (isset($info) && $info['page']=='blog'?'selected':'') ?>>หน้าบล็อก</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">การเผยแพร่</label>
                                    <select name="ddl_status" id="ddl_status" class="form-control">
                                        <option value="1" <?= (isset($info) && $info['status']=='1'?'selected':'') ?>>เผยแพร่</option>
                                        <option value="0" <?= (isset($info) && $info['status']=='0'?'selected':'') ?>>ไม่เผยแพร่</option>
                                    </select>
                                </div>
                                <div class="user-profile">
                                    <h6 class="mb-3 ff-bold">รูป Thumbnail</h6>
                                    <?php
                                        $profile_pic = (is_file($info['banner'])?site_url($info['banner']):site_url('assets/images/img-default.jpg'));
                                    ?>
                                    <img src="<?= $profile_pic; ?>" id="thumb-img" class="thumb-img" style="max-width:500px;width:100%;">
                                    <input id="txt_thumbnail" name="txt_thumbnail" type="file" class="form-control input-hide" accept="image/*">
                                    <input type="hidden" name="hd_thumb" id="hd_thumb" value="<?= $info['banner'] ?>">
                                    <input type="hidden" name="hd_thumb_del" value="<?= $info['banner'] ?>">
                                    <label for="txt_thumbnail" class="label-file-img" style="max-width:500px;width:100%;">เลือกรูปภาพ</label>
                                    <small class="text-danger mt-2 d-block" id="img-request"></small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>