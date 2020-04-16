<!--
=========================================================

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
   @include('Admin.layouts.header')
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('../assets/img/sidebar-1.jpg')}}">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        @include('Admin.layouts.sidebar')

    </div>
    <div class="main-panel">
        <!-- Navbar -->
        @include('Admin.layouts.topNavbar')
        <!-- End Navbar -->
        <div class="content">

            @yield('content')

        </div>
        <footer class="footer">
            @include('Admin.layouts.footer')
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
@include('Admin.layouts.scripts')
</body>

</html>
