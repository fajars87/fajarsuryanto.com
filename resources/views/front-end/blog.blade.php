@include('front-end.header')
<body>

<!-- Load page -->
<div class="animationload">
    <div class="loader"></div>
</div>
<!-- End load page -->

<div id="wraper">

    <!-- Start Head section -->
    <header class="head-blog">
        <div class="slider_container">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="head">
                            <!-- start container -->
                            <div class="container">
                                <!-- start row -->
                                <div class="row">
                                    <div class="col-xs-8 col-sm-10 col-lg-10">
                                        <img class="logo-page" src="{{ asset('/') }}assets/img/blog_l.png" alt="Ukieweb">
                                        <!-- Title Page -->
                                        <h2 class="title">Blog</h2>
                                        <!-- Description Page -->
                                        <h4 class="sub-title">I write here my thoughts</h4>
                                    </div>
                                    <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                        <ul class="flex-direction-nav"><li><a class="next" href="#"></a></li></ul>
                                    </div>
                                    <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                        <a href="/" class="btn-close hover-animate"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="head search-head search-blog">
                            <!-- start container -->
                            <div class="container">
                                <!-- start row -->
                                <div class="row">
                                    <div class="col-xs-10 col-sm-11 col-lg-11">
                                        <form action="" method="">
                                            <input type="text" name="search" class="search-input" placeholder="Search" value="" />
                                            <input type="submit" class="btn-search" value="" />
                                        </form>
                                    </div>
                                    <div class="col-xs-2 col-sm-1 col-lg-1 text-right">
                                        <ul class="flex-direction-nav"><li><a class="prev" href="#"></a></li></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>



    <!-- Start Blog section -->
    <section class="blog padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-8 padding-bottom">
                @foreach($blog as $bblog)
                    <!-- start post -->
                    <div class="post">
                        <!-- start photo -->
                        <div class="photo">
                            <img src="{{ asset('uploads') . '/'.  $bblog->pict }}" alt="{{ $bblog->title }}">
                        </div>
                        <!-- end photo -->
                        <!-- start title post -->
                        <h3 class="title title-blog">{{ $bblog->title }}</h3>
                        <!-- end title post -->
                        <div class="entry-byline">
                            <i class="fa fa-user"></i>
                            <span class="entry-author right-border">
                                <a href="#" title="{{ $bblog->user->name }}" rel="author" >
                                    <span>{{ $bblog->user->name }}</span>
                                </a>
                            </span>
                            <i class="fa fa-clock-o"></i>
                            <time class="entry-published right-border">{{ date('F d, Y', strtotime($bblog->created_at)) }}</time>
                            <i class="fa fa-folder-open"></i>
                            <span class="comments-link">{{ $bblog->bcat->category }}</span>
                        </div>
                        <!-- start desc post -->
                        <p>{{ $bblog->desc }}</p>
                        <!-- end desc post -->
                        <a href="{{ asset('/') }}blog/{{ $bblog->id }}" class="btn hover-animate btn-color-hover">Read More</a>
                    </div>
                    <!-- end post -->
                @endforeach
                    <!-- start pagination -->
                    <div class="pagination">
                        <span class="page-numbers current">1</span>
                        <a class="page-numbers" href="#">2</a>
                        <a class="page-numbers" href="#">3</a>
                        <span class="page-numbers dots">…</span>
                        <a class="page-numbers" href="#">9</a>
                        <a class="next page-numbers" href="#">Next »</a>
                    </div>
                    <!-- end pagination -->
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-4">
                    <!-- start slidebar -->

                    <aside class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                        @foreach($bcat as $cat)
                            <li class="cat-item cat-item-6"><a href="{{ asset('/') }}category/{{ $cat->id }}">{{ $cat->category }}</a></li>
                        @endforeach
                        </ul>
                    </aside>

                    <aside class="widget widget_recent_entries">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                        @foreach($blogsb as $blogs)
                            <li><a href="{{ asset('/') }}blog/{{ $blogs->id }}">{{ $blogs->title }}</a></li>
                        @endforeach
                        </ul>
                    </aside>

                    <!-- end slidebar -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Blog section -->

    @include('front-end.footer')