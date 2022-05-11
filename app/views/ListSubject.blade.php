@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-12">
    <a href="<?=route('mon-hoc/tao-moi')?>" class="btn btn-primary mb-3">Tạo mới môn học</a>
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Quản lý môn học</h5>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên môn học</th>
                            <th>Tác giả</th>
                            <th>Hành động</th>
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
            <form id="update-subject">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="subject" class="form-control" placeholder="Nhập tên danh mục" required>
                        <input type="hidden" name="id">
                        <p class="text-danger error"></p>
                    </div>
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
        $('.pre-loader').show()
        function fetchSubject() {
            $.ajax({
                url: '{{ route("api/subject") }}',
                dataType: 'json',
                type: 'GET',
                success: function(response) {
                    let html = response.data.map(value => {
                        return `<tr>
                                    <td class="font-weight-bold">${value.name}</td>
                                    <td class="font-weight-bold">${value.author_name}</td>
                                    <td>
                                        <a href="<?=route('mon-hoc/quizs/tao-moi')?>?subject=${value.id}" class="btn btn-info"><i class="far fa-plus-square"></i></a>
                                        <a href="<?=route('mon-hoc/quizs')?>?subject=${value.id}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <button data-toggle="modal" data-target="#myModal5" class="btn btn-success edit-subject" data-subject-id="${value.id}"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-danger delete-subject" data-subject-id="${value.id}"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>`
                    }).join('')
                    $('.table tbody').html(html)
                    $('.pre-loader').fadeOut(500)
                }
            })
        }
        fetchSubject()

        $(document).on('click', '.edit-subject', function() {
            $('.modal').find('input').val(null)
            $('.modal').find('input, button').prop('disabled', false)
            $('.modal').find('p.error').text('')
            $('.modal').find('button[type="submit"]').html('Cập nhật')
            $id = $(this).data('subject-id')
            $.ajax({
                url: '{{ route("api/subject/") }}' + $id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('.modal').find('input[name="subject"]').val(response.name)
                    $('.modal').find('input[name="id"]').val(response.id)
                }
            })
        })

        $('#update-subject').submit(function(e) {
            e.preventDefault()
            $this = $(this)
            $this.find('p.error').text('')
            $btn = $this.find('button[type="submit"]')
            $id = $this.find('input[name="id"]').val()
            $subject = $this.find('input[name="subject"]').val()
            $.ajax({
                url: '{{ route("api/subject/") }}' + $id,
                type: 'POST',
                dataType: 'json',
                data: {
                    subject: $subject
                },
                beforeSend: function() {
                    $btn.html('<i class="fas fa-cog fa-spin"></i> Đang xử lý').prop('disabled', true)
                },
                success: function(response) {
                    setTimeout(() => {
                        if (response.status == 'success') {
                            $btn.html('<i class="fas fa-check"></i> Đã cập nhật')
                            $this.find('input').prop('disabled', true)
                            fetchSubject()
                        } else {
                            $this.find('p.error').text('Có lỗi xảy ra, vui lòng thử lại')
                            $btn.html('Cập nhật').prop('disabled', false)
                        }
                    }, 1000)
                }
            })
        })

        $(document).on('click', '.delete-subject', function() {
            $id = $(this).data('subject-id')
            Swal.fire({
                text: "Bạn có chắc muốn xóa môn học này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa ngay!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("api/subject/") }}' + $id,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa môn học!',
                                    'success'
                                )
                                fetchSubject()
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
@endsection