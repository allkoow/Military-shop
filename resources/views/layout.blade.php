<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Dosis:400,600&subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('css/fontello/css/fontello.css')}}" />
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
        


        {{-- TinyMCE --}}
        <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        
        <title>Sklep</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
           
           <header>
                <div id="menu-container">
                    <div class="menu-item menu-item-logo">
                        <a href="/../home">logo</a>
                    </div>

                    <div class="menu-item right-container">
                        @include('parts/loginpanel')
                        
                        <a href="/../cart">
                            <div class="menu-item-icon ">
                                <i class="icon-basket"></i>
                                <span>Koszyk</span>
                                <span>
                                    @if(Session::has('cart'))
                                        <span class="cart-price">({{$cart->totalPrice}} zł)</span>
                                    @endif
                                </span>
                            </div>
                        </a>
                        
                        <div class="menu-item-icon menu-item-icon-nav">
                            <div class="menu-item-nav">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>

                    <div class="search-bar">
                        @include('parts/searchengine')
                    </div>
                </div> 
            </header>

            <nav>
                @include('parts/nav')
            </nav> 
            
            <div id="content">
                @yield('login')

                @yield('userpanel')

                @yield('adminpanel')

                @yield('content')
            </div>

        </div>
    </body>
</html>