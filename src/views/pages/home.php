<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="author" content="CondoSoftware">

    <!-- Website Title -->
    <title>CondoSoftware | Bem-Vindo</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="<?=$base;?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?=$base;?>/assets/css/all.min.css" rel="stylesheet">
    <link href="<?=$base;?>/assets/css/swiper.css" rel="stylesheet">
	<link href="<?=$base;?>/assets/css/magnific-popup.css" rel="stylesheet">
	<link href="<?=$base;?>/assets/css/styles.css" rel="stylesheet">

</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="<?=$base;?>"><img src="<?=$base;?>/assets/images/logo_condo.png" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fa fa-bars"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">INÍCIO <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#intro">QUEM SOMOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">O SISTEMA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#callMe">CONTATO</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?=$base;?>/app">TESTE GRÁTIS</a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>CondoSoftware - <span id="js-rotating">SOLUÇÔES, SERVIÇOS, AGILIDADE</span></h1>
                            <p class="p-heading p-large">Temos as melhores soluções para o seu condominio!</p>
                            <a class="btn-solid-lg page-scroll" href="<?=$base;?>/app">TESTE GRÁTIS</a>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Intro -->
    <div id="intro" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Quem somos nós?</h2>
                        <p>A Condosoftware tem o objetivo de levar a tecnologia aos condomínios de porte pequeno, com uma plataforma que realize a integração de serviços pontuais como, pagamentos, gerenciamento de incidentes e de inadimplentes.</p>
                            
                        <p>A empresa entende que seu grande diferencial é olhar para administradores com a necessidade de implantação de um sistema de gerenciamento para uma administração predial mais conclusiva e clara a todos.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="<?=$base;?>/assets/images/empresa.jpg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of intro -->


    <!-- Services -->
    <div id="services" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Conheça o CondoSystem!</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?=$base;?>/assets/images/dash.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Rápido</h3>
                            <p>Perfeito para quem quer facilidade para gerenciar um condominio de maneira simples e rápida.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?=$base;?>/assets/images/dash.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Completo</h3>
                            <p>Diversas funcionalidades para você organizar seus gastos e seus moradores.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?=$base;?>/assets/images/dash.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Atualizado</h3>
                            <p>Melhoramos o sistema com o tempo e trazemos cada vez novas funcionalidades que vão facilitar ainda mais sua experiência.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->


    <!-- Team -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Conheça a nossa equipe!</h2>
                    <p class="p-heading">Conheça alguns de nossos colaboradores que estão por trás da sua experiência com a CondoSoftware.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?=$base;?>/assets/images/monique.jpg" alt="alternative">
                        </div> <!-- end of image-wrapper -->
                        <p class="p-large">Monique Roseno</p>
                        <p class="job-title">General Marketing</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?=$base;?>/assets/images/rennan.jpg" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large">Rennan Morais</p>
                        <p class="job-title">Web Developer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="<?=$base;?>/assets/images/matheus.jpg" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large">Matheus Henrique</p>
                        <p class="job-title">Infrastructure</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of team -->


    <!-- Call Me -->
    <div id="callMe" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">COTACTE-NOS</div>
                        <h2 class="white">Melhore sua experiência em administração de condominio conosco.</h2>
                        <p class="white">Entre em contato conosco e um de nossos representantes entrará em contato com você.</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                   
                    <!-- Call Me Form -->
                    <form id="callMeForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="lname" name="lname" required>
                            <label class="label-control" for="lname">Nome</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="lphone" name="lphone" required>
                            <label class="label-control" for="lphone">Telefone/Celular</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="lemail" name="lemail" required>
                            <label class="label-control" for="lemail">E-mail</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <select class="form-control-select" id="lselect" required>
                                <option class="select-option" value="" disabled selected>Interesse em...</option>
                                <option class="select-option" value="Off The Ground">Adiquirir</option>
                                <option class="select-option" value="Accelerated Growth">Duvidas</option>
                                <option class="select-option" value="Market Domination">Orçamento</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">ENVIAR</button>
                        </div>
                        <div class="form-message">
                            <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of call me form -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of call me -->

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-container about">
                        <h4>Um pouco sobre nós</h4>
                        <p class="white">A Condosoftware tem o objetivo de levar a tecnologia aos condomínios de porte pequeno, com uma plataforma que realize a integração de serviços pontuais como, pagamentos, gerenciamento de incidentes e de inadimplentes. A empresa entende que seu grande diferencial é olhar para administradores com a necessidade de implantação de um sistema de gerenciamento para uma administração predial mais conclusiva e clara a todos.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->

                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Contatos</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="">(11) 5678-1234</a>
                            </li>
                            <li>
                               <a class="white" href="">(11) 98765-4321</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->

                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Onde ficamos</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="">Av. Paulista, 1578 - Bela Vista - São Paulo/SP</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">CondoSoftware</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="<?=$base;?>/assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?=$base;?>/assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="<?=$base;?>/assets/js/bootstrap.min-home.js"></script> <!-- Bootstrap framework -->
    <script src="<?=$base;?>/assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?=$base;?>/assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?=$base;?>/assets/js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="<?=$base;?>/assets/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="<?=$base;?>/assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="<?=$base;?>/assets/js/all.min.js"></script>
    <script src="<?=$base;?>/assets/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>