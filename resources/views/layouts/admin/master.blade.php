<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Metro Admin Template.">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->


    <!-- start: CSS -->



    <link id="bootstrap-style" href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('admin/assets/css/style-responsive.css')}}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->



    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>




    <!--[if IE 9]>

    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{URL::to('admin/assets/img/favicon.ico')}}">

@yield('after-style')
    <!-- end: Favicon -->




</head>

<body>
<!-- start: Header -->
@include('layouts.admin.include.header')
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        @include('layouts.admin.include.left-sidebar')

        <!-- start: Content -->
        <div id="content" class="span10">
            @include('layouts.common.message')
            @yield('content')

        </div>

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->




<div class="clearfix"></div>


<!-- start: JavaScript-->

<script src="{{asset('admin/assets/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery-migrate-1.0.0.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.ui.touch-punch.js')}}"></script>

<script src="{{asset('admin/assets/js/modernizr.js')}}"></script>

<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.cookie.js')}}"></script>

<script src='{{asset('admin/assets/js/fullcalendar.min.js')}}'></script>

<script src='{{asset('admin/assets/js/jquery.dataTables.min.js')}}'></script>

<script src="{{asset('admin/assets/js/excanvas.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.flot.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.flot.resize.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.chosen.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.uniform.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.cleditor.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.noty.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.elfinder.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.raty.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.iphone.toggle.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.uploadify-3.1.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.gritter.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.imagesloaded.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.masonry.min.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.knob.modified.js')}}"></script>

<script src="{{asset('admin/assets/js/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('admin/assets/js/counter.js')}}"></script>

<script src="{{asset('admin/assets/js/retina.js')}}"></script>

<script src="{{asset('admin/assets/js/custom.js')}}"></script>


<!-- end: JavaScript-->

@yield('script')

</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->
</html>
