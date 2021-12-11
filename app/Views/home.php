<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    
    <div class="home-body mb-5">
        <section class="banner">
            <img src="<?= (is_file($banner['banner'])?site_url($banner['banner']):site_url('assets/images/img-default.jpg')) ?>" alt="wat nong waeng">
        </section>

        <section class="sect-blog">
            <div class="container mt-4">
                <?php
                    if($blogs){
                        $n=0;
                        foreach ($blogs as $row){
                            $n++;
                            if($n==1){
                                $post = $row['slug'];
                                if($post==''){
                                    $post = $row['id'];
                                }
                ?>
                    <div class="row main-blog p-4">
                        <div class="col-md-6 position-relative order-2">
                            <div class="box-text absolute-center">
                                <h3 class="c-yellow text-line-2"><?= $row['title'] ?></h3>
                                <p class="text-line-3"><?= character_limiter(strip_tags($row['desc']),100) ?></p>
                                <a href="<?= site_url($row['type'].'/post/'.$post) ?>" class="btn btn-more">View More</a>
                            </div>
                        </div>
                        <div class="col-md-6 order-1">
                            <div class="box-img zoom-in">
                                <img src="<?= (is_file($row['thumbnail'])?site_url($row['thumbnail']):site_url('assets/images/img-default.jpg')) ?>" alt="wat nong waeng">
                            </div>
                        </div>
                    </div>
                <?php } } } ?>

                <div class="row sub-blog p-4">
                    <?php
                        if($blogs){
                            $n=0;
                            foreach ($blogs as $row){
                                $n++;
                                if($n>1){
                                    $post = $row['slug'];
                                    if($post==''){
                                        $post = $row['id'];
                                    }
                    ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 mb-4">
                            <div class="pt-3 pb-3 d-flex shadow-orange cursor-pointer zoom-in" onClick="location.href='<?= site_url($row['type'].'/post/'.$post) ?>'">
                                <div class="w-50 ps-3">
                                    <div class="overflow-hidden">
                                        <img src="<?= (is_file($row['thumbnail'])?site_url($row['thumbnail']):site_url('assets/images/img-default.jpg')) ?>" alt="wat nong waeng">
                                    </div>
                                </div>
                                <div class="w-50">
                                    <div class="ps-3 pe-3">
                                        <a href="<?= site_url($row['type'].'/post/'.$post) ?>" class="a-black-style">
                                            <h2 class="fs-6 fw-bold text-line-2"><?= $row['title'] ?></h2>
                                        </a>
                                        <p class="text-line-3 mb-0"><?= character_limiter(strip_tags($row['desc']),60) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } } ?>
                    <div class="col-12">
                        <div class="text-center">
                            <a href="<?= site_url('blogs') ?>" class="btn btn-more">ทั้งหมด</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="sect-news mt-5">
            <div class="container">
                <div class="text-center title mb-3">
                    <h3 class="text-uppercase fw-bold c-yellow">News Update</h3>
                </div>

                <?php
                    if($news){
                        foreach($news as $row){
                            $post = $row['slug'];
                            if($post==''){
                                $post = $row['id'];
                            }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-img zoom-in cursor-pointer">
                            <img src="<?= (is_file($row['thumbnail'])?site_url($row['thumbnail']):site_url('assets/images/img-default.jpg')) ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="box-text absolute-center">
                            <h3 class="c-yellow text-line-2"><?= $row['title'] ?></h3>
                            <p class="text-line-3"><?= character_limiter(strip_tags($row['desc']),60) ?></p>
                            <a href="<?= site_url($row['type'].'/post/'.$post) ?>" class="btn btn-more">View More</a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </section>

        <section class="sect-comment">
            <div class="container box-bg">
                <div class="box-content position-relative">
                    <div class="acbsolute-center text-center c-yellow">
                        <span class="fs-3 quotation d-block">
                            Lorem Ipsum is simply dummy text of the printing <br>
                            dummy text of the printing
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection() ?>