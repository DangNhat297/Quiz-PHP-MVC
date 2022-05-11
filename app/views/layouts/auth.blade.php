<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NĐN | Đăng nhập</title>

    <link href="{{PUBLIC_PATH}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{PUBLIC_PATH}}/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="{{PUBLIC_PATH}}/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="{{PUBLIC_PATH}}/css/animate.css" rel="stylesheet">
    <link href="{{PUBLIC_PATH}}/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><i class="fas fa-cogs"></i></h1>

            </div>
            <p>QUIZ ONLINE
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            
            @yield('form')

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{PUBLIC_PATH}}/js/jquery-3.1.1.min.js"></script>
    <script src="{{PUBLIC_PATH}}/js/popper.min.js"></script>
    <script src="{{PUBLIC_PATH}}/js/bootstrap.js"></script>
    <script src="{{PUBLIC_PATH}}/js/plugins/iCheck/icheck.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js" integrity="sha256-hw7v8jZF/rFEdx1ZHepT4D73AFTHLu/P9kEyrNesRyc=" crossorigin="anonymous"></script>
    @yield('custom-script')
</body>

</html>