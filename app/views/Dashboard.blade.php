@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-lg-4">
        <div class="widget style1 red-bg">
            <div class="row">
                <div class="col-4 text-center">
                    <i class="fas fa-tshirt fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> Môn học </span>
                    <h2 class="font-bold">{{$countSubject}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fas fa-archive fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> Quiz </span>
                    <h2 class="font-bold">{{$countQuiz}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fas fa-users fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> Người dùng </span>
                    <h2 class="font-bold">{{$countStudent}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection