@extends('layouts.master')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Kết quả quiz</h5>
                </div>
                <div class="ibox-content">
                    <ul class="list-group">
                        <li class="list-group-item font-weight-bold">Số câu hỏi: {{ $countQuestion }}</li>
                        <li class="list-group-item font-weight-bold">Số câu đã trả lời: {{ count($questionsAnswered) }}
                        </li>
                        <li class="list-group-item font-weight-bold">Trả lời đúng: {{ count($questionsCorrect) }}</li>
                        <li class="list-group-item font-weight-bold">Thời gian làm bài: {{ $time }}</li>
                        <li class="list-group-item font-weight-bold">Điểm: {{ $score }}</li>
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
                    @foreach ($questions as $question)
                        <ul class="list-group font-weight-bold my-3">
                            <li class="list-group-item active">
                                {{ $question->name }}
                                @if ($question->img != 'null' && $question->img != '' && $question->img != null)
                                    <img src="{{ $question->img }}" style="display:block;max-width:150px;margin:10px 0;" referrerpolicy="no-referrer">
                                @endif
                            </li>
                            @foreach($question->answer as $answer)
                            <li class="list-group-item my-1 {{($answer->is_correct == 1 ? 'border border-success' : '')}}">
                                {{ $answer->content }}
                                @if ($answer->img != 'null' && $answer->img != '' && $answer->img != null)
                                    <img src="{{ $answer->img }}" style="display:block;max-width:150px;margin:10px 0;" referrerpolicy="no-referrer">
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
