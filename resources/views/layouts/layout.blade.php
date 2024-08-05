@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.navbar')
<div class="dashboard-main-wrapper">
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            @yield('content')
            @yield('script')
        </div>
        @include('layouts.footer')
    </div>
</div>
