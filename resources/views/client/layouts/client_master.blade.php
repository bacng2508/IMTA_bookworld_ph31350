<!DOCTYPE html>
<html lang="zxx">

<!-- Start: Head -->
@include('client.partrials.head')
<!-- End: Head -->

<body>
    <div class="site-wrapper" id="top">
        <!-- Start: Header -->
        @include('client.partrials.header')
        <!-- End: Header -->

        <main class="main">
            @yield('page-content')
        </main>
    </div>

    <!-- Start: Footer -->
    @include('client.partrials.footer')
    <!-- End: Footer -->

    <!-- Start: Script -->
    @include('client.partrials.script')
    <!-- End: Script -->

    <!-- Start: Custom script -->
    @stack('scripts')
    <!-- End: Custom script -->
</body>


<!-- Mirrored from htmldemo.net/pustok/pustok/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Aug 2024 03:59:22 GMT -->
</html>