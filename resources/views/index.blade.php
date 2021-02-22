<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Care Wing 介護記録サイト</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
               background-image: url("{{ asset('assets/images/welcom.jpg') }}"); 
                font-family: 'Nunito', sans-serif;
                font-weight: 150;
                height: 100vh;
                margin: 0;
                text-decoration: none;
            }

            .full-height {
                height: 100vh;
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
                text-align: left;
            }

            .title {
                font-size: 60px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .job{
                padding-top: 100px;
                width: 200px;
                align-items: center;
                margin: 0 auto;
                text-decoration: none;

            }
            h1{
                text-align: center;
                color: dimgray;
                background-color: white;
                text-decoration: none;
            }
            h1:hover{
                color: white;
                background-color: dimgray;
            }
             .m-b-md{
               color: gray;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Care Wing 介護記録サイト
                </div>
            <div class="job">
            <a href="{{ route('admin.login') }}"><h1>医師</h1></a>
            <a href="{{ route('user.login') }}"><h1>介護士</h1></a> 
            </div>
            </div>
        </div>
    </body>
</html>
