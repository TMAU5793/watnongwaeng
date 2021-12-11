<script>
    $(document).ready(function () {
        $('.submenu-arrow').on('click',function(){
            $(this).find('i').toggleClass('fa-chevron-up');
        });

        // Ckediter 
        CKEDITOR.replace( 'txt_desc', {
            language: 'th',
            height: '500px',
            filebrowserBrowseUrl: '<?= site_url('assets/ckfinder/ckfinder.html') ?>',
            filebrowserUploadUrl: '<?= site_url('assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ?>',
            removeDialogTabs: 'image:advanced;link:advanced'
        });

        //display profile image
        $("#txt_thumbnail").change(function () {
            readURL(this);
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