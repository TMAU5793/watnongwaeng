<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

    <div class="app-wrapper">	    
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <form action="<?= site_url('admin/article/save') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="hd_id" value="<?= (isset($info)?$info['id']:'') ?>">
                    <input type="hidden" name="hd_type" value="<?= (isset($active)?$active:'') ?>">
                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">ข่าวสาร</h1>
                        </div>
                        <div class="col-auto">
                            <div class="page-utilities">
                                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">                                                        
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success text-white">บันทึก</button>
                                        <a class="btn btn-warning" href="<?= site_url('admin/article/'.$active) ?>">
                                            ยกเลิก
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                        <a class="flex-sm-fill text-sm-center nav-link active" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">ข้อมูล</a>
                        <a class="flex-sm-fill text-sm-center nav-link"  id="seo-tab" data-bs-toggle="tab" href="#seo-sect" role="tab" aria-controls="seo-sect" aria-selected="false">ข้อมูล SEO</a>
                        <a class="flex-sm-fill text-sm-center nav-link" id="img-tab" data-bs-toggle="tab" href="#img-sect" role="tab" aria-controls="img-sect" aria-selected="false">รูปภาพ</a>
                    </nav>

                    <div class="tab-content" id="orders-table-tab-content">
                        <?php if(isset($validation)): ?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif;?>
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-5">                                        
                                <div class="app-card-body p-4">                        
                                    <div class="form-group mb-3">
                                        <label for="">หัวข้อ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txt_title" value="<?= (isset($info)?$info['title']:'') ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">การเผยแพร่</label>
                                        <select name="dll_status" id="dll_status" class="form-control">
                                            <option value="1" <?= (isset($info) && $info['status']=='1'?'selected':'') ?>>เผยแพร่</option>
                                            <option value="0" <?= (isset($info) && $info['status']=='0'?'selected':'') ?>>ไม่เผยแพร่</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">รายละเอียด <span class="text-danger">*</span></label>
                                        <textarea name="txt_desc" id="txt_desc" class="form-control"><?= (isset($info)?$info['desc']:'') ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seo-sect" role="tabpanel" aria-labelledby="seo-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-5">                                        
                                <div class="app-card-body p-4">                                
                                    <div class="form-group mb-3">
                                        <label for="">Slug URL</label>
                                        <input type="text" class="form-control" name="seo_slug" value="<?= (isset($info)?$info['slug']:'') ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">SEO Title</label>
                                        <input type="text" class="form-control" name="seo_title" value="<?= (isset($info)?$info['seo_title']:'') ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">SEO Description</label>
                                        <textarea name="seo_desc" id="seo_desc" class="form-control" value="<?= (isset($info)?$info['seo_desc']:'') ?>"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="img-sect" role="tabpanel" aria-labelledby="img-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-5">                                        
                                <div class="app-card-body p-4">
                                    <div class="user-profile">
                                        <h6 class="mb-3 ff-bold">รูป Thumbnail</h6>
                                        <?php
                                            $profile_pic = (is_file($info['thumbnail'])?site_url($info['thumbnail']):site_url('assets/images/img-default.jpg'));
                                        ?>
                                        <img src="<?= $profile_pic; ?>" id="thumb-img" class="thumb-img">
                                        <input id="txt_thumbnail" name="txt_thumbnail" type="file" class="form-control input-hide" accept="image/*">
                                        <input type="hidden" name="hd_thumb" id="hd_thumb" value="<?= $info['thumbnail'] ?>">
                                        <input type="hidden" name="hd_thumb_del" value="<?= $info['thumbnail'] ?>">
                                        <label for="txt_thumbnail" class="label-file-img">เลือกรูปภาพ</label>
                                        <small class="text-danger mt-2 d-block">*ขนาดรูปที่ต้องการ 600 x 400 px </small>
                                    </div>

                                    <div class="about-edit ac-album-form mt-3">
                                        <h6 class="ff-bold">ภาพอัลบั้ม</h6>
                                        <div class="album-managed">
                                            <?php
                                                if(isset($album)){
                                                    foreach($album as $img){
                                            ?>
                                            <div class="managed-item">
                                                <img src="<?= (is_file($img['image'])?site_url($img['image']):site_url('assets/images/img-default.jpg')) ?>">
                                                <i class="far fa-trash-alt" data-id="<?= $img['id'] ?>" title="Delete Image"></i>
                                            </div>
                                            <?php } } ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="fallback" id="album_fallback">
                                            
                                        </div>
                                        <input id="file_album" name="file_album[]" type="file" class="form-control input-hide" multiple accept="image/*">
                                        <label for="file_album" class="label-file-img">เลือกรูปภาพ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script>
        $(function () {
            // Ckediter 
            CKEDITOR.replace( 'txt_desc', {
                language: 'th',
                height: '500px',
                filebrowserBrowseUrl: '<?= site_url('assets/ckfinder/ckfinder.html') ?>',
                filebrowserUploadUrl: '<?= site_url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ?>',
                removeDialogTabs: 'image:advanced;link:advanced'
            });
        });
    </script>
<?= $this->endSection() ?>