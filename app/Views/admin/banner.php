<?= $this->extend('admin/app') ?>

<?= $this->section('content') ?>

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">แบนเนอร์</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">                                                        
                            <div class="col-auto">						    
                                <a class="btn btn-success text-white" href="<?= site_url('admin/banner/form') ?>">
                                    เพิ่มแบนเนอร์
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->            
            
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">หน้าเพจ</th>
                                    <th class="cell text-center" width="200">เผยแพร่</th>
                                    <th class="cell text-center" width="150">สถานะ</th>
                                    <th class="cell text-center" width="150">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($info){
                                        foreach ($info as $row){
                                ?>
                                    <tr>
                                        <td class="cell"><span class="truncate"><?= $row['page'] ?></span></td>
                                        <td class="cell text-center"><span><?= $row['created_at'] ?></span></td>
                                        <td class="cell text-center">
                                            <?php if($row['status']=='1'){ ?>
                                                <span class="badge bg-success">เผยแพร่</span>
                                            <?php }else{ ?>
                                                <span class="badge bg-danger">ไม่เผยแพร่</span>
                                            <?php } ?>
                                        </td>
                                        <td class="cell text-center">
                                            <a class="btn-sm btn-warning" href="<?= site_url('admin/banner/edit?id='.$row['id']) ?>">แก้ไข</a>
                                            <a class="btn-sm btn-danger text-white" href="#">ลบ</a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->
                    
                </div><!--//app-card-body-->		
            </div><!--//app-card-->

            <!-- <nav class="app-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->

<?= $this->endSection() ?>