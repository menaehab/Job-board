<!DOCTYPE html>
<html lang="en">
@include('theme.partials.head')

<body>
    @include('theme.partials.navbar')
    <div class="container-xxl bg-white p-0">
        @yield('content')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @include('theme.partials.footer')
    <!-- JavaScript Libraries -->
    @include('theme.partials.script')
</body>

</html>
