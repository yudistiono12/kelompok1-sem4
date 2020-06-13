<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/home-templates/') ?>img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url('assets/home-templates/') ?>css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="<?= base_url('Home/index'); ?>">
                                    <img src="<?= base_url('assets/home-templates/') ?>img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?= base_url('Home/index'); ?>">home</a></li>
                                        <li><a href="<?= base_url('Home/profil'); ?>">Profile</a></li>
                                        <li><a href="<?= base_url('Home/rules/'); ?>">Rules</a></li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('assets/home-templates/') ?>course_details.html">course details</a></li>
                                                <li><a href="<?= base_url('assets/home-templates/') ?>elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('assets/home-templates/') ?>blog.html">blog</a></li>
                                                <li><a href="<?= base_url('assets/home-templates/') ?>single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= base_url('assets/home-templates/') ?>contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a href="#test-form" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span><a href="<?= base_url('Home/login'); ?>">log in</a></span>
                                </a>
                                <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="#">
                                        <i class="fa fa-phone"></i>
                                        <span>+10 378 467 3672</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- header-end -->