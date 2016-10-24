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
                    <img class="logo-page" src="./assets/img/resume_l.png" alt="Ukieweb">
                    <!-- Title Page -->
                    <h2 class="title">Resume</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title">My Academic Qualifications</h4>
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
                    <h3 class="title title-resume">Education</h3>
                    <div class="block-grey">
                        <div id="education-slider" class="owl-carousel owl-theme">
                        @foreach($edu as $eedu)
                            <div class="item">
                                <table>
                                    <tr>
                                        <td class="font-weight-m width-td">Name</td>
                                        <td>{{ $eedu->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-m">Address</td>
                                        <td>{{ $eedu->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-m">Period</td>
                                        <td>{{ $eedu->period }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-m">Level</td>
                                        <td>{{ $eedu->level }}</td>
                                    </tr>
                                </table>
                                <p>{!! $eedu->note !!}</p>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-resume">Work</h3>
                    <div class="block-grey">
                        <div id="work-slider" class="owl-carousel owl-theme">
                        @foreach($work as $wwork)
                            <div class="item">
                                <table>
                                    <tr>
                                        <td class="font-weight-m width-td1">Company Name</td>
                                        <td>{{ $wwork->company }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-m">Address</td>
                                        <td>{{ $wwork->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-m">Period</td>
                                        <td>{{ $wwork->period }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-m">Post</td>
                                        <td>{{ $wwork->position }}</td>
                                    </tr>
                                </table>
                                <p>{!! $wwork->note !!}</p>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Content section -->


    <!-- Start Skills section -->
    <section class="skills border-bottom padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6 padding-bottom">
                    <h3 class="title title-skills">Professional skills</h3>
                    @foreach($skp as $ssp)
                    <label class="progress-bar-label">{{ $ssp->skill }}</label>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $ssp->skill_range }}" aria-valuemin="0" aria-valuemax="100">
                            <span>{{ $ssp->skill_range }}%</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <h3 class="title title-skills">Additional skills</h3>
                    @foreach($ska as $ssa)
                    <div class="circle-progress-block">
                        <div class="circle-progress">
                            <input type="text" class="dial" value="{{ $ssa->skill_range }}" data-color="#00b6f9" data-from="0" data-to="99" />
                        </div>
                        <label class="circle-progress-label">{{ $ssa->skill }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6 language-skills">
                    <h3 class="title title-skills">Language skills</h3>
                    @foreach($skl as $ssl)
                    <div class="progress">
                        <label class="progress-bar-label">{{ $ssl->skill }}</label>
                        <span class="ratyli" data-rate="{{ $ssl->skill_range }}" data-ratemax="5"></span>
                    </div>
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6 knowledge">
                    <h3 class="title title-skills">Knowledge</h3>
                        <ul>
                        @foreach($know as $kknow)
                            <li>{{ $kknow->knowledge }}</li>
                        @endforeach
                        </ul>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Skills section -->


    <!-- Start Info section -->
    <section class="info border-bottom padding-block text-center">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h3 class="title">Hobbies &amp; Interest</h3>
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                @foreach($hobi as $hhobi)
                    <div class="circle-block ">
                        <span class="icon hover-animate"><i class="fa {{ $hhobi->icon }}"></i></span>
                        <span class="name hover-animate">{{ $hhobi->detail }}</span>
                    </div>
                @endforeach
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Info section -->

    <!-- Start Info section -->
    <section class="info padding-block border-bottom text-center">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h3 class="title">Experience</h3>
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row count">
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="total-numbers" data-perc="900">
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="total-numbers" data-perc="900">
                        <div class="iconspace"><i class="fa fa-thumbs-o-up"></i></div>
                        <div class="info-text">
                            <span class="sum">{{ $exp->project }}</span>
                            projects done
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="total-numbers" data-perc="900">
                        <div class="iconspace"><i class="fa fa-birthday-cake"></i></div>
                        <div class="info-text">
                            <span class="sum">
                                <?php
                                    $tahun_awal = 2014;
                                    $tahun_sekarang = date("Y");
                                     
                                    $hitungselisih = $tahun_sekarang - $tahun_awal;
                                     
                                    echo $hitungselisih
                                ?>
                            </span>
                            years experience
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="total-numbers" data-perc="900">
                        
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Info section -->


@include('front-end.footer')