

<?php $__env->startSection('main'); ?>
<div class="row">
    <?php $__currentLoopData = $quizs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation"></div>
                <div class="product-desc">
                    <a href="<?php echo e(route('quiz/' . $quiz->id)); ?>" class="product-name"><?php echo e($quiz->name); ?></a>
                    <ul>
                        <li>Thời gian: <?php echo e($quiz->duration_minutes); ?> phút</li>
                        <li>Trạng thái: <?php echo e((\App\Helpers\Helper::isOpenQuiz($quiz->start_time, $quiz->end_time)) ? 'Mở' : 'Đóng'); ?></li>
                    </ul>
                    <div class="m-t text-righ">
                        <a href="<?php echo e(route('quiz/' . $quiz->id)); ?>" class="btn btn-xs btn-outline btn-primary">Chi tiết <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(count($quizs) == 0): ?>
    <div class="col-md-12">
        <div class="alert alert-danger text-center font-weight-bold">Môn học này chưa có quiz!</div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/quiz.blade.php ENDPATH**/ ?>