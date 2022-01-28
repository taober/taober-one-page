<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="author" content="Procurar Imoveis">
    <!--link rel=“canonical” href="https://{{ $_SERVER['HTTP_HOST'] }}"-->
    <meta name="Robots" content="index,follow" />
    <!-- description -->
    <meta name="description" content="{{ strip_tags($emp->titulo) }}">
    <!-- keywords -->
    <meta name="keywords" content="">
    <meta name="msvalidate.01" content="B06DF5F116B7B3AE061D957AF8B1B914" />
    <!-- Page Title -->
    <title>{{ $emp->titulo }}</title>
    {!! $emp->google_search !!}
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <!--script src="{{ asset('js/app.js') }}" defer></script-->
    <!-- Bundle -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bundle.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{ asset('css/mega-one.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/taober.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;700&display=swap" rel="stylesheet">
</head>



<body data-spy="scroll" data-target=".navbar" data-offset="150">


<!--  PRELOADER  -->
<div class="loader-area d-none">
    <div class="spinning-area">
        <div class="spinner"></div>
    </div>
</div>

<!-- START NAVBAR SECTION -->
<header>
    @if(!empty($emp->logo))
    <div class="logo margin_navbar-logo logo_display">
        <a href="#">
            <img src="{{asset('/imagens/empreendimentos/'.$emp->logo)}}" alt="Logo Img">
        </a>
    </div>
    @endif
    <div class="banner-text ml-2 d-block d-md-none">
        <p class="text-white m-0">
            <span style="font-size:10px; font-weight:bold;display:block;">Ligue agora:</span>
            <span style="font-size:10px"> (21) <span>
            <span style="font-size:16px"> 2233-0001</span>
        </p>
    </div>
    <div class="banner-text ml-3 mr-3 d-block d-md-none">
        <p class="text-white m-0">
            <a class="text-white" target="_blank" href="https://api.whatsapp.com/send?phone=5521979033298&text=Ol%C3%A1,%20favor%20informar%20o%20empreendimento%20de%20interesse.">
                <span style="font-size:10px; font-weight:bold;display:block;">Whatsapp:</span>
                <span style="font-size:10px"> (21) <span>
                <span style="font-size:16px"> 97903-3298</span>
            </a>
        </p>
    </div> 
    <div class="alinhar-right">
    <div class="my-tog-btn">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
    <div class="top-banner bg-trans-color transparent-banner d-none">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <!--div class="banner-text ml-3">
                        <p class="text-yellow m-0"><i class="las la-phone top-icon"></i>
                            <span>Ligue agora: 21 2233-0001</span></p>
                    </div-->
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="logo-center">
                        <a href="#">
                            @if(!empty($emp->logo))
                                <img src="{{asset('/imagens/empreendimentos/'.$emp->logo)}}" alt="LOGO IMAGE">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    NAVBAR FOR LARGE SCREEN-->
    <nav id="my-nav1" class="navbar navbar-expand-sm navbar-light rounded-bar transparent-bar">
        <div class="container bg-trans-color">
            <div class="logo">
                @if(!empty($emp->logo))
                <a href="#home" class="scroll"><img src="{{asset('/imagens/empreendimentos/'.$emp->logo)}}" alt="Logo Img"></a>
                @endif
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1" >
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#empreendimento">O Emprendimento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#detalhes">Detalhes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#imagens-galeria">Imagens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#plantas">Plantas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contato">Contato</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="banner-text">
                <p class="text-white m-0">
                    <span style="font-size:14px; font-weight:bold;display:block;">Ligue agora:</span>
                    <span style="font-size:14px"> (21) <span>
                    <span style="font-size:22px"> 2233-0001</span>
                </p>
            </div>
            <div class="banner-text ml-5">
                <p class="text-white m-0">
                    <a class="text-white" rel="noopener" target="_blank" href="https://api.whatsapp.com/send?phone=5521979033298&text=Ol%C3%A1,%20favor%20informar%20o%20empreendimento%20de%20interesse.">
                        <span style="font-size:14px; font-weight:bold;display:block;">Whatsapp:</span>
                        <span style="font-size:14px"> (21) <span>
                        <span style="font-size:22px"> 97903-3298</span>
                    </a>
                </p>
            </div>
        </div>
    </nav>

    <!--MODEL WINDOW FOR NAVBAR-->
    <div class="outer-window">
        <div class="navbar_small">
            <a class="close-outerwindow"><i class="las la-times"></i></a>
            <nav class="navbar1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#empreendimento">O Emprendimento</a></li>
                    <li class="nav-item"><a class="nav-link" href="#detalhes">Detalhes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#imagens-galeria">Imagens</a></li>
                    <li class="nav-item"><a class="nav-link" href="#plantas">Plantas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!--  START REV SLIDER SECTION -->
<div id="home">
    <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="yogaslider" data-source="gallery" style="background:transparent;padding:0;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
        <div id="rev_slider_2_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
            <ul>	<!-- SLIDE  -->
                <li data-index="rs-4" data-transition="crossfade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb=" "  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('/imagens/empreendimentos/')}}"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER-overlay -->
                    <div class="layer-overlay"></div>
                    <!-- LAYERS-overlay -->
                   
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-4-layer-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['22','22','-35','-78']"
                         data-fontsize="['72','72','72','50']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"delay":400,"speed":2500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power2.easeIn"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 6; text-align:center; white-space: normal; font-size: 28px; line-height: 75px; font-weight: 300; color: #ffffff; letter-spacing: 0;font-family:'Raleway', sans-serif;">Titulo</div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption tp-caption-sub tp-resizeme"
                         id="slide-4-layer-4"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-50','-50','-120','-150']"
                         data-fontsize="['24','24','24','16']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"delay":400,"speed":2500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power2.easeIn"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 7; white-space: normal; font-size: 24px; line-height: 34px; font-weight: 200; color: #ffffff; letter-spacing: 0;font-family:'Raleway', sans-serif;">Sub Titulo</div>
                </li>

            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
    </div><!-- END REVOLUTION SLIDER -->

</div>

@if(!empty($emp->youtubelink))
<section class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="main-heading heading">Vídeo</h1>
                <br>
                <iframe width="510" height="340" src="//www.youtube.com/embed/{{ str_replace('https://youtu.be/','',$emp->youtubelink) }}?border=0&amp;showsearch=0&amp;showinfo=0&amp;iv_load_policy=0&amp;cc_load_policy=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
       
    </div>
</section>
@endif

<section id="empreendimento" class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-5 offset-md-1 pr-md-5 mb-5 mb-md-0 align-items-center">
                <div class="about-text text-center text-md-left">
                    <h1 class="main-heading text-black font-weight-bold mb-2">{{ $emp->titulo }}</h1>
                    <p class="sub-heading">{!! str_replace('http://bit.ly', 'https://bit.ly', 'este')  !!}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0">
                <div class="about-img" style="background-image: url({{asset('/imagens/oempreendimento/')}}); height: 100%; background-size: cover; background-position: center;">
                    <!--img src="{{asset('/imagens/oempreendimento/')}}" alt="ABOUT MAGE"-->
                </div>
            </div>
        </div>
    </div>
</section>

@if(2 == 1)
<section id="detalhes" class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-5 offset-md-1 pr-md-5 mb-5 mb-md-0 align-items-center">
                <div class="about-text text-center text-md-left">
                    <h1 class="main-heading text-yellow mb-2">{{ $emp->detalhe_titulo }}</h1>
                    <p class="sub-heading">{!! $emp->detalhe_texto !!}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0">
                <div class="about-img" style="background-image: url({{asset('/imagens/detalhes/'.$emp->detalhe_fundo)}}); height: 100%; background-size: cover; background-position: center;">
                    <!--img src="{{asset('/imagens/detalhes/'.$emp->detalhe_fundo)}}" alt="ABOUT MAGE"-->
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section id="imagens-galeria" class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="main-heading heading">Imagens</h1>
                <div class="sub-heading sub-width mb-60 mt-4 mt-md-0">Imagens sub</div>
            </div>
        </div>
        <div id="js-grid-imagens" class="cbp cbp-l-grid-mosaic d-none d-md-block">
            @foreach ($imagens as $imagem)
            <div class="col-3 box-img">
                <div class="cbp-item">
                    <a href="{{asset('/imagens/imagens/'.$imagem->imagem)}}"  data-fancybox="gallery1">
                        <img class="lazyload" data-src="{{asset('/imagens/imagens/cache/395x286_'.$imagem->imagem)}}" alt="" width="266" height="193">
                        <div class="overlay">
                            <div class="plus-gallery">
                                <i class="las la-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div id="js-grid-imagens-mobile" class="d-block d-md-none owl-carousel owl-theme">
            @foreach ($imagens as $imagem)
            <div class="box-img item">
                <div class="cbp-item">
                    <a href="{{asset('/imagens/imagens/'.$imagem->imagem)}}"  data-fancybox="gallery1">
                        <img class="lazyload" data-src="{{asset('/imagens/imagens/cache/395x286_'.$imagem->imagem)}}" alt="">
                        <div class="overlay">
                            <div class="plus-gallery">
                                <i class="las la-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="plantas" class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="main-heading heading">Plantas</h1>
                <div class="sub-heading sub-width mb-60 mt-4 mt-md-0">Plantas sub</div>
            </div>
        </div>
        <div id="js-grid-plantas" class="cbp cbp-l-grid-mosaic d-none d-md-block">
            @foreach ($plantas as $planta)
            <div class="col-3 box-img">
                <div class="cbp-item">
                    <a href="{{asset('/imagens/plantas/'.$planta->imagem)}}"  data-fancybox="galeria-plantas1">
                        <img class="lazyload" data-src="{{asset('/imagens/plantas/cache/395x286_'.$planta->imagem)}}" alt="" width="266" height="193">
                        <div class="overlay">
                            <div class="plus-gallery">
                                <i class="las la-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div id="js-grid-plantas-mobile" class="d-block d-md-none owl-carousel owl-theme">
            @foreach ($plantas as $planta)
            <div class="box-img item">
                <div class="cbp-item">
                    <a href="{{asset('/imagens/plantas/'.$planta->imagem)}}"  data-fancybox="galeria-plantas1">
                        <img class="lazyload" data-src="{{asset('/imagens/plantas/cache/395x286_'.$planta->imagem)}}" alt="">
                        <div class="overlay">
                            <div class="plus-gallery">
                                <i class="las la-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="contato" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="main-heading heading">Contato</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-4 mt-md-0">
                <div class="contact-box">
                    <div class="sub-heading text-left text-black">
                        <!--Phone-->
                        <p class="mb-3" style="font-size:18px;"> 
                            <strong>Telefone:</strong> 21 2233-0001<br>
                            <a target="_blank" style="color:#000;" rel="noopener" href="https://api.whatsapp.com/send?phone=5521979033298&text=Ol%C3%A1,%20favor%20informar%20o%20empreendimento%20de%20interesse."><strong>Whatsapp:</strong> 21 97903-3298</a>
                        </p>

                        <div class="mapouter d-none d-md-block">
                            <div class="gmap_canvas">
                                {!! $emp->google_maps !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <form class="form-contato" method="POST" id="form-contato" action="/contato-envia"> 
                    @csrf
                    <input type="hidden" name="empreendimento" id="empreendimento" value="{{ $emp->titulo }}"><br>
                    <label for="nome">Nome</label><br>
                    <input type="text" name="nome" id="nome"><br>
                    <label for="email">E-mail</label><br>
                    <input type="text" name="email" id="email"><br>
                    <label for="telefone">Telefone</label><br>
                    <input type="text" name="telefone" id="telefone"><br>
                    <label for="mensagem">Deixe sua mensagem</label><br>
                    <textarea name="mensagem" id="mensagem" rows="5" cols="33"></textarea><br>
                    <input type="button" class="form-enviar" value="Enviar" id="btn-contato-enviar">
                </form>
                @if (session('status'))
                    <div class="sucesso"><span class="texto-sucesso">Mensagem enviada com sucesso!</span></div>
                @endif
                
                @if(!empty($emp->google_maps))
                    <div class="mapouter d-block d-md-none" style="height:auto;">
                        <div class="gmap_canvas">
                            {!! $emp->google_maps !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>



<!-- JavaScript -->

{{-- <script src="{{ asset('js/bundle.min.js') }}"></script> --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Plugin Js -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.cubeportfolio.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="https://cdn.jsdelivr.net/npm/revslider@5.4.201-8.6/js/extensions/revolution.extension.actions.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/revslider@5.4.201-8.6/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/revslider@5.4.201-8.6/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/revslider@5.4.201-8.6/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/revslider@5.4.201-8.6/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/revslider@5.4.201-8.6/js/extensions/revolution.extension.slideanims.min.js"></script>
{{-- <script src="{{ asset('js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.slideanims.min.js') }}"></script> --}}
{{-- 
    <script src="{{ asset('js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('js/extensions/revolution.extension.video.min.js') }}"></script> --}}

<!-- custom script -->
{{-- <script src="{{ asset('js/jquery.fancybox.js') }}"></script> --}}
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
{{-- <script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script> --}}
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/parallaxie.min.js') }}"></script>
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

{!! $emp->google_analytcs !!}
</body>
</html>