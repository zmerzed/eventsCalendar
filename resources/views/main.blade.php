<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.0/angular.min.js"></script>

    <script src="{{ asset('js/module.js') }}"></script>
    <style>

        body {
            background-color: #dedede;
        }

        .topbar {
            background: #2A3F54;
            border-color: #2A3F54;
            border-radius: 0px;
        }

        .topbar .navbar-header a {
            color: #ffffff;
        }

        .wrapper {
            padding-left: 0px;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .sidebar {
            z-index: 1000;
            position: fixed;
            top: 50px;
            left: -50px;
            width: 50px;
            height: 100%;
            overflow-y: auto;
            background: #2A3F54;
            color: #ffffff;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .main {
            width: 100%;
            position: relative;
            padding-bottom:20px;
        }

        .wrapper.toggled {
            padding-left: 50px;
        }

        .wrapper.toggled .sidebar {
            left: 0;
        }

        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 52px;
            width: 50px;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .sidebar-nav li {
            line-height: 40px;
        }
        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #e8e8e8;
            padding: 0;
            text-align:center;
        }

        .sidebar-nav li a:hover, .sidebar-nav li.active a {
            text-decoration: none;
            color: #fff;
            background: #fff;
            background: rgba(255,255,255,0.2);
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav li span, .subbar li span {
            display : none;
        }

        nav.subbar {
            position: relative;
            width: 100%;
            border-radius: 0px;
            background: #fff;
            margin: 50px 0 -50px 0;
            padding: 10px 0 0 0;
            z-index: 2;
        }
        nav.subbar > ul.nav.nav-tabs {
            padding: 0 5px;
        }

        nav.subbar > ul.nav.nav-tabs > li.active > a {
            background: #dedede;
            border-top: 1px solid #a6a6a6;
            border-left: 1px solid #a6a6a6;
            border-right: 1px solid #a6a6a6;
            border-radius: 0px;
        }

        .content {
            margin-top: 70px;
            padding: 0 30px;
        }

        @media(min-width:768px){
            .subbar li span {
                display: inline;
            }
        }

        @media(min-width:992px) {

            .sidebar {
                left: 0;
                width: 50px;
            }

            .wrapper.toggled {
                padding-left: 200px;
            }

            .wrapper.toggled .sidebar, .wrapper.toggled .sidebar-nav {
                width: 200px;
            }

            .wrapper.toggled .sidebar-nav li a {
                text-align: left;
                padding: 0 0 0 10px;
            }

            .wrapper.toggled .sidebar-nav li span {
                display: inline;
            }

        }

        .navbar-btn {
            background: none;
            border: none;
            height: 35px;
            min-width: 35px;
            color: #fff;
        }
        .navbar-text {
            margin-top: 14px;
            margin-bottom: 14px;
        }
        @media (min-width: 768px) {
            .navbar-text {
                float: left;
                margin-left: 15px;
                margin-right: 15px;
            }
        }
    </style>
</head>
    <script>
        var ROOT_URL = '{{ url('/') }}';
    </script>
    <body ng-app="app" ng-controller="EventController" ng-cloak>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script>

        $(document).on("click",".sidebar-toggle",function(){
            $(".wrapper").toggleClass("toggled");
        });
    </script>
</html>