<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<div class="single-article single-post">
    <div class="banner">
        <img src="<?= (is_file($banner['banner'])?site_url($banner['banner']):site_url('assets/images/img-default.jpg')) ?>" alt="wat nong waeng">
    </div>

    <div class="container">
        <div class="text-center mt-4 mb-4">
            <h1 class="fs-3 ff-bold"><?= $title ?></h1>
        </div>
        <div class="row">
            <?php
                if($info){
                    foreach ($info as $row){
                        $post = $row['slug'];
                        if($post==''){
                            $post = $row['id'];
                        }
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-body">
                        <div class="col-img">
                            <img src="<?= (is_file($row['thumbnail'])?site_url($row['thumbnail']):site_url('assets/images/img-default.jpg')) ?>" alt="wat nong waeng">
                        </div>
                        <div class="col-text mt-3">
                            <h1 class="fs-4 text-line-1"><?= $row['title'] ?></h1>
                            <p><?= character_limiter(strip_tags($row['desc']),120) ?></p>
                        </div>
                        <a href="<?= site_url($type.'/post/'.$post) ?>" class="btn btn-more">เพิ่มเติม</a>
                    </div>
                </div>
            <?php } } ?>
        </div>

        <?php if(isset($pager)) { ?>
            <nav class="navigation-center mt-3">
                <?= $pager->links(); ?>
            </nav>
        <?php } ?>
    </div>
</div>

<?= $this->endSection() ?>