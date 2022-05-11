@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>List Câu Hỏi Quiz</h5>
            </div>
            <div class="ibox-content">
            @foreach($questions as $question)
                <div class="panel panel-primary">
                    <div class="panel-heading font-weight-bold">
                        <h3>Câu hỏi: {{$question->name}}</h3>
                        @if($question->img != 'null' && $question->img != '' && $question->img != null)
                            <img style="display:block;max-width:150px;margin:10px 0" referrerpolicy="no-referrer" src="{{$question->img}}">
                        @endif
                    </div>
                    <div class="panel-content">
                        <ul class="todo-list">
                            @foreach($question->answers as $answer)
                            <li><span class="font-weight-bold">{{$answer->content}}</span>
                                @if($answer->is_correct == 1)
                                    <small class="label label-primary"><i class="fa fa-check"></i> Đáp án</small>
                                @endif
                                @if($answer->img != 'null' && $answer->img != '' && $answer->img != null)
                                    <img src="{{$answer->img}}" referrerpolicy="no-referrer" style="display:block;max-width:150px;margin:10px 0;">
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary edit-question" data-question-id="{{$question->id}}" data-toggle="modal" data-target="#edit-question"><i class="far fa-edit"></i></button>
                        <button class="btn btn-danger delete-question" data-question-id="{{$question->id}}"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ibox-footer">
                <button class="add-question" data-toggle="modal" data-target="#myModal5"><i class="fas fa-plus-square"></i> Thêm câu hỏi</button>
            </div>
        </div>
    </div>
</div>
<!--add new question-->
<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="add-question">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Câu hỏi</label>
                        <textarea name="question" rows="2" placeholder="Nhập câu hỏi..." class="form-control"></textarea>
                        <label for="question_img" class="label-attach-img mt-2"><i class="fas fa-plus"></i> Đính kèm ảnh</label>
                        <input type="file" id="question_img" accept=".jpg, .png, .jpeg" class="file-attach" hidden>
                        <input type="hidden" name="question_img" class="value_base64">
                    </div>
                    <hr>
                    <hr>
                    <button type="button" class="add-answer"><i class="fas fa-plus"></i> Thêm câu trả lời</button>
                    <p class="text-danger text-center"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--edit question-->
