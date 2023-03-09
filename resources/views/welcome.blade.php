<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       <!--css styel sheet-->
        
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

    </head>
    <body >
        <div class="wl-na">
            @if (Route::has('login'))

           <a href="#"> <img src="{{ asset('/images/Note.png') }}" alt="head img"></a>
            
                <div class="wl-content">
                    @auth
                        <a href="{{ route('notes.index') }}" >Notes</a>
                    @else
                        <a class="login" href="{{ route('login') }}" >Log in</a>

                        @if (Route::has('register'))
                            <a class="register" href="{{ route('register') }}" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>

            <div class="head">
            <div class="head-txt">
            
            <h2><span>Create. </span>Organize. <span class="easy">Easy</span>
              </h2>
              <p>Notes is easiest way to store and write your notes. Join to us now and create your free acount.
              </p>
            </div>
            <div class="head-img">
            <img src="{{ asset('/images/3125988.png') }}" alt="content img" styel="width:300px; height:300px;">
            
            </div>
  
                                   
                  
        </div>
    </body>
</html>
