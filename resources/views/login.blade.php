@extends('layouts.footer')
@extends('layouts.master')
@extends('layouts.header')
@section('content')
    <div class="card text-center" style="width: 25rem; height: 21rem; margin-top: 10rem; margin-left: 20rem">
        @if (session('message'))
            <span style="color: red">{{ session('message') }}</span>
        @endif
        <form method="post" action="{{ route('checkLogin') }}" class="">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email">
            </div> @error('email')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div> @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" value="remember" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Nhớ đăng nhập</label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            @csrf
        </form>
        <a href="/dang-ky">Đăng ký</a>
    </div>
@endsection
