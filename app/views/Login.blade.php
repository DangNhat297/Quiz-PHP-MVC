@extends('layouts.auth')

@section('form')
<form class="m-t" role="form" action="" method="POST" id="formLogin">
    <div class="form-group">
        <input type="email" name="email" class="form-control" value="{{$_COOKIE['email'] ?? $email ?? ''}}" placeholder="Email" required>
        <span class="form-text error email m-b-none"></span>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" value="{{$_COOKIE['password'] ?? $password ?? ''}}" placeholder="Mật khẩu" required>
        <span class="form-text error password m-b-none"></span>
    </div>
    <div class="form-group">
        <div class="checkbox i-checks"><label for="remember"> <input value="remember" name="remember"
                    id="remember" type="checkbox" {{$_COOKIE['remember'] ?? ''}}><i></i> Nhớ mật khẩu </label></div>
    </div>
    <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>
    <p class="text-muted text-center"><small>Bạn chưa có tài khoản?</small></p>
</form>
@endsection

@section('custom-script')
<script>
    $(document).ready(function () {
        $('.errormessage').hide()
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        })

        $('#formLogin').submit(function(e){
            e.preventDefault()
            $('span.error').text('')
            $this = $(this)
            $btn = $this.find('button[type="submit"]')
            $email = $this.find('input[name="email"]').val()
            $password = $this.find('input[name="password"]').val()
            $remember = null
            if($('#remember').is(':checked')) $remember = true
            $.ajax({
                url         : '{{ route("api/login") }}',
                type        : 'POST',
                dataType    : 'json',
                data        : {email: $email, password: $password, remember: $remember},
                beforeSend  : function(){
                    $btn.html('<i class="fas fa-cog fa-spin"></i> Đang xử lý').prop('disabled', true)
                },
                success     : function(response){
                    setTimeout(() => {
                        if(response.status == 'success'){
                            // console.log(response)
                            Swal.fire(
                                'Thành công!',
                                'Đăng nhập thành công!',
                                'success'
                            )
                            setTimeout(() => {
                                window.location.href = './'
                            }, 1000)
                        }
                    },1000)
                },
                error       : function(err){
                    setTimeout(() => {
                        Swal.fire(
                            'Thất bại!',
                            'Có lỗi xảy ra, vui lòng thử lại!',
                            'error'
                        )
                        $.each(err.responseJSON.message, function(index, value){
                            $('span.error.' + index).text(value)
                        })
                    },1000)
                },
                complete    : function(){
                    setTimeout(() => {
                        $btn.html('Đăng nhập').prop('disabled', false)
                    },1000)
                }
            })
        })
    })
</script>
@endsection