<div class="modal inmodal fade" id="edit-question" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="update-question">
                <input type="hidden" name="question-id">
                <div class="modal-body">
                    <div class="form-group question">
                        <label>Câu hỏi</label>
                        <textarea name="question" rows="2" placeholder="Nhập câu hỏi..." class="form-control"></textarea>
                        <label for="current_question_img" class="label-attach-img mt-2"><i class="fas fa-plus"></i> Đính kèm ảnh</label>
                        <input type="file" id="current_question_img" accept=".jpg, .png, .jpeg" class="file-attach" hidden>
                        <input type="hidden" name="question_img" class="value_base64">
                        <img class="preview">
                    </div>
                    <hr>
                    <hr class="end-show-answer">
                    <button type="button" class="add-answer"><i class="fas fa-plus"></i> Thêm câu trả lời</button>
                    <p class="text-danger text-center"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {
        $quiz = lastParam()
        var count = 0
        $('.add-answer').click(function() {
            count = $(this).closest('.modal-content').find('.form-group.answer').length
            $(this).prev('hr').before(`<div class="form-group answer">
                                            <textarea name="answer[]" rows="2" placeholder="Nhập câu trả lời..." class="form-control" required></textarea>
                                            <div class="form-check abc-checkbox abc-checkbox-primary mt-2">
                                                <input class="form-check-input" value="${count}" name="answer_correct[]" type="checkbox" id="answer${count}">
                                                <label class="form-check-label" for="answer${count}"> Đáp án đúng </label>
                                            </div>
                                            <label for="answer_img${count}" class="label-attach-img mt-2"><i class="fas fa-plus"></i> Đính kèm ảnh</label>
                                            <input type="file" id="answer_img${count}" accept=".jpg, .png, .jpeg" class="file-attach" hidden>
                                            <input type="hidden" name="answer_img${count}" class="value_base64">
                                            <button class="delete-row-answer"><i class="far fa-trash-alt"></i></button>
                                        </div>`)
            // count++
            console.log(count)
        })
        $('.add-question').click(function() {
            count = 0
            $('.modal').find('input, textarea').val('')
            $('.modal').find('input:checkbox').prop('checked', false)
            $('.modal').find('span.filename').remove()
            $('.modal').find('.form-group.answer').remove()
        })
        $('#add-question').submit(function(e) {
            e.preventDefault()
            $(this).find('.text-danger').text('')
            $data = new FormData(this)
            if($data.getAll('answer_correct[]').length == 0){
                $(this).find('.text-danger').text('Vui lòng chọn đáp án đúng')
                return
            }
            $data.append('quiz_id', $quiz)
            $.ajax({
                url: '{{ route("api/question") }}',
                type: 'POST',
                dataType: 'json',
                data: $data,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response)
                    if (response.status == 'success') {
                        $('[data-dismiss="modal"]').trigger('click')
                        // return
                        window.location.reload()
                    } else {
                        $('.modal').find('.text-danger').text('Có lỗi xảy ra, vui lòng thử lại')
                    }
                }
            })
        })

        $('.delete-question').click(function() {
            $id = $(this).data('question-id')
            Swal.fire({
                text: "Bạn có chắc muốn xóa câu hỏi này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa ngay!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("api/question/") }}' + $id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa câu hỏi!',
                                    'success'
                                )
                                window.location.reload()
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
        $(document).on('click', '.delete-row-answer', function(){
            $modal = $(this).closest('.modal-body')
            $(this).parent('.form-group').remove()
            $modal.find('.form-group.answer').each(function(index, element){
                $(element).find('.label-attach-img').attr('for', 'answer_img' + index)
                $(element).find('.form-check-input').attr('id', 'answer' + index)
                $(element).find('.form-check-label').attr('for', 'answer' + index)
                $(element).find('.file-attach').attr('id', 'answer_img' + index)
                $(element).find('.value_base64').attr('name', 'answer_img' + index)
            })
            // $(this).closest('.modal-body').find('.form-group.answer').each(function(index, element){
            //     console.log(element)
            // })
        })
        // edit question
        $('.edit-question').click(function(){
            $('.pre-loader').show()
            $id = $(this).data('question-id')
            $modal = $('#edit-question.modal')
            $modal.find('input, textarea').val('')
            $modal.find('input:checkbox').prop('checked', false)
            $modal.find('span.filename').remove()
            $modal.find('.form-group.answer').remove()
            $modal.find('button.delete-image').remove()
            $.ajax({
                url: '{{ route("api/question/") }}' + $id,
                dataType: 'json',
                success: function(response){
                    console.log(response)
                    $modal.find('[name="question_img"]').val(response.img)
                    $modal.find('[name="question-id"]').val(response.id)
                    $modal.find('[name="question"]').val(response.name)
                    if(response.img && response.img != '' && response.img != 'null'){
                        $('.form-group.question').append(`<button class="delete-image"><i class="fas fa-times"></i></button>`)
                    }
                    $.each(response.answers, function(index, value){
                        $html = `<div class="form-group answer">
                                    <textarea name="answer[]" rows="2" placeholder="Nhập câu trả lời..." class="form-control" required>${value.content}</textarea>
                                    <div class="form-check abc-checkbox abc-checkbox-primary mt-2">
                                        <input class="form-check-input" value="${index}" name="answer_correct[]" type="checkbox" id="answer${index}" ${value.is_correct==1 ? 'checked' : ''}>
                                        <label class="form-check-label" for="answer${index}"> Đáp án đúng </label>
                                    </div>
                                    <label for="answer_img${index}" class="label-attach-img mt-2"><i class="fas fa-plus"></i> Đính kèm ảnh</label>
                                    <input type="file" id="answer_img${index}" accept=".jpg, .png, .jpeg" class="file-attach" hidden>
                                    <input type="hidden" name="answer_img${index}" value="${value.img}" class="value_base64">
                                    <img class="preview" referrerpolicy="no-referrer">`
                        if(value.img && value.img != 'null' && value.img != 'NULL' && value.img != ''){
                            $html += `<button class="delete-image"><i class="fas fa-times"></i></button>`
                        }   
                        $html += `<button class="delete-row-answer" ><i class="far fa-trash-alt"></i></button>
                            </div>`
                        $('hr.end-show-answer').before($html)
                    })
                    $('.preview').attr({'src': function(index, attr){
                        return $('.preview').eq(index).prev().val() == 'null' ? '' : $('.preview').eq(index).prev().val()
                    }, 'style': 'max-width:150px;margin:10px 0;'})
                    $('.pre-loader').fadeOut(1000)
                    $("[data-toggle=popover]").popover()
                }
            })
        })
        $(document).on('click', '.delete-image', function(e){
            e.preventDefault()
            $(this).prev().attr('src', '')
            $row = $(this).closest('.form-group')
            $row.find('[type="file"]').val('')
            $row.find('.value_base64').val('')
            $(this).remove()
        })
        $('#update-question').submit(function(e){
            e.preventDefault()
            $this = $(this)
            $idQuestion = $this.find('[name="question-id"]').val()
            $data = new FormData(this)
            $this.find('.text-danger').text('')
            $data = new FormData(this)
            if($data.getAll('answer_correct[]').length == 0){
                $this.find('.text-danger').text('Vui lòng chọn đáp án đúng')
                return
            }
            $.ajax({
                url: '{{ route("api/question/") }}' + $idQuestion,
                type: 'POST',
                dataType: 'json',
                data: $data,
                contentType: false,
                processData: false,
                success: function(response){
                    if (response.status == 'success') {
                        $('[data-dismiss="modal"]').trigger('click')
                        window.location.reload()
                    } else {
                        $this.find('.text-danger').text('Có lỗi xảy ra, vui lòng thử lại')
                    }
                }
            })

        })
    })
</script>
@endsection