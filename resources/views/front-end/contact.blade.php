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
                <div class="col-xs-8 col-sm-11 col-lg-11">
                    <img class="logo-page" src="./assets/img/contact_l.png" alt="Ukieweb">
                    <!-- Title Page -->
                    <h2 class="title">Contact</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title">Get in touch with me</h4>
                </div>
                <div class="col-xs-4 col-sm-1 col-lg-1 text-right">
                    <a href="/" class="btn-close hover-animate"></a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </header>
    <!-- End Head section -->

    <!-- Start Content section -->
    <section class="content padding-block border-bottom">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6 padding-bottom">
                    <h3 class="title title-contact">Contact info</h3>
                    <div class="block-grey">
                        <table>
                            <tr>
                                <td class="font-weight-m width-td">Address</td>
                                <td>{{ $profile->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">Phone</td>
                                <td><a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">E-mail</td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">Website</td>
                                <td><a href="{{ $profile->website }}">{{ $profile->website }}</a></td>
                            </tr>
                        </table>
                        <!-- social icon -->
                        <div class="social">
                            <ul class="animated" data-animation="fadeIn" data-animation-delay="600">
                                <!-- social icons -->
                                @foreach($social as $ssocial)
                                <li><a class="ukie-icons hover-animate" href="{{ $ssocial->url }}"><i class="fa {{ $ssocial->icon }}"></i></a></li>
                                @endforeach
                                <!--
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
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-contact">Contact form</h3>
                    <!-- Start Contact Form -->
                    <div class="contact-form">
                        <form action="assets/php/contact.php" id="contact-form" method="post">
                            <input type="text" id="user-name" name="user-name" value="" placeholder="Name" />
                            <input type="email" id="user-email" name="user-email" value="" placeholder="Email" />
                            <input type="hidden" id="user-status" name="user-status" value="1"  />
                            <textarea id="user-message" name="user-message" placeholder="Message"></textarea>
                            <div class="footer-form">
                                <input type="submit" id="submit-btn" class="btn btn-color hover-animate"  value="Send Message" />
                                <div class="info-message-form">
                                    <p>Please fill out all the fields!</p>
                                    <span class="close-msg"><i class="fa fa-close"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Content section -->

@include('front-end.footer')