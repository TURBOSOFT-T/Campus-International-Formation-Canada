@extends('front.fixe')
@section('titre', 'Offres')
@section('body')
    <main>


@php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
@endphp

<!-- Body main wrapper start -->


  {{--   <div class="breadcrumb__area breadcrumb-space overflow-hidden banner-home-bg "> --}}
     <div class="breadcrumb__area breadcrumb-space overflow-hidden" style="background: url('{{ asset('storage/' . $config->imageoffre) }}')  center center / cover no-repeat;  height: 600px;">

        <div class="banner-home__middel-shape inner-top-shape"></div>
        <div class="container">
            <div class="banner-all-shape-wrapper">
                <div class="banner-home__banner-shape-1 first-shape">
                    <img class="upDown-top" src="/front/assets/imgs/banner-1/banner-shape-1.svg" alt="img not found">
                </div>
                <div class="banner-home__banner-shape-2 second-shape">
                    <img class="upDown-bottom" src="/front/assets/imgs/banner-1/banner-shape-2.svg" alt="img not found">
                </div>
                <div class="right-shape">
                    <img class="zooming" src="/front/assets/imgs/inner-img/inner-right-shape.svg" alt="img not found">
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
              {{--   <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">{{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}</h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">{{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></span></li>
                                    <li class="active"><span>{{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- blog-news area start -->
    <section class="latest-blog__area section-space pb-90 overflow-hidden latest-blog-bg">
        <div class="container">
            <div class="row mb-minus-30">
 @foreach ($offres as $blog )
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="swiper-slide latest-blog__item-slide">
                        <div class="latest-blog__item-slide-inner">
                            <div class="latest-blog__item-media">
                                <a href="{{ route('details-offres', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->nom, 10))]) , }}">
                                    <img src="{{ Storage::url($blog->image) }}" alt="images not found" class="img-fluid">
                                </a>
                            </div>
                            <div class="latest-blog__item-text">
                                <div class="latest-blog__item-text-meta d-flex">
                                    <div class="latest-blog__item-text-meta-calender">
                                        <h4>{{  $blog->created_at->format('d') }}</h4>
                                        <p>{{ $blog->created_at->format('M') }}</p>
                                    </div>
                                    <span><a href="#"><i class="fa-regular fa-user"></i> {{ $blog->user->nom ?? 'Admin' }}</a></span>
                                   {{--  <span class="meta-comment"><a href="#"><i class="fa-regular fa-comment"></i> {{ $blog->comments->count() }} +  {{ \App\Helpers\TranslationHelper::TranslateText('Commentaire(s)') }}</a></span>
                           --}}     </div>
    
                                <div class="latest-blog__item-text-bottom">
                                    <a href="{{ route('details-offres', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->nom, 10))]) , }}"><h4> {{ \App\Helpers\TranslationHelper::TranslateText($blog->nom) }} </h4></a>
                                    <a href="{{ route('details-offres', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->nom, 10))]) , }}" class="readmore d-flex align-items-center"> {{ \App\Helpers\TranslationHelper::TranslateText('Voir plus') }} <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
          
             

               {{--  <div class="bottom-button d-flex mt-30">
                    <a href="#"><i class="fa-solid fa-angles-left"></i></a>
                    <a href="#"><i class="fa-solid fa-1"></i></a>
                    <a href="#"><i class="fa-solid fa-2"></i></a>
                    <a href="#"><i class="fa-solid fa-3"></i></a>
                    <a href="#"><i class="fa-solid fa-angles-right"></i></a>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- blog-news area end -->
    
  
    

   </main>
@endsection
