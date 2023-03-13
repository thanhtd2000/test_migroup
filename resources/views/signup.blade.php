@extends('layouts.footer')
@extends('layouts.master')
@extends('layouts.header')
@section('content')
    <div class="card text-center" style="width: 25rem; height: 27rem; margin-top: 5rem; margin-left: 20rem">
        @if (session('message'))
            <span style="color: red">{{ session('message') }}</span>
        @endif
        <form method="post" action="{{ route('user.dangky') }}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                    value="{{ old('email') }}">
            </div>
            @error('email')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nhập lại Mật khẩu</label>
                <input type="password" class="form-control" id="exampleInputText" name="password_confirmation">
            </div>
            @error('password_confirmation')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <input type="hidden" name="role" value="1">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" id="exampleInputText" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            @csrf
        </form>
        <a href="/">Đăng nhập</a>
    </div>
@endsection
