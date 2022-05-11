@extends('layouts.master')

@section('main')
<div class="row">
    @foreach($quizs as $quiz)
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation"></div>
                <div class="product-desc">
                    <a href="{{ route('quiz/' . $quiz->id) }}" class="product-name">{{ $quiz->name }}</a>
                    <ul>
                        <li>Thời gian: {{ $quiz->duration_minutes }} phút</li>
                        <li>Trạng thái: {{ (\App\Helpers\Helper::isOpenQuiz($quiz->start_time, $quiz->end_time)) ? 'Mở' : 'Đóng' }}</li>
                    </ul>
                    <div class="m-t text-righ">
                        <a href="{{ route('quiz/' . $quiz->id) }}" class="btn btn-xs btn-outline btn-primary">Chi tiết <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @if(count($quizs) == 0)
    <div class="col-md-12">
        <div class="alert alert-danger text-center font-weight-bold">Môn học này chưa có quiz!</div>
    </div>
    @endif
</div>
@endsection