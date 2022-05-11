

<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Thêm môn học</h5>
            </div>
            <div class="ibox-content">
                <form action="" id="add-subject" method="POST">
                    <div class="form-group row"><label class="col-lg-2 col-form-label">Tên môn học</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nhập tên môn học" name="subject" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script>
    $(document).ready(function(){
        $('#add-subject').submit(function(e){
            e.preventDefault()
            $this = $(this)
            $btn = $this.find('button[type="submit"]')
            $subject = $this.find('input[name="subject"]').val()
            $.ajax({
                url         : '<?php echo e(route("api/subject")); ?>',
                type        : 'POST',
                data        : {subject: $subject},
                dataType    : 'json',
                beforeSend  : function(){
                    $btn.html('<i class="fas fa-cog fa-spin"></i> Đang xử lý').prop('disabled', true)
                },
                success     : function(response){
                    setTimeout(() => {
                        if(response.status == 'success'){
                            Swal.fire(
                                    'Thành công!',
                                    'Thêm môn học thành công!',
                                    'success'
                                )
                            $this.find('input[name="subject"]').val('')
                        } else {
                            Swal.fire(
                                    'Thất bại!',
                                    'Có lỗi xảy ra, vui lòng thử lại!',
                                    'error'
                                )
                        }
                        $btn.html('Thêm').prop('disabled', false)
                    },1000)
                }
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/AddSubject.blade.php ENDPATH**/ ?>