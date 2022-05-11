

<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col-lg-12">
    <a href="<?=route('mon-hoc/quizs/tao-moi')?>" class="btn btn-primary mb-3">Tạo mới quiz</a>
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Quản lý quiz</h5>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên quiz</th>
                            <th>Thời gian</th>
                            <th>Bắt đầu</th>
                            <th>Kết thúc</th>
                            <th>Trạng thái</th>
                            <th>Môn học</th>
                            <th class="text-right">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="update-quiz">
                <input type="hidden" name="id">
                <div class="modal-body">
                <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tên quiz</label>
                        <div class="col-lg-10">
                            <input type="text" placeholder="Nhập tên quiz" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Môn học</label>
                        <div class="col-lg-10">
                            <select name="subject_id" class="form-control">
                                <option value="0" hidden>Chọn môn học (Tên môn học - Tác giả)</option>
                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name . ' - ' . $subject->author_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <p class="text-danger subject"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Thời gian</label>
                        <div class="col-lg-10">
                            <input type="number" placeholder="Nhập thời gian làm quiz" min="0" class="form-control" name="duration_minutes" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Thời hạn quiz</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" name="daterange" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Trạng thái</label>
                        <div class="col-lg-10">
                            <div class="form-check abc-radio abc-radio-info form-check-inline">
                                <input class="form-check-input" type="radio" id="active" value="1" name="status" checked>
                                <label class="form-check-label" for="active"> Bật </label>
                            </div>
                            <div class="form-check abc-radio abc-radio-info form-check-inline">
                                <input class="form-check-input" type="radio" id="non-active" value="0" name="status">
                                <label class="form-check-label" for="non-active"> Tắt </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Đảo câu hỏi</label>
                        <div class="col-lg-10">
                            <div class="form-check abc-checkbox abc-checkbox-primary form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_shuffle" id="shuffle" value="1">
                                <label class="form-check-label" for="shuffle"> Có </label>
                            </div>
                        </div>
                    </div>
                    <p class="text-danger error"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script>
    $(document).ready(function(){
        $('.modal input[name="daterange"]').daterangepicker({
            timePicker: true,
            timePickerIncrement: 1,
            opens: "center"
        })
        function fetchQuiz(){
            let subject = getParam('subject') ?? ''
            $.ajax({
                url: '<?php echo e(route("api/subject/quiz/")); ?>' + subject,
                dataType: 'json',
                success: function(response){
                    let html = response.data.map(value => {
                        return `<tr>
                                    <td class="font-weight-bold">${value.name}</td>
                                    <td class="font-weight-bold">${value.duration_minutes} phút</td>
                                    <td class="font-weight-bold">${formatDate(value.start_time, 'DD/MM/YYYY HH:mm')}</td>
                                    <td class="font-weight-bold">${formatDate(value.end_time, 'DD/MM/YYYY HH:mm')}</td>
                                    <td>${(value.status == 1) ? 'Mở' : 'Đóng'}</td>
                                    <td class="font-weight-bold">${value.subject_name}</td>
                                    <td class="text-right">
                                        <a href="<?=route('mon-hoc/chi-tiet-quizs')?>/${value.id}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <button data-toggle="modal" data-target="#myModal5" class="btn btn-success edit-quiz" data-quiz-id="${value.id}"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-danger delete-quiz" data-quiz-id="${value.id}"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>`
                    }).join('')
                    $('.table tbody').html(html)
                }
            })
        }
        fetchQuiz()

        $('#update-quiz').submit(function(e) {
            e.preventDefault()
            $('p.error').text('')
            $this = $(this)
            $data = new FormData(this)
            $subject = $this.find('input[name="subject"]').val()
            $btn = $this.find('button[type="submit"]')
            $.ajax({
                url: '<?php echo e(route("api/quiz/")); ?>' + $id,
                type: 'POST',
                dataType: 'json',
                data: $data,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $btn.html('<i class="fas fa-cog fa-spin"></i> Đang xử lý').prop('disabled', true)
                },
                success: function(response) {
                    setTimeout(() => {
                        if (response.status == 'success') {
                            $btn.html('<i class="fas fa-check"></i> Đã cập nhật')
                            $this.find('input').prop('disabled', true)
                            fetchQuiz()
                        } else {
                            $this.find('p.error').text('Có lỗi xảy ra, vui lòng thử lại')
                            $btn.html('Cập nhật').prop('disabled', false)
                        }
                    }, 1000)
                }
            })
        })

        $(document).on('click', '.edit-quiz', function() {
            $('.modal').find('input:checkbox').prop('checked', false)
            $('.modal').find('input, button').prop('disabled', false)
            $('.modal').find('p.error').text('')
            $('.modal').find('button[type="submit"]').html('Cập nhật')
            $id = $(this).data('quiz-id')
            $modal = $('.modal')
            $.ajax({
                url: '<?php echo e(route("api/quiz/")); ?>' + $id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $modal.find('[name="id"]').val(response.id)
                    $modal.find('[name="name"]').val(response.name)
                    $modal.find('[name="subject_id"]').val(response.subject_id)
                    $modal.find('[name="duration_minutes"]').val(response.duration_minutes)
                    $modal.find('[name="daterange"]').val(formatDate(response.start_time, 'DD/MM/YYYY HH:mm:ss') + ' - ' + formatDate(response.end_time, 'DD/MM/YYYY HH:mm:ss'))
                    $modal.find(':radio[name=status][value="'+response.status+'"]').prop('checked', true)
                    if(response.is_shuffle == 1) $modal.find('[name="is_shuffle"]').prop('checked', true)

                }
            })
        })

        $(document).on('click', '.delete-quiz', function() {
            $id = $(this).data('quiz-id')
            Swal.fire({
                text: "Bạn có chắc muốn xóa quiz này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa ngay!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url     : '<?php echo e(route("api/quiz/")); ?>' + $id,
                        type    : 'DELETE',
                        dataType: 'json',
                        success : function(response){
                            if(response.status == 'success'){
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa môn học!',
                                    'success'
                                )
                                fetchQuiz()
                            } else {
                                Swal.fire(
                                    'Lỗi!',
                                    'Có lỗi xảy ra, vui lòng thử lại!',
                                    'error'
                                )
                            }
                        }
                    })
                }
            })
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2_THAYTHIEN\ASM_QUIZ\app\views/ListQuiz.blade.php ENDPATH**/ ?>