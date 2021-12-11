<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<div class="single-article single-post">
    <div class="container">
        <div class="bread-crumb mt-5 mb-3 pb-3 border-bottom">   
            <a href="<?= site_url($info['type']) ?>"><?= $info['type'] ?></a> >
            <span><?= $info['title'] ?></span>
            <small class="d-block">เผยแพร่ : <?= substr($info['created_at'],0,10) ?></small>
        </div>

        <div class="single-title text-center mb-3">
            <h1 class="fs-3 ff-medium"><?= $info['title'] ?></h1>
        </div>

        <div class="single-content">
            <?= $info['desc'] ?>
        </div>

        <div class="single-album mb-5">
            <div class="contianer">
                <div class="single-title">
                    <h3 class="ff-medium">ภาพกิจกรรม</h3>
                </div>
                <div class="row">
                    <?php
                        if($album){
                            foreach($album as $row){
                    ?>
                        <div class="col-lg-2 col-md-3 col-4 mb-3">
                            <a class="fancybox" data-fancybox="plans" data-width="1400" data-caption="" href="<?= (is_file($row['image'])?site_url($row['image']):site_url('assets/images/img-default.jpg')) ?>" title="">
                                <div class="zoom-in album-item">
                                    <img src="<?= (is_file($row['thumbnail'])?site_url($row['thumbnail']):site_url('assets/images/img-default.jpg')) ?>" alt="">
                                </div>
                            </a>
                        </div>
                    <?php } }else{ ?>
                        <div class="col-12">
                            <span>ไม่พบข้อมูล</span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>