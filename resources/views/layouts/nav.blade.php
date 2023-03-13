<h2>Quản trị</h2>
@if(Auth::check())
Xin chào : {{Auth::user()->name}}
<a href="{{route('logout')}}">Đăng xuất</a>
@endif
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="/admin/users/index">User</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/categories/index">Categories</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/posts/index">Posts</a>
    </li>

</ul>
