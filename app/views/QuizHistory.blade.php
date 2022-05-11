@extends('layouts.master')

@section('main')
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
                        @foreach($quizs as $quiz)
                        <tr>
                            <td class="font-weight-bold">{{ $quiz->name }}</td>
                            <td class="font-weight-bold">{{ $quiz->score }}</td>
                            <td class="font-weight-bold">{{ \App\Helpers\Helper::minuteBetween($quiz->start_time, $quiz->end_time) }}</td>
                            <td class="font-weight-bold">{{ ($quiz->end_time) ? 'Đã hoàn thành' : 'Chưa hoàn thành' }}</td>
                            <td class="font-weight-bold"><a href="{{route('ket-qua/' . $quiz->id)}}" class="btn btn-primary">Xem</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
@endsection