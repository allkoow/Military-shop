<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Dosis:400,600&subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('css/fontello/css/fontello.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/app.css')}}" />

        {{-- TinyMCE --}}
        <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        
        <title>Sklep</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{URL::asset('js/main.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('js/ResponsiveSlides/responsiveslides.min.js')}}"></script>

    </head>
    <body>
        <div class="container">
           
           <header>
                <div id="header-container">
                    <div id="logo" >
                        <span><a href="/">logo</a></span>
                    </div>
                    
                    @include('parts.searchengine')
                    @include('parts.loginpanel')
                    @include('parts.cart')
                    @include('parts.menu')
                </div>
            </header>
            
            <div id="content">
                @yield('productList')

                @yield('productPage')

                @yield('login')

                @yield('userpanel')

                @yield('adminpanel')

                @yield('content')
            </div>

        </div>
    </body>
</html>