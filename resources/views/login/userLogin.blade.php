@extends('frontend.layout.front')

@section('title', trans('messages.personalName'))

@section('content')

    <style>
        #heroC {
            width: 100%;
            height: 80px;
            background: #37517e;
        }
    </style>

    <div id="heroC">

    </div>

<div class="container pt-5 pb-5 text-right">
    <div class="row mx-auto d-flex justify-content-center">
        <form class="col-xs-12 col-sm-12 col-md-6 col-lg-6" action="{{ route('dologin') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">نام کاربری</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام کاربری خود را وارد کنید">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">کلمه عبور</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="کلمه عبور خود را وارد کنید">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label pr-3" for="exampleCheck1">
                    مرا بخاطر بسپار
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">ارسال</button>
        </form>
    </div>
</div>

@endsection
