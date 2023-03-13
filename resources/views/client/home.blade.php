@extends('layouts.footer')
@extends('layouts.master')
@extends('layouts.header')
@section('content')
    <h2>Client</h2>
    @if (Auth::check())
        Xin chào : {{ Auth::user()->name }}
        <a href="{{ route('logout') }}">Đăng xuất</a>
    @endif
@endsection
