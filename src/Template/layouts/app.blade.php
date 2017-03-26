<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{sys()->getLocale()}}">

@section('htmlheader')
    @include('layout::partials.htmlheader')
@show
<body class="skin-blue layout-top-nav ">
<div class="wrapper">

    @if(!isset($error_call) || !$error_call)
        @include('layout::partials.mainheader')
    @endif

    {{--@include('layouts.partials.sidebar')--}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        {{--@include('layouts.partials.contentheader')--}}

        {{-- Flash message --}}
        @if (Session::has('flash_notification.message'))
            <div class="alert alert-{{ Session::get('flash_notification.level') }} flat">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ Session::get('flash_notification.message') }}
            </div>
        @endif
        {{-- End Flash Message --}}

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    {{--@include('layouts.partials.controlsidebar')--}}

    @include('layout::partials.footer')

</div><!-- ./wrapper -->
<div id="body-hidden-container" style="display: none;">
    @yield('hidden-container')
</div>
@section('scripts')
    @include('layout::partials.scripts')
@show

</body>
</html>
