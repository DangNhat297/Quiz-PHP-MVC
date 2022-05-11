

<?php $__env->startSection('form'); ?>
<form class="m-t" role="form" id="formSignup">
    <div class="form-group">
        <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="form-text error email m-b-none"></span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
        <span class="form-text error password m-b-none"></span>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
        <span class="form-text error confirm_password m-b-none"></span>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input id="logo" name="avatar" accept=".jpg, .png, .jpeg" type="file" class="custom-file-input">
            <label for="logo" class="custom-file-label">Chọn avatar...</label>
        </div> 
    </div>
    <div class="form-group">
        <img class="output-image" style="width: 150px;height:150px;object-fit:cover">
    </div>
    <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Đăng ký</button>

    <p class="text-muted text-center"><small>Bạn đã có tài khoản?</small></p>
    <a class="btn btn-sm btn-white btn-block" href="login.php">Đăng nhập ngay</a>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script>
    $(document).ready(function(){
        $('.output-image').hide();
        $('#message-success').hide();
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
    $('#formSignup').submit(function(e){
        $('span.error').text('')
        e.preventDefault()
        $this = $(this)
        var dataForm = new FormData(this)
        $.ajax({
            url         : '<?php echo e(route("api/register")); ?>',
            type        : 'POST',
            dataType    : 'json',
            data        : dataForm,
            contentType : false,
            processData : false,
            beforeSend  : function(){
                $('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i> Đang đăng ký');
            },
            success     : function(response){
                // console.log(response)
                // return
                setTimeout(function(){
                    if(response.status == 'success'){
                        $this.find('input').prop('disabled', true)
                        Swal.fire(
                                'Thành công!',
                                'Đăng ký thành công!',
                                'success'
                            )
                        setTimeout(() => {
                            window.location.href = '<?=route('dang-nhap')?>'
                        },100)
                    } else {
                        $('button[type="submit"]').html('Đăng ký')
                        $.each(response.message, function(index, value){
                            $('span.error.' + index).html(value)
                        })
                        Swal.fire(
                            'Thất bại!',
                            'Có lỗi xảy ra, vui lòng thử lại!',
                            'error'
                        )
                    }
                },1000);
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/Register.blade.php ENDPATH**/ ?>