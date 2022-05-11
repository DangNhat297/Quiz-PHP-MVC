@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Quản lý người dùng</h5>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
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
@endsection

@section('custom-script')
<script>
    $(document).ready(function(){
        function fetchUser(){
            $.ajax({
                url: '{{route("api/user")}}',
                dataType: 'json',
                success: function(response){
                    let html = response.data.map(value => {
                        return `<tr>
                                    <td class="font-weight-bold">${value.name}</td>
                                    <td class="font-weight-bold">${value.email}</td>
                                    <td class="text-right">
                                        <button class="btn btn-danger delete-user" data-user-id="${value.id}"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>`
                    }).join('')
                    $('.table tbody').html(html)
                }
            })
        }
        fetchUser()

        $(document).on('click', '.delete-user', function() {
            $id = $(this).data('user-id')
            Swal.fire({
                text: "Bạn có chắc muốn xóa người dùng này?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa ngay!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url     : '{{route("api/user/")}}' + $id,
                        type    : 'DELETE',
                        dataType: 'json',
                        success : function(response){
                            if(response.status == 'success'){
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa người dùng!',
                                    'success'
                                )
                                fetchUser()
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