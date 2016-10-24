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
                    <img class="logo-page" src="./assets/img/profile_l.png" alt="Ukieweb">
                    <!-- Title Page -->
                    <h2 class="title">Profile</h2>
                    <!-- Description Page -->
                    <h4 class="sub-title">A Brief About Me</h4>
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
    <section class="content border-bottom padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-7 padding-bottom">
                    {!! $profile->about !!}
                        <a href="#" class="btn hover-animate">Hire me Now</a><a href="/assets/Fajar-Suryanto.pdf" class="btn btn-color hover-animate">Download CV</a>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-5">
                    <div class="block-grey">
                        <table>
                            <tr>
                                <td class="font-weight-m">Name</td>
                                <td class="text-right">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">E-mail</td>
                                <td class="text-right"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">Address</td>
                                <td class="text-right">{{ $profile->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">Phone</td>
                                <td class="text-right"><a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-m">Website</td>
                                <td class="text-right"><a href="{{ $profile->website }}">{{ $profile->website }}</a></td>
                            </tr>
                            @foreach($status as $sstatus)
                            <tr>
                                <td colspan="2" class="font-weight-m"><i class="fa fa-circle {{ $sstatus->icon }}" aria-hidden="true"></i>{{ $sstatus->detail }}</td>
                            </tr>
                            @endforeach
                            <!--
                             <tr>
                                 <td colspan="2" class="font-weight-m"><i class="fa fa-circle red-marker" aria-hidden="true"></i>Not available for freelance</td>
                             </tr>
                             <tr>
                                 <td colspan="2" class="font-weight-m"><i class="fa fa-circle orange-marker" aria-hidden="true"></i>In vacation till septembre 29</td>
                             </tr>
                             -->
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Content section -->

@include('front-end.footer')