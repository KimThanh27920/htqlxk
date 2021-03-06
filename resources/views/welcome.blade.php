<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                bolder:6px black solid;
                color:grey;
                padding: 50px 50px;
                font-size: 20px;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            a:hover{
                color:red;
                font-weight: bold;    
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="is-preload" >
        <div class="flex-center position-ref full-height">
           

            <div class="content">
                <div class="title m-b-md">
                    Hệ Thống Quản Lý Xe Khách
                </div>

                    @if (Route::has('login'))
                    <div class="links" >
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                @endif
            
            </div>
        </div>
    </body>
</html>
