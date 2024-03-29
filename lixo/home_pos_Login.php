<?php 
session_start();
include_once('config.php');

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location:entrar.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
    <title>Andre Fernandes</title>
    <!-- google-fonts -->
   <link rel="preconnect" href=https://fonts.googleapis.com>

   <link rel="preconnect" href=https://fonts.gstatic.com crossorigin>

   <link href=https://fonts.googleapis.com/css2?    family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap rel="stylesheet">
    <!-- //google-fonts -->
    <!-- Font-Awesome-Icons-CSS -->
  <script defer src=https://kit.fontawesome.com/79b5047e4f.js crossorigin="anonymous"></script>
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <style>
        html {
            height: 100%;
            width: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            border: 0;
        }

        @keyframes load {
            to {
                transform: rotate(360deg)
            }
        }

        .pre {
            width: 120px;
            height: 120px;
            background: url(assets/images/loading.png);
            background-position: center;
            background-size: contain;
            animation: load 2s infinite linear;
            z-index: 1;
        }

        .box-load {
            position: absolute;
            width: 100%;
            height: 50vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content {
            display: none;
        }
    </style>
      <script>
        function loading() {
              document.getElementsByClassName('box-load')[0].style.display = "none"; 
              document.getElementsByClassName('content')[0].style.display = "block";
          }


     </script>
</head>

<body onload="loading()">
    <div id="box-load" class="box-load">
        <div class="pre"></div>
    </div>

    <div id="content" class="content">
     
        <!--header-->
        <header id="site-header" class="fixed-top">
            <div class="container">
                <nav class="navbar navbar-expand-lg stroke px-0">
                    <h1>
                        <a class="navbar-brand" href="index.html">
                            <i class="fab fa-atlassian fa-xs"></i>ndré<span> Fernandes</span>
                        </a>

                    </h1>
                    <!-- if logo is image enable this   
                        <a class="navbar-brand" href="#index.html">
                        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                    </a> -->
                    <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="home_pos_Login.php">Inicio <span class="sr-only">(current)</span></a>
                            </li>
                            
                            <li class='nav-item'>
                                <a class='nav-link' href='show_sistema_persona.php'>Conta</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="sair.php">Sair</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Entre em contato</a>
                            </li>
                            <!-- search button -->
                            <div class="search-right ml-xl-3 ml-1 mr-xl-1">
                                <form action="#error" method="GET" class="search-box position-relative">
                                    <input type="search" placeholder="Digite a palavra-chave" name="search"
                                        required="required" autofocus="" class="search-popup">
                                    <button type="submit" class="btn search-btn"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- //search button -->
                        </ul>
                     
                    </div>
                    <!-- //search button -->
                    <!-- toggle switch for light and dark theme -->
                    <div class="cont-ser-position">
                        <nav class="navigation">
                            <div class="theme-switch-wrapper">
                                <label class="theme-switch" for="checkbox">
                                    <input type="checkbox" id="checkbox">
                                    <div class="mode-container">
                                        <i class="gg-sun" onclick="changesun()"></i>
                                        <i class="gg-moon" onclick="changemoon()"></i>

                                    </div>
                                </label>
                            </div>
                        </nav>
                    </div>
                    <!-- //toggle switch for light and dark theme -->
                </nav>
            </div>
        </header>
        <!--//header-->

        <!-- banner section -->
        <section id="home" class="w3l-banner py-5">
            <div id="mon" class="banner-image">
                <img id="lua" class="banner-image" src="assets/images/banner.png" alt="">
            </div>

            <!-- video section -->
            <section class="w3l-ab-section py-5">
                <div class="container py-md-5 py-4">
                    <div class="row py-lg-4">
                        <div class="col-lg-6 section-width align-self">
                            <h3 class="title-style pr-xl-5">Hora de bater suas <br></h3>
                            <h3 class="title-style pr-xl-5" style="font-family: fantasy;"> metas</h3>
                            <p class="mt-lg-4 mt-3 pb-3">Seja bem vindo ao treinamentro de André Fernandes onde ele
                                te acomponhará nessa jornada de concluir suas metas, sejam elas financeiras, físicas,
                                emocionais etc...
                                assista ao video ao lado e veja como começar este processo </p>
                            <a href="formulario.php" class="btn btn-style mt-4">Começar Agora</a>
                        </div>
                        <div class="col-lg-6 history-info mt-5 pt-lg-0 pt-5">
                            <div class="position-relative img-border">
                                <img src="assets/images/video.jpg" class="img-fluid video-popup-image"
                                    alt="video-popup">

                                <a href="#small-dialog"
                                    class="popup-with-zoom-anim play-view text-center position-absolute">
                                    <span class="video-play-icon">
                                        <span class="fa fa-play"></span>
                                    </span>
                                </a>
                                <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                                <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/CBHqNPvhbxw"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <!-- 3grids section -->
        <section class="about-section py-5">
            <div class="container py-lg-5 py-4">
                <div class="title-heading-w3 mx-auto text-center mb-sm-5 mb-4 pb-xl-4" style="max-width:600px">
                    <h3 class="title-style mb-2">Avance todos os seus projetos</h3>
                    <p>Esta na hora de destravar todos os seus bloqueios que te impedem de alcançar seus objetivos</p>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="about-single p-3">
                            <div class="about-icon mb-4">
                                <i class="fa-solid fa-list-check primary-clr-bg"></i>
                            </div>
                            <div class="about-content">
                                <h5 class="mb-2"><a href="about.html">Conquista</a></h5>
                                <p>Crie disciplina para conquistar todos os objtivos estabelidos dentro do prazo
                                    acordado

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                        <div class="about-single p-3">
                            <div class="about-icon mb-4">
                                <i class="fa-solid fa-dumbbell green-clr-bg""></i>
                        </div>
                        <div class=" about-content">
                                    <h5 class="mb-2"><a href="about.html">Força</a></h5>
                                    <p>Desenvolva força física e emocional para ter mais saúde e para lidar com os
                                        desafios
                                        do cotidiano</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-2">
                        <div class="about-single p-3">
                            <div class="about-icon mb-4">
                                <i class="fa-solid fa-money-bill blue-clr-bg"></i>
                            </div>
                            <div class="about-content">
                                <h5 class="mb-2"><a href="about.html">Dinheiro</a></h5>
                                <p>Conquiste a sua liberdade financeira para aproveitar o que há de bom da vida com sua
                                    familia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="w-100 p-3 h-25 d-inline-block">
            <p class="text-center"><a href="formulario.php" class="btn btn-style mt-4 ">Começar Agora</a></p>
        </div><br><br><br>
        <!-- footer -->
        <footer class="w3l-footer-29-main">
            <div class="footer-29 py-5">
                <div class="container py-lg-4">
                    <div class="row footer-top-29">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-3 col-6 footer-list-29">
                                    <ul>
                                        <h6 class="footer-title-29">Company</h6>
                                        <li><a href="services.html">About Our Services</a></li>
                                        <li><a href="#projects">Our Projects</a></li>
                                        <li><a href="#blog">View Our Blog</a></li>
                                        <li><a href="about.html">Check Our Careers</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-6 footer-list-29">
                                    <ul>
                                        <h6 class="footer-title-29">Quick Links</h6>
                                        <li><a href="#management">Management</a></li>
                                        <li><a href="services.html">Department Services</a></li>
                                        <li><a href="#appointment">Make Appointment</a></li>
                                        <li><a href="about.html">Our Business Growth</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-6 footer-list-29 mt-md-0 mt-4">
                                    <ul>
                                        <h6 class="footer-title-29">Support</h6>
                                        <li><a href="#live">Live Chart</a></li>
                                        <li><a href="#faq">Faq's</a></li>
                                        <li><a href="#support"> Support</a></li>
                                        <li><a href="#terms">Terms of Service</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-6 footer-list-29 mt-md-0 mt-4">
                                    <h6 class="footer-title-29">More Info</h6>
                                    <ul>
                                        <li><a href="#privacy">Privacy Policy</a></li>
                                        <li><a href="#terms"> Terms of Service</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                        <li><a href="#support"> Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 footer-contact-list mt-lg-0 mt-md-5 mt-4">
                            <h6 class="footer-title-29">Social Media</h6>
                            <div class="main-social-footer-29">
                                <a href="#facebook" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#twitter" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#google"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#instagram" class="instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                            <!-- copyright -->
                            <p class="copy-footer-29 mt-4">© 2021 Marketplace. All rights reserved. Design by <a
                                    href="https://w3layouts.com/" target="_blank">
                                    W3Layouts</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- //footer -->

        <!-- Js scripts -->
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fas fa-level-up-alt" aria-hidden="true"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->

        <!-- common jquery plugin -->
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <!-- //common jquery plugin -->

        <script>
            function changemoon() {
                document.getElementById("lua").src = "assets/images/banner1.png";
            }
            function changesun() {
                document.getElementById("lua").src = "sol.png";
            }  
        </script>
        <!-- banner image moving effect -->
        <script>
            var lFollowX = 0,
                lFollowY = 0,
                x = 0,
                y = 0,
                friction = 1 / 30;

            function animate() {
                x += (lFollowX - x) * friction;
                y += (lFollowY - y) * friction;

                translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

                $('.banner-image').css({
                    '-webit-transform': translate,
                    '-moz-transform': translate,
                    'transform': translate
                });

                window.requestAnimationFrame(animate);
            }

            $(window).on('mousemove click', function (e) {

                var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
                var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
                lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
                lFollowY = (10 * lMouseY) / 100;

            });

            animate();
        </script>
        <!-- //banner image moving effect -->

        <!-- magnific popup -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',

                    fixedContentPos: false,
                    fixedBgPos: true,

                    overflowY: 'auto',

                    closeBtnInside: true,
                    preloader: false,

                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });

                $('.popup-with-move-anim').magnificPopup({
                    type: 'inline',

                    fixedContentPos: false,
                    fixedBgPos: true,

                    overflowY: 'auto',

                    closeBtnInside: true,
                    preloader: false,

                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-slide-bottom'
                });
            });
        </script>
        <!-- //magnific popup -->

        <!-- theme switch js (light and dark)-->
        <script src="assets/js/theme-change.js"></script>
        <!-- //theme switch js (light and dark)-->

        <!-- MENU-JS -->
        <script>
            $(window).on("scroll", function () {
                var scroll = $(window).scrollTop();

                if (scroll >= 80) {
                    $("#site-header").addClass("nav-fixed");
                } else {
                    $("#site-header").removeClass("nav-fixed");
                }
            });

            //Main navigation Active Class Add Remove
            $(".navbar-toggler").on("click", function () {
                $("header").toggleClass("active");
            });
            $(document).on("ready", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
                $(window).on("resize", function () {
                    if ($(window).width() > 991) {
                        $("header").removeClass("active");
                    }
                });
            });
        </script>
        <!-- //MENU-JS -->

        <!-- disable body scroll which navbar is in active -->
        <script>
            $(function () {
                $('.navbar-toggler').click(function () {
                    $('body').toggleClass('noscroll');
                })
            });
        </script>
        <!-- //disable body scroll which navbar is in active -->

        <!-- bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- //bootstrap -->
        <!-- //Js scripts -->
    </div>
</body>
</html>