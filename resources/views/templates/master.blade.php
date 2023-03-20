<!DOCTYPE html>
<html lang="en">

@include('templates.header')

<body>
    
    @include('templates.navbar')

    @include('templates.sidebar')

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    @include('templates.footer')
    @include('sweetalert::alert')

</body>

</html>
