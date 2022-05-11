@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Thêm Quiz</h5>
            </div>
            <div class="ibox-content">
                <form method="POST" id="add-quiz" class="form">
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
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name . ' - ' . $subject->author_name }}</option>
                                @endforeach
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
                            <input class="form-control" type="text" name="daterange" value="30/01/2022 00:00:00 - 20/02/2022 23:59:59" />
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
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {
        $subject = (getParam('subject') && getParam('subject') != '') ? getParam('subject') : 0
        $('[name="subject_id"]').val($subject)
        $('input[name="daterange"]').daterangepicker({
            timePicker: true,
            timePickerIncrement: 1,
            opens: "center"
        })
        $('#add-quiz').submit(function(e) {
            $('p.subject').text('')
            e.preventDefault()
            $this = $(this)
            $btn = $this.find('button[type="submit"]')
            $data = new FormData(this)
            $errors = []
            if ($this.find('[name="subject_id"]').val() == 0 || $this.find('[name="subject_id"]').val() == '') {
                $errors.push('subject')
                $('p.subject').text('Vui lòng chọn môn học')
            }
            if ($errors.length > 0) return
            $.ajax({
                url: '{{ route("api/quiz") }}',
                type: 'POST',
                contentType: false,
                processData: false,
                data: $data,
                dataType: 'json',
                beforeSend: function() {
                    $btn.html('<i class="fas fa-cog fa-spin"></i> Đang xử lý').prop('disabled', true)
                },
                success: function(response) {
                    setTimeout(() => {
                        if (response.status == 'success') {
                            Swal.fire(
                                'Thành công!',
                                'Thêm quiz thành công',
                                'success'
                            )
                            $this.find('input').val('')

                        } else {
                            Swal.fire(
                                    'Thất bại!',
                                    'Có lỗi xảy ra, vui lòng thử lại!',
                                    'error'
                                )
                        }
                        $btn.html('Thêm').prop('disabled', false)
                    }, 1000)
                }
            })
        })
    })
</script>
@endsection