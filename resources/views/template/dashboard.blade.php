<!DOCTYPE html>
<html lang="en">
@include('components.head')

<body id="page-top">
    <div id="wrapper">
        @include('components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('components.navbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</body>

</html>
