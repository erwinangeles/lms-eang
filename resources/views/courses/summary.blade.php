
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Learning Management System - Laravel </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.css">

    <!-- javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        #content, #sidecontent{
        min-height: 50vh;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/album/album.css" rel="stylesheet">
</head>
<body>
<header>

    <div class="navbar navbar-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{route('homepage')}}" class="navbar-brand d-flex align-items-center">
                <strong>LMSEANG</strong>
                <a class="btn btn-sm btn-warning float-right" href="{{route('admin')}}">Admin Panel</a>
                <a class="btn btn-sm btn-primary" href="{{route('homepage')}}">Dashboard</a>
            </a>
        </div>
    </div>
</header>

<style>
    .navbar {
        background-color: #2F3955;
    }
</style>
<br>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$course->course_name}} - Online Course</div>

                <div class="card-body">

                    <div class="card-body" id="content">
                        <div class="text-wrap" style="padding: 10px;">

                            <ul class="list-unstyled list-centered" style="text-align: center; list-style: inside;">
                                <h3 class="lesson-summary-title">Summary&nbsp;<span class="fill-me-up"><img src="{{asset('images/bookmark.svg')}}" width="43" height="60" /></span></h3>
                                <hr />
                                <li class="margin-bottom"><b>Getting Started</b> <a href="{{route('course', ['course' => $course->course_slug])}}">(Revisit)</a></li>
                            @foreach($modules as $module)
                                    <li class="margin-bottom"><b>{{ $module->module_name }}</b> <a href="{{route('module', ['course' => $module->course->course_slug, 'module' => $module->module_slug])}}">(Revisit)</a></li>
                                @endforeach
                                <li class="margin-bottom"><b>Summary</b> <a href="{{route('summary', ['course' => $course->course_slug])}}">(Revisit)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="col-md-12">
            <hr>
            <style>
                /*center slate to center and make 240, 140px */
                .lesson-scroller-item {
                    max-height: 180px;
                    max-width: 240px;
                    margin: 0 auto;
                }
                div.image-container.active {
                    border: 5px;
                    border-style: solid;
                    border-color: #80A441;

                }
                .not-active {
                    text-decoration: none;
                    color: black;
                }
                a:hover{
                    color: black;
                    text-decoration: none;
                }
            </style>
            <!--  Demos -->
            <div class="row">
                <div class="container lesson-footer">

                    <h5>COURSE MODULES</h5>

                    <div class="owl-carousel">


                        <a href="{{url('/course')}}/{{$course->course_slug}}" class="not-active"><div class="lesson-scroller-item" id="0">
                                <div class="image-container"><img src="{{$course->course_image}}" alt=""></div>
                                <div class="lesson-title">
                                    <strong><span class="lesson-module-number">1</span> <span class="text-uppercase">Getting Started</span></strong>
                                </div></div></a>


                        @foreach ($modules as $module)

                        <a href="{{route('module', ['course' => $course->course_slug, 'module' => $module->module_slug])}}" class="not-active"><div class="lesson-scroller-item">
                            <div class="image-container {{ (request()->is('*/'. $module->module_slug)) ? 'active' : '' }}" id="{{ $loop->iteration }}">
                                
                                @if($module->module_image)      
                                <img src="{{$module->module_image}}" alt="">
                                @else
                                <img src="https://via.placeholder.com/250x140?text={{$module->module_name}}" alt="">
                                @endif
                            </div>
                    <div class="lesson-title">
                        <strong><span class="lesson-module-number">{{ $loop->iteration+1}}</span> <span class="text-uppercase">{!! $module->module_name !!}</span></strong>
                       </div></div></a>
                            @if($loop->last)
                                <a href="{{url('/')}}/{{$course->course_slug}}/summary" class="not-active"><div class="lesson-scroller-item"><div class="image-container active" id="{{ $loop->iteration+1}}"><img src="{{url('/images/summary.png')}}" alt=""></div>
                                        <div class="lesson-title">
                                            <strong><span class="lesson-module-number"></span> <span class="text-uppercase">Summary</span></strong>
                                        </div></div></a>

                    </div>
                            @endif
                        @endforeach

                </div>
            </div>
        </div>
<footer class="text-muted">
</footer>
        <style>
            .owl-carousel{
                touch-action: none;
            }
        </style>
        <script>
            $(document).ready(function() {
                $('.owl-carousel').owlCarousel({
                    margin: 10,
                    nav: true,
                    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 5
                        }
                    }
                });
                /*get active module number */
                var get_active = $('div.image-container.active').attr('id');
                $('.owl-carousel').trigger('to.owl.carousel', get_active);
            })

        </script>

<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script>
    (function () {
        'use strict'

        feather.replace()
    }())
</script>
</body>
</html>
