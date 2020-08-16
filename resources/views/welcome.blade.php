<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link rel="stylesheet" href="css/app.css">
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #222;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
                
                display: flex;
                align-items: center;
                justify-content: center;

                background: linear-gradient(45deg, #ff0000, #0000ff, #000000, #800080);
                background-size: 300% 300%;
                animation: colors 15s ease infinite;
            }

            @keyframes colors {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
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
                height: auto;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                top: 18px;
            }

            .content {
                text-align: center;
                padding-top: 80px;

                background-image: url('/images/welcome_bg.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
            }

            .title, h2 {
                font-family: cursive;
                -webkit-text-stroke-width: 2.00px; 
            }

            .title {
                font-size: 64px;
                font-weight: 600;
                -webkit-text-fill-color: yellow;
                -webkit-text-stroke-color: blue;
                -webkit-text-stroke-width: 5.00px; 
            }

            .campeao {
                -webkit-text-stroke-color: red;
            }

            .elite {
                -webkit-text-stroke-color: purple;                
            }

            .links > a {
                color: #636b6f;
                padding: 0 10px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-family: Arial, Helvetica, sans-serif;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            @media (min-width: 720px) {
                .position-ref {
                    width: 75%;
                }
                .title {
                    font-size: 74px;
                }
                .links > a {
                    padding: 0 25px;
                }
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="top-left links">
                <a href="{{ url('/hall') }}">Hall da fama</a>
            </div>

            <div class="content">
                <div class="title">
                    Liga Pokemon Showdownlips
                </div>

                <div class="p-4">
                    <h4>Seja bem vindo a Liga Pokemon Showdownlips! Aqui você encontrará um mega desafio ultra hardcore composto pela melhor elite dos 4 ja criada.</h4>
                </div>

                <div class="p-4">
                    <div class="row align-items-center">
                        <div class="col-sm-12 campeao pb-3">
                            <h2 class="campeao">Campeão</h2>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2">
                            <img src="{{URL::asset('/images/campeao.png')}}" width="300" /> 
                        </div>
                        <div class="h4 col-sm-8 pl-4 pr-5">
                            O atual campeão da liga
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <h2 class="elite pb-3">Elite dos 4</h2>
                    <div class="row align-items-center pb-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <img src="{{URL::asset('/images/avatar1.png')}}" width="180" /> 
                        </div>
                        <div class="h4 col-sm-9 pl-4 pr-5">
                            Lider 1, especialista em determinados pokemons. Frase de efeito 1.
                        </div>
                    </div>
                    <div class="row align-items-center pb-3">
                        <?php $lider2="Lider 2, especialista em determinados pokemons. Frase de efeito 2."?>
                        <div class="col-sm-1"></div>
                        <div class="h4 col-sm-8  d-none d-sm-block">
                            {{$lider2}}
                        </div>
                        <div class="col-sm-2">
                            <img src="{{URL::asset('/images/avatar2.png')}}" width="180" /> 
                        </div>
                        <div class="h4 col-sm-9 pl-4 pr-5  d-block d-sm-none">
                            {{$lider2}}
                        </div>
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <img src="{{URL::asset('/images/avatar3.png')}}" width="180" /> 
                        </div>
                        <div class="h4 col-sm-9 pl-4 pr-5">
                            Lider 3, especialista em determinados pokemons. Frase de efeito 3.
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <?php $lider4="Lider 4, especialista em determinados pokemons. Frase de efeito 4."?>
                        <div class="col-sm-1"></div>
                        <div class="h4 col-sm-8  d-none d-sm-block">
                            {{$lider4}}
                        </div>
                        <div class="col-sm-2">
                            <img src="{{URL::asset('/images/avatar4.png')}}" width="180" /> 
                        </div>
                        <div class="h4 col-sm-9 pl-4 pr-5  d-block d-sm-none">
                            {{$lider4}}
                        </div>
                    </div>
                </div>

                <!--div class="p-5">
                    <h2>Ranking</h2>
                    
                </!--div-->
            </div>
        </div>
    </body>
</html>
