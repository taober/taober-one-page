<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="Robots" content="index,follow" />
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="description" content="{{ $site->descricao }}">
    <link rel=“canonical” href="https://{{ $_SERVER['HTTP_HOST'] }}">
    <title>{{ $site->titulo }}</title>
    {!! $site->google_search !!}

    <link rel="shortcut icon" href="/_t/001/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="/_t/001/css/bootstrap.min.css">
    <link rel="stylesheet" href="/_t/001/css/font-awesome.min.css">
    <link rel="stylesheet" href="/_t/001/css/LineIcons.css">
    <link rel="stylesheet" href="/_t/001/css/animate.css">
    <link rel="stylesheet" href="/_t/001/css/aos.css">
    <link rel="stylesheet" href="/_t/001/css/slick.css">
    <link rel="stylesheet" href="/_t/001/css/lightbox.min.css">
    <link rel="stylesheet" href="/_t/001/css/default.css">
    <link rel="stylesheet" href="/_t/001/css/style.css">
    @if( $site->css)
        <style>
            {!! $site->css !!}
        </style>
    @endif
    @if( $site->social_facebook_pixel)
     <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{$site->social_facebook_pixel}}');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{$site->social_facebook_pixel}}&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
    @endif
</head>
<body>
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER ENDS START ======-->

    <!--====== HEADER PART START ======-->

    <header id="home" class="header-area pt-100">

        <div class="shape header-shape-one">
            <span></span>
        </div> <!-- header shape one -->

        <div class="shape header-shape-tow animation-one">
            <span></span>
        </div> <!-- header shape tow -->

        <div class="shape header-shape-three animation-one">
            <span></span>
        </div> <!-- header shape three -->

        <div class="shape header-shape-fore">
            <span></span>
        </div> <!-- header shape three -->

        <div class="navigation-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{asset('/imagens/'.$site->logo)}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#quem-somos">Quem somos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#o-que-fazemos">O que fazemos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#projetos">Projetos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#depoimentos">Depoimentos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contatos">Contatos</a>
                                    </li>
                                </ul> <!-- navbar nav -->
                            </div>
                            <div class="navbar-btn ml-20 d-none d-sm-block">
                                <a class="main-btn" href="#"><i class="lni-phone"></i> {{$site->whatsapp}}</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navigation bar -->

        @if($areaPrincipal)
            <div class="header-banner d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-sm-10">
                            <div class="banner-content">
                                <h4 class="sub-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">{{ $areaPrincipal->node_titulo }}</h4>
                                <h1 class="banner-title mt-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2s">{!! $areaPrincipal->node_subtitulo !!}</h1>
                                {{-- <p>Mais um texto AQUI</p> --}}
                                <a class="banner-contact mt-25 wow fadeInUp page-scroll" data-wow-duration="1.5s" data-wow-delay="2.3s" href="#contact">Entre em contato!</a>
                            </div> <!-- banner content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
                <div class="banner-image bg_cover" style="background-image: url({{asset('/imagens/'.$areaPrincipal->imagens{0}['imagem'])}})"></div>
            </div> <!-- header banner -->
        @endif

    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->
    @if($quemSomos)
        <section id="quem-somos" class="about-area pt-80 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-image mt-50 clearfix">
                            @foreach ($quemSomos->imagens as $imagem)
                                @if( $loop->index > 0)
                                    {{-- <div data-aos="fade-right" class="about-btn">
                                        <a class="main-btn" href="#"><span>25</span> Anos de Experiência</a>
                                    </div> --}}
                                @endif
                                <div class="single-image {{ ($loop->index > 0) ? 'image-tow float-right' : 'float-left' }}  ">
                                    <img src="{{asset('/imagens/' . $imagem->imagem) }}" alt="{{$imagem->titulo}}">
                                </div> <!-- single image -->
                            @endforeach                        
                        </div> <!-- about image -->
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content mt-45">
                            <h4 class="about-welcome">{{$quemSomos->node_titulo}} </h4>
                            <h3 class="about-title mt-10">{{$quemSomos->node_subtitulo}}</h3>
                            <p class="mt-25">{!! $quemSomos->node_conteudo !!}</p>
                            {{-- <a class="main-btn mt-25" href="#">learn more</a> --}}
                        </div> <!-- about content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
    @endif
    <!--====== ABOUT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    @if(count($queFazemos)>0)
        <section id="o-que-fazemos" class="services-area pt-125 pb-130 gray-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center pb-20">
                            <h5 class="sub-title mb-15">O que Fazemos</h5>
                            <h2 class="title">Sub Titulo</h2>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row justify-content-center">
                    @foreach ($queFazemos as $item)
                        <div class="col-lg-4 col-md-6 col-sm-8">
                            <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                {{-- <div class="services-icon">
                                    <i class="lni-paint-roller"></i>
                                </div> --}}
                                <div class="services-content mt-15">
                                    <h4 class="services-title">{{$item->node_titulo}}</h4>
                                    <p class="mt-20">{{$item->node_conteudo}}</p>
                                </div>
                            </div> <!-- single services -->
                        </div>
                    @endforeach

                </div> <!-- row -->
            </div> <!-- container -->
        </section>
    @endif
    <!--====== SERVICES PART ENDS ======-->

    <!--====== PROJECT PART START ======-->
    @if(count($portifolios)>0)
        <section id="projetos" class="project-area pt-125 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center pb-50">
                            <h5 class="sub-title mb-15">Projetos</h5>
                            <h2 class="title">Alguns projetos que amamos</h2>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
            </div>
            <div class="container-fluid">
                <div class="row project-active">
                    @foreach ($portifolios as $item)
                        @if(isset($item->imagens{0}))
                            <div class="col-lg-4 div-project">
                                <div class="single-project">
                                    <div class="project-image">
                                        <img src="{{asset('/imagens/'.$item->imagens{0}['imagem'] )}}" alt="{{$item->imagens{0}['titulo']}}">
                                    </div>
                                    <div class="project-content">
                                        <a class="project-title btn-portifolio" href="#">{{$item->node_titulo}}</a>
                                    </div>
                                </div>
                                <div class="galeria d-none">
                                    @foreach ($item->imagens as $imagem)
                                        <a class="example-image-link {{($loop->index>0)? 'd-none' : ''}}" href="{{asset('/imagens/'.$imagem->imagem)}}" data-lightbox="example-set-{{$item->node_id}}" data-title="{{$imagem->titulo}}">
                                            <img class="example-image" src="{{asset('/imagens/'.$imagem->imagem)}}" alt=""/>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--====== PROJECT PART ENDS ======-->

    <!--====== TEAM PART START ======-->

    {{-- <section id="team" class="team-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Meet The Team</h5>
                        <h2 class="title">Our Expert Designers</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="team-image">
                            <img src="/_t/001/images/team/team-1.jpg" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Rob Hope</a></h4>
                            <span class="sub-title">CEO & Founder</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="team-image">
                            <img src="/_t/001/images/team/team-2.jpg" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Patric Green</a></h4>
                            <span class="sub-title">Chief Designer</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="team-image">
                            <img src="/_t/001/images/team/team-3.jpg" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Daryl Dixon</a></h4>
                            <span class="sub-title">Consultant</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.6s">
                        <div class="team-image">
                            <img src="/_t/001/images/team/team-4.jpg" alt="Team">
                        </div>
                        <div class="team-content">
                            <h4 class="team-name"><a href="#">Mark Parker</a></h4>
                            <span class="sub-title">Intern</span>
                            <ul class="social mt-25">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- single team -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> --}}

    <!--====== TEAM PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->
    @if(count($depoimentos)>0)
        <section id="depoimentos" class="testimonial-area pt-130 pb-130">
            <div class="shape shape-one">
                <span></span>
                {{-- <img src="/_t/001/images/testimonial/shape.png" alt="testimonial"> --}}
            </div>
            <div class="shape shape-tow">
                <span></span>
                {{-- <img src="/_t/001/images/testimonial/shape.png" alt="testimonial"> --}}
            </div>
            <div class="shape shape-three">
                <span></span>
                {{-- <img src="/_t/001/images/testimonial/shape.png" alt="testimonial"> --}}
            </div>
            <div class="container">
                <div class="testimonial-bg bg_cover pt-80 pb-80" style="background-image: url(/_t/001/images/testimonial/testimonial-bg.jpg)">
                    <div class="row">
                        <div class="col-xl-4 offset-xl-7 col-lg-5 offset-lg-6 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                            <div class="testimonial-active">
                                @foreach ($depoimentos as $item)
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-image">
                                        @if(isset($item->imagens{0}))
                                            <img src="{{asset('/imagens/'.$item->imagens{0}['imagem'])}}" alt="Testimonial" style="width:100px">
                                        @else
                                            <img src="/_t/001/images/testimonial/shape.png" alt="Testimonial" style="width:100px">
                                        @endif
                                        <div class="quota">
                                            <i class="lni-quotation"></i>
                                        </div>
                                    </div>
                                    <div class="testimonial-content mt-20">
                                        <p>{{$item->node_conteudo}}</p>
                                        <h5 class="testimonial-name mt-15">{{$item->node_titulo}}</h5>
                                        <span class="sub-title">{{$item->node_subtitulo}}</span>
                                    </div>
                                </div> <!-- single-testimonial -->
                                @endforeach
                            </div> <!--  testimonial active -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- testimonial bg -->
            </div> <!-- container -->
        </section>
    @endif
    <!--====== TESTIMONIAL PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contatos" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Contatos</h5>
                        <h2 class="title">Respondemos rapidinho :)</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contact-form" action="/contato-envia" method="post" data-toggle="validator">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="nome" placeholder="Seu nome" data-error="Nome é obrigatório." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="email" name="email" placeholder="Seu e-mail" data-error="Email válido é obrigatório." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="assunto" placeholder="Assunto" data-error="Assunto é obrigatório." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="telefone" placeholder="Telefone" data-error="Telefone é obrigatório'." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <textarea placeholder="Sua nensagem" name="mensagem" data-error="Por favor, deixe sua mensagem." required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="single-form form-group text-center">
                                        <button type="submit" class="main-btn">Enviar mensagem</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== MAP PART START ======-->
    @if(!empty($site->google_maps) && !is_null($site->google_maps) && 1==2)
    <section id="map" class="map-area">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
        <div class="map-bg bg_cover d-none d-lg-block" style="background-image: url(/_t/001/images/map/map-bg.jpg)"></div>
    </section>
    @endif

    <!--====== MAP PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-80 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
                            <a href="#">
                                <img src="{{asset('/imagens/'.$site->logo)}}" alt="Logo">
                            </a>
                            <ul class="footer-info">
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>{{$site->whatsapp}}</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>{{$site->email}}</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                @if($site->endereco != '')
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-map"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>{{$site->endereco}}</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                @endif
                            </ul>
                            <ul class="footer-social mt-20">
                                @if($site->social_facebook != '')
                                    <li><a href="{{$site->social_facebook}}" title="Facebook"><i class="lni-facebook-filled"></i></a></li>
                                @endif
                                @if($site->social_twitter != '')
                                    <li><a href="{{$site->social_twitter}}" title="Twitter"><i class="lni-twitter-original"></i></a></li>
                                @endif
                                @if($site->social_linkedin != '')
                                    <li><a href="{{$site->social_linkedin}}" title="Linkedin"><i class="lni-linkedin"></i></a></li>
                                @endif
                                @if($site->social_google != '')
                                    <li><a href="{{$site->social_google}}" title="Google"><i class="lni-google"></i></a></li>
                                @endif
                                @if($site->social_instagram != '')
                                    <li><a href="{{$site->social_instagram}}" title="Instagram"><i class="lni-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Menu</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a class="page-scroll" href="#home">Home</a></li>
                                <li><a class="page-scroll" href="#quem-somos">Quem Somos</a></li>
                                <li><a class="page-scroll" href="#o-que-fazemos">O que Fazemos</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">&nbsp;</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a class="page-scroll" href="#projetos">Projetos</a></li>
                                <li><a class="page-scroll" href="#depoimentos">Depoimentos</a></li>
                                <li><a class="page-scroll" href="#contatos">Contatos</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-5 col-sm-8">
                        <div class="footer-newsleter mt-45">
                            <div class="f-title">
                                <h4 class="title">Newsleter</h4>
                            </div>
                            <p class="mt-15">Lorem ipsum dolor sit amet, consec tetur adipiscing elit.</p>
                            <form action="#">
                                <div class="newsleter mt-20">
                                    <input type="email" placeholder="info@contact.com">
                                    <button><i class="lni-angle-double-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>Template Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- copyright-area -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->


    <!-- row -->









    <!--====== jquery js ======-->
    <script src="/_t/001/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/_t/001/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="/_t/001/js/bootstrap.min.js"></script>

    <!--====== WOW js ======-->
    <script src="/_t/001/js/wow.min.js"></script>

    <!--====== Slick js ======-->
    <script src="/_t/001/js/slick.min.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="/_t/001/js/scrolling-nav.js"></script>
    <script src="/_t/001/js/jquery.easing.min.js"></script>

    <!--====== Aos js ======-->
    <script src="/_t/001/js/aos.js"></script>

    <!--====== lightbox js ======-->
    <script src="/_t/001/js/lightbox.min.js"></script>


    <!--====== Main js ======-->
    <script src="/_t/001/js/main.js"></script>
    {!! $site->google_analytcs !!}
    @if( $site->js)
        <script>
            {!! $site->js !!}
        </script>
    @endif
</body>
</html>
