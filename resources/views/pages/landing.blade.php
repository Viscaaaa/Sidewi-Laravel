@extends('layouts.app')


@section('content')
@include('partials.navigation_bar')
<!-- ::::::  Start Hero Section  ::::::  -->
<div class="hero slider-dot-fix slider-dot slider-dot-fix slider-dot--center slider-dot-size--medium slider-dot-circle  slider-dot-style--fill slider-dot-style--fill-white-active-green dot-gap__X--10">
    <!-- Start Single Hero Slide -->
    <div class="hero-slider">
        <img src="assets/img/landing1.jpg" alt="">
        <div class="hero__content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8" style="color: white">
                        <div class="hero__content--inner">
                            <h6 class="title__hero title__hero--tiny text-uppercase">Welcome To Wonderfull</h6>
                            <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Welcome To Wonderfull</h1>
                            <h4 class="title__hero title__hero--small font--regular">Welcome To Wonderfull</h4>
                            <a href={{ route('showLogin') }} class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Single Hero Slide -->
    <!-- Start Single Hero Slide -->
    <div class="hero-slider">
        <img src="assets/img/landing2.jpg" alt="">
        <div class="hero__content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8" style="color: white">
                        <div class="hero__content--inner">
                            <h6 class="title__hero title__hero--tiny text-uppercase">Welcome To Wonderfull</h6>
                            <h1 class="title__hero title__hero--xlarge font--regular text-uppercase">Welcome To Wonderfull</h1>
                            <h4 class="title__hero title__hero--small font--regular">Welcome To Wonderfull</h4>
                            <a href="product-single-default.html" class="btn btn--large btn--radius btn--black btn--black-hover-green font--bold text-uppercase">Show more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
</div> 
<div>
    <div class="blog m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                         <!-- Start Section Title -->
                        <div class="section-content section-content--border m-b-35">
                            <h5 class="section-content__title">Our Destination</h5>
                            <a href="/desa-wisata" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize">More destinasi <i class="fal fa-angle-right"></i></a>
                        </div>  <!-- End Section Title -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="default-slider default-slider--hover-bg-red">
                            <div class="blog-feed-slider-3grid default-slider gap__col--30 ">
                                

                                @foreach ($desaWisata as $desa)
                                <div class="blog-feed">
                                    <!-- Start Blog Feed Image -->
                                    <div class="blog-feed__img-box">
                                        <a href="blog-single-sidebar-left.html" class="blog-feed__img--link">
                                            <img class="img-fluid" src={{ $desa->gambar }} alt="">
                                        </a>
                                    </div> <!-- End  Blog Feed Image -->
                                    <!-- Start  Blog Feed Content -->
                                    <div class="blog-feed__content ">
                                        <a href="blog-single-sidebar-left.html" class="blog-feed__link">{{ $desa->nama }}</a>
                                        
                                        <div class="blog-feed__post-meta">
                                            kategori
                                            <a class="blog-feed__post-meta--link" href="blog-grid-sidebar-left.html"><span class="blog-feed__post-meta--author">{{ $desa->kategori }}</span></a>
                                            
                                        </div>
                                        <p class="blog-feed__excerpt">{{ $desa->deskripsi }}</p>
                                        <a href="/desa-wisata/{{ $desa->slug }}" class="btn btn--small btn--radius btn--green btn--green-hover-black font--regular text-uppercase text-capitalize">Continue Detail</a>
                                    </div> <!-- End  Blog Feed Content -->
                                </div>
                                    
                                @endforeach

                                <!-- End Single Blog Feed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
   
</div>
    
@endsection