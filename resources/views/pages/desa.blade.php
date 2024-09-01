@extends('layouts.app')
@section('content')
<form class="header-search m-tb-15" style="margin-left: 20%;
    margin-right: 20%;" action="#" method="post">
                    <div class="header-search__content pos-relative">
                        <input type="search" name="header-search" placeholder="Search our store" required>
                        <button class="pos-absolute" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
<div style="display: grid;
    grid-template-columns: repeat(4, 1fr); 
    gap: 20px;
    padding: 20px;">
    @foreach ($desaWisata as $desa)
    <div class="blog-feed">
        <div class="blog-feed__img-box">
            <a href="/desa-wisata/{slug}" class="blog-feed__img--link">
                <img class="img-fluid" src="{{ $desa->gambar }}" alt="">
            </a>
        </div>
        <div class="blog-feed__content">
            <a href="/desa-wisata/{slug}" class="blog-feed__link">{{ $desa->nama }}</a>
            <div class="blog-feed__post-meta">
                kategori
                <a class="blog-feed__post-meta--link" href="blog-grid-sidebar-left.html"><span class="blog-feed__post-meta--author">{{ $desa->kategori }}</span></a>
            </div>
            <p class="blog-feed__excerpt">{{ $desa->deskripsi }}</p>
            <a href="/desa-wisata/{slug}" class="btn btn--small btn--radius btn--green btn--green-hover-black font--regular text-uppercase text-capitalize">Continue Detail</a>
        </div>
    </div>

@endforeach
</div>
@endsection