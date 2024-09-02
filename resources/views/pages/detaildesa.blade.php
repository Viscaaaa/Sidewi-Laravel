@extends('layouts.app')
@section('content')

<div class="about-top" style="margin-top: 10% ">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-img">
                    <div class="img-responsive">
                        <img src={{ asset($desaWisata->gambar) }} alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-content">
                    <h4 class="font--regular">{{ $desaWisata->nama }}.</h4>
                    <p class="para__text">{{ $desaWisata->deskripsi }}</p> 
                    <a href="#" class="btn btn--icon-left btn--small btn--radius btn--transparent btn--border-green btn--border-green-hover-green font--regular text-capitalize m-t-20">More Information<i class="fal fa-angle-right"></i></a>
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
                                

                                @foreach ($desaWisata->destinasi as $desa)
                                <div class="blog-feed">
                                    <!-- Start Blog Feed Image -->
                                    <div class="blog-feed__img-box">
                                        <a href="blog-single-sidebar-left.html" class="blog-feed__img--link">
                                            <img class="img-fluid" src={{ asset($desa->gambar) }} alt="">
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
