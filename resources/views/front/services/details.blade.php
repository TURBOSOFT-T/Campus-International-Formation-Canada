@extends('front.fixe')
@section('titre', $service->nom)
@section('body')
  @php
            $config = DB::table('configs')->first();
            
        @endphp
   

<head>
    @section('services')
       {{--  <meta name="author" content="belle.com"> --}}
        <meta property="og:title" content="{{ $service->nom }}">
        <meta property="og:description" content="{{ $service->description ?? '' }}">
         <meta property="og:meta_description" content="{{ $service->meta_description ?? '' }}">
        <meta property="og:image" content="{{ $service->image }}">
        
        <meta name="robots" content="index, follow">
    @endsection
    
</head>


<!-- Body main wrapper start -->
<main>



    {{-- <div class="breadcrumb__area breadcrumb-space overflow-hidden banner-home-bg "> --}}
         <div class="breadcrumb__area breadcrumb-space overflow-hidden" style="background: url('{{ asset('storage/' . $service->categories->couverture) }}')  center center / cover no-repeat;  height: 600px;">

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
                <div class="col-12">
                   {{--  <div class="breadcrumb__content text-center">
                        <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">{{ \App\Helpers\TranslationHelper::TranslateText('Details') }}</h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">{{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></span></li>
                                    <li class="active"><span>{{ \App\Helpers\TranslationHelper::TranslateText('Details service') }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- service details area start -->
    <section class="section-space service-details__area">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="service-details-content">
                        <div class="service-details-content-thumb mb-30">
                             <img src="{{ Storage::url($service->image) }}" alt="image not found" class="img-fluid">
                        </div>

                        <h2 class="service-details-content-title">{!! \App\Helpers\TranslationHelper::TranslateText( $service->nom) !!}</h2>
                        <br>
<p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;"> {!! \App\Helpers\TranslationHelper::TranslateText( $service->meta_description ?? '') !!}</p>
                        
                        <br><br> <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;">
                            {!! \App\Helpers\TranslationHelper::TranslateText( $service->description ?? '') !!}
                        </p>
                      
                    </div>
                   
                </div>
                <div class="col-xl-4">
                    <div class="service-details-right">
                      
                        <div class="service-details-righ-widget mt-30">
                            <h5 class="title">
                                {!! \App\Helpers\TranslationHelper::TranslateText( 'Autres services') !!}
                            </h5>

                            <div class="search">
                                 @foreach ($services as $service )
                                <a href="{{ route('details-services', ['id' => $service->id, 'slug'=>Str::slug($service->nom)]) }}"{{-- href="{{ route('details-services', ['id' => $service->id, 'slug'=>Str::slug(Str::limit($service->nom, 10))])}}" --}}>
                                    <div class="search-bar main-search d-flex mb-20">
                                        <h6> {{ \App\Helpers\TranslationHelper::TranslateText($service->nom) }}</h6>
                                        <span>
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                    </div>
                                </a>
                                @endforeach
                                
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service details area end -->
  <!-- Brand area start -->
    <section class="main-brand__area">
        <div class="brand__area pb-120">
            <div class="container">
                <div class="row">
                    <div class="main-brand__tittle-wrapper text-center mb-40">
                        <h4 class="main-brand__tittle-wrapper-title">{{ \App\Helpers\TranslationHelper::TranslateText('Gallerie') }}</h4>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper brand__active wow fadeIn" data-wow-delay=".3s">
                            <div class="swiper-wrapper">
                                 @if ($imgs->isEmpty())
                                <p> {{ \App\Helpers\TranslationHelper::TranslateText('Aucune image disponible') }}.</p>
                                @else
                                @foreach($imgs   as $gallery)
                                <div class="swiper-slide">
                                    <div class="brand__item text-center  wow fadeIn animated" data-wow-delay=".1s">
                                        <div class="brand__thumb">
                                            <img class="img-fluid" src="{{ Storage::url($gallery->image) }}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand area end -->


    
</main>
@endsection