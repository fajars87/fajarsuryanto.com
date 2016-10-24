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
                    <img class="logo-page" src="./assets/img/portfolio_l.png" alt="Ukieweb">
                    <!-- Title Page -->
                    <h2 class="title">Portfolio</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title">Some of My Works</h4>
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

    <!-- Start Portfolio section -->
    <div class="portfolio-section padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                    <!-- Portfolio -->
                    <div class="portfolio">

                        <div class="filter_div controls">
                            <div class="col-xs-12 col-sm-12 col-lg-11">
                                <ul>
                                    <li class="hover-animate filter" data-filter="all">All</li>
                                    @foreach($cat as $ccat)
                                    <li class="hover-animate filter" data-filter=".category-{{ $ccat->id }}">{{ $ccat->category }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div id="portfolio-grid">
                        @foreach($port as $pport)
                            <div class="mix col-xs-12 col-sm-6 col-lg-4 portfolio-item category-{{ $pport->catportfolio_id }}" data-value="{{ $pport->id }}">
                                <div class="within">

                                    <img src="{{ asset('uploads') . '/'.  $pport->pict }}" alt="Alt">
                                    <div class="port-item-cont">
                                        <h3 class="title">{{ $pport->title }}</h3>
                                        <p class="desc">{{ $pport->desc }}</p>
                                        <a class="fancybox popup-content view-work hover-animate" href="#work-{{ $pport->id }}" rel="mygallery">View details</a>
                                    </div>

                                    <div class="hidden">
                                        <div class="podrt-desc" id="work-{{ $pport->id }}">
                                            <div class="modal-box-content">
                                                <img src="{{ asset('uploads') . '/'.  $pport->detpict }}" alt="Alt">
                                                <div class="text">
                                                    <h3 class="title">{{ $pport->title }}</h3>
                                                    <table>
                                                        <tr>
                                                            <td class="font-weight-m width-td">Completed</td>
                                                            <td>{{ $pport->complete }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-m">Client</td>
                                                            <td>{{ $pport->client }}</td>
                                                        </tr>
                                                    </table>
                                                    <p>{{ $pport->isi }}</p>
                                                    <a href="{{ $pport->url }}" class="btn btn-color">See Live</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        </div>

                    </div>
                    <!-- end Portfolio -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- End Portfolio section -->

@include('front-end.footer')