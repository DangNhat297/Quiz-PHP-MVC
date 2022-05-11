

<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Lịch sử làm quiz</h5>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên quiz</th>
                            <th>Điểm</th>
                            <th>Thời gian làm bài</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $quizs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="font-weight-bold"><?php echo e($quiz->name); ?></td>
                            <td class="font-weight-bold"><?php echo e($quiz->score); ?></td>
                            <td class="font-weight-bold"><?php echo e(\App\Helpers\Helper::minuteBetween($quiz->start_time, $quiz->end_time)); ?></td>
                            <td class="font-weight-bold"><?php echo e(($quiz->end_time) ? 'Đã hoàn thành' : 'Chưa hoàn thành'); ?></td>
                            <td class="font-weight-bold"><a href="<?php echo e(route('ket-qua/' . $quiz->id)); ?>" class="btn btn-primary">Xem</a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/QuizHistory.blade.php ENDPATH**/ ?>