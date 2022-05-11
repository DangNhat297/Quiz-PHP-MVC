<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ASSIGNMENT WEB2061 | Nguyễn Đăng Nhật</title>
<link href="{{PUBLIC_PATH}}/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/font-awesome/css/all.min.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/animate.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/plugins/steps/jquery.steps.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/style.css" rel="stylesheet">
<link href="{{PUBLIC_PATH}}/css/custom.css" rel="stylesheet">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
</head>

<body>
<!-- <div id="loading">
<img id="loading-image" src="https://cdn.dribbble.com/users/172519/screenshots/3520576/dribbble-spinner-800x600.gif" alt="Loading..." />
</div> -->
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                <img alt="image" class="rounded-circle" src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg" style="width:48px;height:48px" />
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold">Nguyen Dang Nhat</span>
                    <span class="text-muted text-xs block">FPT Polytechnic <b class="caret"></b></span>
                </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a class="dropdown-item" href="profile.html">Trang cá nhân</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('dang-xuat')}}">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                N+
            </div>
        </li>
        <li>
            <a href="{{ route('') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Trang chủ</span></a>
        </li>
        @if(isAdmin())
        <li class="">
            <a href="#" aria-expanded="false"><i class="fas fa-book"></i> <span class="nav-label">Môn học</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li><a href="{{ route('mon-hoc') }}">Quản lý môn học</a></li>
                <li><a href="{{ route('mon-hoc/tao-moi') }}">Tạo mới môn học</a></li>
            </ul>
        </li>
        @endif
        @if(isAdmin())
        <li class="">
            <a href="#" aria-expanded="false"><i class="fas fa-book"></i> <span class="nav-label">Quiz</span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                <li><a href="{{ route('mon-hoc/quizs') }}">Quản lý quiz</a></li>
                <li><a href="{{ route('mon-hoc/quizs/tao-moi') }}">Tạo mới quiz</a></li>
            </ul>
        </li>
        @endif
        @if(isAdmin())
        <li>
            <a href="{{ route('nguoi-dung') }}"><i class="fas fa-users"></i> <span class="nav-label">Người dùng</span></a>
        </li>
        @endif
        @if(isAdmin())
        <li>
            <a href="{{ route('thong-ke') }}"><i class="fas fa-chart-area"></i> <span class="nav-label">Thống kê</span></a>
        </li>
        @endif
        @if(!isAdmin())
        <li>
            <a href="{{ route('lich-su') }}"><i class="fas fa-history"></i> <span class="nav-label">Lịch sử</span></a>
        </li>
        @endif
        <!-- <li>
        <a href="slides.php"><i class="far fa-images"></i> <span class="nav-label">Quản lý slide</span></a>
    </li>
    <li>
        <a href="add-slide.php"><i class="far fa-image"></i> <span class="nav-label">Thêm slide</span></a>
    </li> -->
    </ul>

</div>
</nav>
<div id="page-wrapper" class="gray-bg">
<div class="pre-loader">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>
</div>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Nhập để tìm kiếm..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Xin chào</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <div class="dropdown-messages-box">
                            <a class="dropdown-item float-left" href="#">
                                <img alt="image" class="rounded-circle" src="">
                            </a>
                            <div>
                                <small class="float-right">46 giờ trước</small>
                                <strong>Nguyễn Đăng Nhật</strong> bắt đầu theo dõi <strong>Nguyễn Đăng Nhật</strong>. <br>
                                <small class="text-muted">46 giờ trước lúc 7:58 pm - 26.07.2021</small>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-envelope"></i> <strong>Xem tất cả tin nhắn</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#" class="dropdown-item">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Bạn có 8 tin nhắn
                                <span class="float-right text-muted small">4 phút trước</span>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="#" class="dropdown-item">
                                <strong>See tất cả</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>


            <li>
                <a href="{{route('dang-xuat')}}">
                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                </a>
            </li>
        </ul>

    </nav>
</div>
<div class="wrapper wrapper-content">