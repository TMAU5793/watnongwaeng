<script>
    $(document).ready(function () {
        $('.submenu-arrow').on('click',function(){
            $(this).find('i').toggleClass('fa-chevron-up');
        });        

        //display profile image
        $("#txt_thumbnail").change(function () {
            readURL(this);
        });

        $("#thumbnail_mobile").change(function () {
            readURLMobile(this);
        });

        //display album image
        $("#file_album").change(function () {
            var limit = 20;
            multiImg(this,'#album_fallback',limit); //files, display element, limit images
        });

        //Account Album delete image
        $('.managed-item i').on('click',function(){
            var id = $(this).data('id');
            var result = deleteAlbum(id);
            if(result){
                $(this).closest(".managed-item").remove();
            }
        });

        $('#ddl_page').on('change',function(){
            var val = $(this).val();
            if(val == 'home'){
                $('#img-request').html('*ขนาดรูปที่ต้องการ 1920 x 700 px');
                $('#img-request_mobile').html('*ขนาดรูปที่ต้องการ 600 x 400 px');
            }else{
                $('#img-request').html('*ขนาดรูปที่ต้องการ 1920 x 300 px')
                $('#img-request_mobile').html('*ขนาดรูปที่ต้องการ 600 x 200 px');
            }
        });
        var n = 0;
        $('#change-password').on('click',function(){
            if(n==0){
                $('.pwd').removeAttr('disabled');
                n = 1;
            }else{
                $('.pwd').attr('disabled','disabled');
                n = 0;
            }
            $('.text-password').toggleClass('d-none');
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#thumb-img').attr('src', e.target.result);
                $('#hd_thumb').val(input.files[0].name);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLMobile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#thumb-img-mobile').attr('src', e.target.result);
                $('#hd_thumb_mobile').val(input.files[0].name);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function multiImg(input,el,limit) {
        $(el).html('');
        if (input.files && input.files[0]) {
            for (var i = 0; i < limit; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(el).append('<img src=' + e.target.result + '>');
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    function deleteAlbum(id){
        var result = confirm("ยืนยันการลบ?");
        if(result){
            $.post("<?= site_url('admin/article/deleteAlbum') ?>", {id:id},
                function (resp) {
                    if(resp){
                        $('#removeImgModal').modal('show');                        
                    }
                }
            );
            return true;
        }
    }
</script>