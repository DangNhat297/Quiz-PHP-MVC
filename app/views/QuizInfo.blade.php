@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox product-detail">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="product-images">
                            <div>
                                <div class="image-imitation"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h2 class="font-bold m-b-xs">
                            {{ $quiz->name }}
                        </h2>
                        <hr>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-bold">Môn học: {{ $quiz->subject_name }}</li>
                            <li class="list-group-item font-weight-bold">Thời gian: {{ $quiz->duration_minutes }} phút</li>
                            <li class="list-group-item font-weight-bold">Số câu hỏi: {{ $quiz->num_questions }}</li>
                            <li class="list-group-item font-weight-bold">Ngày bắt đầu: {{ \App\Helpers\Helper::formatDate($quiz->start_time, "d-m-Y \l\ú\c H:i") }}</li>
                            <li class="list-group-item font-weight-bold">Ngày kết thúc: {{ \App\Helpers\Helper::formatDate($quiz->end_time, "d-m-Y \l\ú\c H:i") }}</li>
                            <li class="list-group-item font-weight-bold">Trạng thái: {{ (\App\Helpers\Helper::isOpenQuiz($quiz->start_time, $quiz->end_time)) ? 'Mở' : 'Đóng' }}</li>
                        </ul>
                        <hr>
                        @if((\App\Helpers\Helper::isOpenQuiz($quiz->start_time, $quiz->end_time)))
                        <div>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm do-quiz" href="{{ route('mon-hoc/quizs/lam-quiz/' . $quiz->id) }}"><i class="fas fa-angle-double-right"></i> Làm quiz</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function(){
        $('.do-quiz').click(function(e){
            e.preventDefault()
            Swal.fire({
                text: "Bạn có chắc muốn vào làm quiz?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Làm ngay',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) window.location.href = $(this).attr('href')
            })
        })
    })
</script>
@endsection