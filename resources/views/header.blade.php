<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="collapse navbar-collapse">
            <div class="account mb-3">
                <a href="#">
                    <i class="fa-regular fa-user"></i><br>
                    Tài Khoản
                </a>
                <ul class="menu_user">
                    @if (Auth::user())
                        @if (Auth::user()->role == 0)
                            <li><a href="{{ route('logout') }}" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                            <li><a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i>Profile</a></li>
                        @else
                            <li><a href="{{ route('logout') }}" onclick="return confirm('Bạn có chắc muốn đăng xuất?')"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                            <li><a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i>Profile</a></li>
                            <li><a href="{{ route('admin') }}"><i class="fa-solid fa-people-roof"></i>Trang Admin</a></li>
                        @endif

                    @else
                        <li><a href="{{ route('register') }}"><i class="fa-solid fa-registered"></i>Đăng Ký</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i>Đăng Nhập</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
