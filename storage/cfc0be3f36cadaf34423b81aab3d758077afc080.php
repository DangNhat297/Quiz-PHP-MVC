

<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Kết quả quiz</h5>
                </div>
                <div class="ibox-content">
                    <ul class="list-group">
                        <li class="list-group-item font-weight-bold">Số câu hỏi: <?php echo e($countQuestion); ?></li>
                        <li class="list-group-item font-weight-bold">Số câu đã trả lời: <?php echo e(count($questionsAnswered)); ?>

                        </li>
                        <li class="list-group-item font-weight-bold">Trả lời đúng: <?php echo e(count($questionsCorrect)); ?></li>
                        <li class="list-group-item font-weight-bold">Thời gian làm bài: <?php echo e($time); ?></li>
                        <li class="list-group-item font-weight-bold">Điểm: <?php echo e($score); ?></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Đáp án</h5>
                </div>
                <div class="ibox-content">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul class="list-group font-weight-bold my-3">
                            <li class="list-group-item active">
                                <?php echo e($question->name); ?>

                                <?php if($question->img != 'null' && $question->img != '' && $question->img != null): ?>
                                    <img src="<?php echo e($question->img); ?>" style="display:block;max-width:150px;margin:10px 0;" referrerpolicy="no-referrer">
                                <?php endif; ?>
                            </li>
                            <?php $__currentLoopData = $question->answer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item my-1 <?php echo e(($answer->is_correct == 1 ? 'border border-success' : '')); ?>">
                                <?php echo e($answer->content); ?>

                                <?php if($answer->img != 'null' && $answer->img != '' && $answer->img != null): ?>
                                    <img src="<?php echo e($answer->img); ?>" style="display:block;max-width:150px;margin:10px 0;" referrerpolicy="no-referrer">
                                <?php endif; ?>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/result.blade.php ENDPATH**/ ?>