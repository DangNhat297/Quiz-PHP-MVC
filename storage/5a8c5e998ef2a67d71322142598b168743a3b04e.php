

<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Danh sách môn học</h5>
            </div>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <div class="cart-product-imitation">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                        <a href="<?php echo e(route('mon-hoc/'. $subject->id .'/quizs')); ?>" class="text-navy">
                                            <?php echo e($subject->name); ?>

                                        </a>
                                    </h3>
                                    <p class="font-weight-bold"><i class="fas fa-at"></i> Tác giả: <?php echo e($subject->author_name); ?></p>

                                    <div class="m-t-sm">
                                        <a href="<?php echo e(route('mon-hoc/'. $subject->id .'/quizs')); ?>" class="btn btn-primary btn-sm"><i class="far fa-eye"></i> Danh sách quiz</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/home.blade.php ENDPATH**/ ?>