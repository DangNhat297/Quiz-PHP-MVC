@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Làm quiz</h5>
            </div>
            <div class="ibox-content">
                <div id="wizard">
                    @foreach ($questions as $key => $question)
                        <h1>{{ ++$key }}</h1>
                        <div class="step-content" data-question-id="{{$question->id}}">
                            <form class="m-t-md">
                                <h3>{{ $question->name }}</h3>
                                @if($question->img != 'null' && $question->img != '' && $question->img != null)
                                    <img style="display:block;max-width:150px;margin:10px 0" src="{{$question->img}}">
                                @endif
                                @php
                                    $countCorrect = count(
                                        array_filter($question->answer, function ($n) {
                                            $n = (object)$n;
                                            return $n->is_correct == 1;
                                        })
                                    );
                                @endphp
                                @if ($countCorrect > 1)
                                    @foreach ($question->answer as $answer)
                                        @php $answer = (object)$answer @endphp
                                        <div class="i-checks my-2">
                                            <label> 
                                                <input type="checkbox" name="answer" value="{{$answer->id}}"> 
                                                <span class="font-weight-bold ml-2">{{$answer->content}}</span>
                                            </label>
                                        </div>
                                        @if($answer->img != 'null' && $answer->img != '' && $answer->img != null)
                                            <img src="{{$answer->img}}" style="display:block;max-width:150px;margin:10px 0;">
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($question->answer as $answer)
                                        @php $answer = (object)$answer @endphp
                                        <div class="i-checks my-2">
                                            <label>
                                                <input type="radio" value="{{$answer->id}}" name="answer"> <i></i>
                                                <span class="font-weight-bold ml-2">{{$answer->content}}</span>
                                            </label>
                                        </div>
                                        @if($answer->img != 'null' && $answer->img != '' && $answer->img != null)
                                            <img src="{{$answer->img}}" style="display:block;max-width:150px;margin:10px 0;">
                                        @endif
                                    @endforeach
                                @endif
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="ibox-footer">
                <div class="col-md-12 d-flex justify-content-between">
                    <h3 class="font-weight-bold">Thời gian làm bài: {{$time}} phút</h3>
                    <h3 class="font-weight-bold countdown"></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {

        $(document).on("keydown", disableF5)

        $quizID = lastParam()

        // console.log($quizID)
        // return

        function createStudentQuiz(){
            var ajax =  $.ajax({
                url: '{{route("api/lam-quiz")}}',
                type: 'POST',
                dataType: 'json',
                data: {quiz_id: $quizID},
                async: false
            })
            return ajax.responseJSON
        }

        // console.log(createStudentQuiz())
        // return

        $studentQuizID = createStudentQuiz().id

        console.log($studentQuizID)

        function submitAnswer(question, answer = []){
            $.ajax({
                url: '{{route("api/lam-quiz/tra-loi")}}',
                type: 'POST',
                dataType: 'json',
                data: {student_quiz_id: $studentQuizID, question_id: question, answer: answer},
                success: function(response){
                    if(response.status == 'error'){
                        Swal.fire(
                                    'Lỗi!',
                                    'Có lỗi xảy ra, vui lòng thử lại!',
                                    'error'
                                )
                    }
                }
            })
        }

        $("#wizard").steps({
            enableAllSteps: true,
            titleTemplate: "#title#",
            labels: {
                finish: 'Kết thúc',
                next: 'Câu tiếp',
                previous: 'Câu trước',
            },
            // contentMode: 'async',
            // transitionEffect: "slideLeft",
            // stepsOrientation: "vertical",
            onStepChanged: function (event, currentIndex, priorIndex) {
                // console.log(priorIndex)
                $questionID = $('.step-content:eq(' + priorIndex + ')').data('question-id')
                $answer = []
                $('.step-content:eq(' + priorIndex + ')').find('input[name="answer"]').each(function(){
                    if($(this).is(':checked')) $answer.push($(this).val())
                })
                if($answer.length > 0){
                    // console.log('question: ' + $questionID)
                    // console.log('answer: ' + $answer) 
                    submitAnswer($questionID, $answer)  
                }
                // return
                
                // return true
            },
            onFinished: function (event, currentIndex) {
                $questionID = $('.step-content:eq(' + currentIndex + ')').data('question-id')
                $answer = []
                $('.step-content:eq(' + currentIndex + ')').find('input[name="answer"]').each(function(){
                    if($(this).is(':checked')) $answer.push($(this).val())
                })
                if($answer.length > 0){
                    // console.log('question: ' + $questionID)
                    // console.log('answer: ' + $answer) 
                    submitAnswer($questionID, $answer)  
                }
                Swal.fire({
                    text: "Bạn có chắc chắc muốn kết thúc bài làm?!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Nộp bài!',
                    cancelButtonText: 'Tiếp tục làm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{route("api/quiz/finish")}}',
                            type: 'POST',
                            data: {id: $studentQuizID},
                            dataType: 'json',
                            success: function(response){
                                if(response.status == 'success'){
                                    window.location.href = '{{route("ket-qua")}}/' + $studentQuizID
                                }
                            }
                        })
                    }
                })
            }
        })
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        })
        countDown($('.countdown'), {{$time}})
    })
</script>
@endsection
