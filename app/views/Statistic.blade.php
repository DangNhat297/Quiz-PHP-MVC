@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Thống kê</h5>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên quiz</th>
                            <th>Điểm trung bình</th>
                            <th class="text-right">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizs as $quiz)
                        <tr>
                            <td class="font-weight-bold">{{ $quiz->name }}</td>
                            <td class="font-weight-bold">{{ round($quiz->avg, 2) }}</td>
                            <td class="text-right">
                                <button data-toggle="modal" data-target="#quiz-result" class="btn btn-primary" data-quiz-id="{{ $quiz->quiz_id }}">Chi tiết</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal fade" id="quiz-result" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Điểm</th>
                            <th>Thời gian làm bài</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="statistic_result">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function(){
        $('[data-target="#quiz-result"]').click(function(){
            $id = $(this).data('quiz-id')
            $('#statistic_result').html('')
            $.ajax({
                url: '{{route("api/quiz/result/")}}' + $id,
                type: 'GET',
                dataType: 'json',
                success: function(res){
                    let html = res.data.map(value => {
                        return `<tr>
                                    <td class="font-weight-bold">${value.name}</td>
                                    <td class="font-weight-bold">${value.score}</td>
                                    <td class="font-weight-bold">${value.time}</td>
                                    <td class="font-weight-bold">${value.status}</td>
                                </tr>`
                    }).join('')
                    $('#statistic_result').html(html)
                }
            })
        })
    })
</script>
@endsection