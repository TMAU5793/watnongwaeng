<?php
    $uri = service('uri');
    $segment2 = $uri->getSegment(2);
?>

<header class="app-header fixed-top">	   	            
    <div class="app-header-inner">  
        <div class="container-fluid py-2">
            <div class="app-header-content"> 
                <div class="row justify-content-between align-items-center">
                
                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                    </a>
                </div><!--//col-->
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fas fa-search"></i>
                </div><!--//col-->
                
                <div class="app-utilities col-auto">                    
                    <div class="app-utility-item app-user-dropdown dropdown">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <img src="<?= site_url('assets/images/favicon.png') ?>" alt="user profile">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item" href="<?= site_url('admin/account') ?>">Account</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('admin/setting') ?>">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= site_url('admin/login/logout') ?>">Log Out</a></li>
                        </ul>
                    </div><!--//app-user-dropdown--> 
                </div><!--//app-utilities-->
            </div><!--//row-->
            </div><!--//app-header-content-->
        </div><!--//container-fluid-->
    </div><!--//app-header-inner-->

    <div id="app-sidepanel" class="app-sidepanel"> 
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="<?= site_url('admin/dashboard') ?>">
                    <img class="logo-icon me-2" src="<?= site_url('assets/images/favicon.png') ?>" alt="logo"><span class="logo-text">Admin</span>
                </a>

            </div><!--//app-branding-->  
            
            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='dashboard'?'active':'') ?>" href="<?= site_url('admin/dashboard') ?>">
                            <span class="nav-icon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="nav-item has-submenu">
                        <a class="nav-link submenu-toggle <?= ($segment2=='article'?'active':'') ?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                            <span class="nav-icon">
                                <i class="far fa-newspaper"></i>
                            </span>
                            <span class="nav-link-text">บทความ</span>
                            <span class="submenu-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </a>
                        
                        <div id="submenu-1" class="collapse submenu submenu-1 <?= ($segment2=='article'?'show':'') ?>" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="submenu-item"><a class="submenu-link <?= ($active=='news'?'active':'') ?>" href="<?= site_url('admin/article/news') ?>">ข่าวสาร</a></li>
                                <li class="submenu-item"><a class="submenu-link <?= ($active=='activity'?'active':'') ?>" href="<?= site_url('admin/article/activity') ?>">กิจกรรม</a></li>
                                <li class="submenu-item"><a class="submenu-link <?= ($active=='blog'?'active':'') ?>" href="<?= site_url('admin/article/blog') ?>">บล็อก</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='banner'?'active':'') ?>" href="<?= site_url('admin/banner') ?>">
                            <span class="nav-icon">
                                <i class="far fa-images"></i>
                            </span>
                            <span class="nav-link-text">แบนเนอร์</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($segment2=='account'?'active':'') ?>" href="<?= site_url('admin/account') ?>">
                            <span class="nav-icon">
                                <i class="fas fa-user-tie"></i>
                            </span>
                            <span class="nav-link-text">แอดมิน</span>
                        </a>
                    </li>

                </ul>
            </nav>

            <div class="app-sidepanel-footer">
                <nav class="app-nav app-nav-footer">
                    <ul class="app-menu footer-menu list-unstyled">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('admin/setting') ?>">
                                <span class="nav-icon">
                                    <i class="fas fa-cog"></i>
                                </span>
                                <span class="nav-link-text">Settings</span>
                            </a>
                        </li>                        
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>
</header>