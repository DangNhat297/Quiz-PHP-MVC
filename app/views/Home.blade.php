@extends('layouts.master')

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Danh sách môn học</h5>
            </div>
            @foreach($subjects as $subject)
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table shoping-cart-table">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <div class="cart-product-imitation">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                        <a href="{{ route('mon-hoc/'. $subject->id .'/quizs') }}" class="text-navy">
                                            {{ $subject->name }}
                                        </a>
                                    </h3>
                                    <p class="font-weight-bold"><i class="fas fa-at"></i> Tác giả: {{ $subject->author_name }}</p>

                                    <div class="m-t-sm">
                                        <a href="{{ route('mon-hoc/'. $subject->id .'/quizs') }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i> Danh sách quiz</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
