<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Overview</h1>
				    
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">ข่าวทั้งหมด</h4>
							    <div class="stats-figure"><?= $countnews; ?></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="<?= site_url('admin/article/news') ?>"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">กิจกรรมทั้งหมด</h4>
							    <div class="stats-figure"><?= $countactivity; ?></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="<?= site_url('admin/article/activity') ?>"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">บล็อกทั้งหมด</h4>
							    <div class="stats-figure"><?= $countblog; ?></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="<?= site_url('admin/article/blog') ?>"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-3">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Setting</h4>								
								<div class="stats-figure"><i class="fas fa-cog"></i></div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="<?= site_url('admin/setting') ?>"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->
			    
			    <div class="row g-4 mb-4">
					<div class="col-12"><h1 class="app-page-title mb-0">ข่าวล่าสุด</h1></div>
				    <?php
						if($news){
							foreach($news as $row){
								$post = $row['slug'];
								if($post==''){
									$post = $row['id'];
								}
					?>
					<div class="col-12 col-lg-4">
					    <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <h4 class="app-card-title"><?= $row['title'] ?></h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4">							    
							    <div class="intro"><?= character_limiter(strip_tags($row['desc']),120) ?></div>
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="<?= site_url($row['type'].'/post/'.$post) ?>" target="_blank">รายละเอียด</a>
						    </div><!--//app-card-footer-->
						</div><!--//app-card-->
				    </div><!--//col-->
				    <?php } } ?>
			    </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->        
	    
    </div><!--//app-wrapper-->

<?= $this->endSection() ?>