<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini pt-3-5">
    <div class="wrapper">

        @include('includes.navbar')
    
        @include('includes.sidebar')

        @yield('content')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @include('includes.scripts')
    @yield('pagescripts')
    @include('flash-message')
    @yield('modal')
</body>

</html>