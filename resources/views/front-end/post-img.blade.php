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


    <section class="blog padding-block">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-8">
                    <!-- start post -->
                    <div class="post one-post">
                        <!-- start photo -->
                        <div class="photo">
                            <img src="{{ asset('uploads') . '/'.  $blog1->pict }}" alt="{{ $blog1->title }}">
                        </div>
                        <!-- end photo -->
                        <!-- start title post -->
                        <h3 class="title title-blog">{{ $blog1->title }}</h3>
                        <!-- end title post -->
                        <div class="entry-byline">
                            <i class="fa fa-user"></i>
                            <span class="entry-author right-border">
                                <a href="#" title="{{ $blog1->user->name }}" rel="author" >
                                    <span>{{ $blog1->user->name }}</span>
                                </a>
                            </span>
                            <i class="fa fa-clock-o"></i>
                            <time class="entry-published right-border">{{ date('F d, Y', strtotime($blog1->created_at)) }}</time>
                            <i class="fa fa-folder-open"></i>
                            <span class="comments-link">{{ $blog1->bcat->category }}</span>
                        </div>
                        <!-- start text post -->
                        {!! $blog1->isi !!}
                        <!-- end text post -->

                        <!-- start post pagination -->
                        <div class="post-pagination">
                                <a href="#" class="btn btn-color-hover hover-animate pre">Previews post</a>
                            <a href="#" class="btn btn-color-hover hover-animate next">Next post</a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- end post pagination -->

                        <!-- start post comments -->
                        <div class="post-comments">
                            <h3>Comments</h3>
                            <div class="post-content-txt">
                                <!--insert disqus script here-->
                            </div>
                        </div>
                        <!-- end post comments -->
                    </div>
                    <!-- end post -->

                </div>
                <div class="col-xs-12 col-sm-12 col-lg-4">
                    <!-- start slidebar -->

                    <aside class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                        @foreach($bcat as $cat)
                            <li class="cat-item cat-item-6"><a href="{{ asset('/') }}/category/{{ $cat->id }}">{{ $cat->category }}</a></li>
                        @endforeach
                        </ul>
                    </aside>

                    <aside class="widget widget_recent_entries">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                        @foreach($blog as $blogs)
                            <li><a href="{{ asset('/blog') }}/{{ $blogs->id }}">{{ $blogs->title }}</a></li>
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
@include('front-end.footer')