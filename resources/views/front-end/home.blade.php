@include('front-end.header')

<body>
<!-- Load page -->
<div class="animationload">
    <div class="loader"></div>
</div>
<!-- End load page -->

<div id="wraper">

    <!-- Start Head section -->
    <header class="head">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-lg-7">
                    <img class="foto" src="{{ asset('uploads') . '/'.  $profile->photo }}" alt="Fajar Suryanto">
                    <!-- Title Page -->
                    <h2 class="title-header">{{ $user->name }}</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title-header">Technical Consultant &amp; Web Developer</h4>
                </div>
                <div class="col-xs-12 col-sm-5 col-lg-5 text-right">
                    <!-- social icon -->
                    <div class="social">
                        <ul class="animated" data-animation="fadeIn" data-animation-delay="600">
                            <!-- social icons -->
                            @foreach ($social as $ssocial)
                                <li><a class="ukie-icons hover-animate" href="{{ $ssocial->url }}"><i class="fa {{ $ssocial->icon }}"></i></a></li>
                            @endforeach
                            <!--
                                <li><a class="ukie-icons hover-animate" href="https://www.facebook.com/suryabadi"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="https://twitter.com/fajars87"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="http://lnked.in/fajarsuryanto"><i class="fa fa-linkedin"></i></a></li>
                            
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-youtube"></i></a></li>
                            
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-digg"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-deviantart"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-envelope-square"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-delicious"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-dropbox"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-tumblr"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-github-alt"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-renren"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-vk"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-xing"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-weibo"></i></a></li>
                                <li><a class="ukie-icons hover-animate" href="#"><i class="fa fa-rss"></i></a></li>
                            -->
                        </ul>
                    </div>
                    <!-- end social icon -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </header>
    <!-- End Head section -->


    <!-- Start Home-menu section -->
    <section class="home-content">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-lg-5 ">
                    <!-- Start Menu section -->
                    <nav class="menu-style4">
                        <!-- start container -->
                        <div class="container">
                            <!-- start row -->
                            <div class="row">
                                <ul>
                                    <li>
                                        <!-- start menu block (profile) -->
                                        <a href="/profile" class="menu-li hover-animate">
                                            <!-- icon menu block -->
                                                <span class="ukie-icons hover-animate">
                                                    <i class="fa fa-commenting" aria-hidden="true"></i>
                                                </span>
                                            <!-- name menu block -->
                                            <h2 class="title-header">Profile</h2>
                                        </a>
                                        <!-- end menu block (profile) -->
                                    </li>
                                    <li>
                                        <!-- start menu block (resume) -->
                                        <a href="/resume" class="menu-li hover-animate">

                                            <!-- icon menu block -->
                                                <span class="ukie-icons hover-animate">
                                                    <i class="fa fa-file" aria-hidden="true"></i>
                                                </span>
                                            <!-- name menu block -->
                                            <h2 class="title-header">Resume</h2>
                                        </a>
                                        <!-- end menu block (resume) -->
                                    </li>
                                    <li>
                                        <!-- start menu block (portfolio) -->
                                        <a href="/portfolio" class="menu-li hover-animate">
                                            <!-- icon menu block -->
                                                <span class="ukie-icons hover-animate">
                                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                                </span>
                                            <!-- name menu block -->
                                            <h2 class="title-header">Portfolio</h2>
                                        </a>
                                        <!-- end menu block (portfolio) -->
                                    </li>
                                    <li>
                                        <!-- start menu block (blog) -->
                                        <a href="/blog" class="menu-li hover-animate">
                                            <!-- icon menu block -->
                                                <span class="ukie-icons hover-animate">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </span>
                                            <!-- name menu block -->
                                            <h2 class="title-header">Blog</h2>
                                        </a>
                                        <!-- end menu block (portfolio) -->
                                    </li>
                                    <li>
                                        <!-- start menu block (contact) -->
                                        <a href="/contact" class="menu-li hover-animate">
                                            <!-- icon menu block -->
                                                <span class="ukie-icons hover-animate">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                            <!-- name menu block -->
                                            <h2 class="title-header">Contact</h2>
                                        </a>
                                        <!-- end menu block (contact) -->
                                    </li>
                                </ul>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container -->
                    </nav>
                    <!-- End Menu section -->
                </div>
                <div class="col-xs-12 col-sm-7 col-lg-7 text-right">
                    <!-- Your foto -->
                    <div class="foto-content-woman" style="background-image: url('./assets/img/fajars.png');">
                    </div>
                    <!-- end your foto -->
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Home-header section -->

@include('front-end.footer')