<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobEntry</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <a href="{{ route('jobs.index') }}" class="nav-item nav-link">Job List</a>
            @if (Auth::guard('employer')->user() || Auth::user())
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">{{ Auth::guard('employer')->check() ? Auth::guard('employer')->user()->name : Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @if (Auth::guard('employer')->check())
                            <a href="{{ route('my-jobs') }}" class="dropdown-item">My Jobs</a>
                        @endif
                        <a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                        <form method="POST"
                            action="{{ Auth::guard('employer')->check() ? route('logoutEmployer') : route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Register</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('register') }}" class="dropdown-item">As employee</a>
                        <a href="{{ route('employer-register') }}" class="dropdown-item">As employer</a>
                    </div>
                </div>
            @endif
        </div>
        @if (Auth::guard('employer')->user())
            <a href="{{ route('jobs.create') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post
                A
                Job<i class="fa fa-arrow-right ms-3"></i></a>
        @else
            <a href="{{ route('jobs.index') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Find A
                Job<i class="fa fa-arrow-right ms-3"></i></a>
        @endif
    </div>
</nav>
<!-- Navbar End -->
