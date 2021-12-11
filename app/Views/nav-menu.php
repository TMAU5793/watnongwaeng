<?php
    $uri = service('uri');
    $segment2 = $uri->getSegment(1);
?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid p-0">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='home' || $segment2==''?'active' : '') ?>" aria-current="page" href="<?= site_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='news' ?'active' : '') ?>" href="<?= site_url('news') ?>">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='activity' ?'active' : '') ?>" href="<?= site_url('activity') ?>">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='blog' ?'active' : '') ?>" href="<?= site_url('blog') ?>">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='contact' ?'active' : '') ?>" href="<?= site_url('contact') ?>">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>