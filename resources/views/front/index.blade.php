@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')




<main>

    @php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();

    @endphp

    <!-- /#popup-search-box -->
    <!-- Body main wrapper start -->
    <script>
        document.querySelectorAll('[data-background]').forEach(function(el) {
            el.style.backgroundImage = `url(${el.getAttribute('data-background')})`;
        });

    </script>
    
<style>
    .banner {
    position: relative;
    width: 100%;
    height: 600px; /* hauteur fixe pour desktop */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.banner__thumb-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover; /* garde les proportions */
    background-repeat: no-repeat;
    z-index: 0;
}

.banner__content {
    position: relative;
    z-index: 1;
    text-align: center;
    padding: 20px;
    color: #fff;
}

/* Texte et tailles responsive */
.banner__title {
    font-size: 3rem;
    font-weight: 700;
}

.banner__content p {
    font-size: 1.25rem;
    margin-top: 10px;
}

/* Responsive pour tablette et mobile */
@media (max-width: 1024px) {
    .banner {
        height: 400px;
    }
    .banner__title {
        font-size: 2.5rem;
    }
    .banner__content p {
        font-size: 1.1rem;
    }
}

@media (max-width: 768px) {
    .banner {
        height: 300px;
    }
    .banner__title {
        font-size: 1.8rem;
    }
    .banner__content p {
        font-size: 1rem;
    }
}
.banner__thumb-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: 0;
        /* Optionnel : overlay clair supplémentaire */
        /* filter: brightness(0.7); déjà appliqué inline */
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .banner { height: 400px; }
        .banner__title { font-size: 2.5rem; }
        .banner__content p { font-size: 1.1rem; }
    }

    @media (max-width: 768px) {
        .banner { height: 300px; }
        .banner__title { font-size: 1.8rem; }
        .banner__content p { font-size: 1rem; }
    }
</style>
   
    <section class="banner__area p-relative z-1">
        <div class="swiper banner_parallax-slider p-relative">
            <div class="swiper-wrapper">
                @foreach ($banners as $key => $banner)
                <div class="swiper-slide">
                    <div class="banner banner__space">
                        <div class="banner__thumb-bg" data-background="{{ Storage::url($banner->image) }} "></div>
                        <div class="container">
                            <div class="banner__space-shape-wrapper">
                                <div class="banner__space-shape-wrapper-top-black-shape">
                                </div>
                                <div class="banner__space-shape-wrapper-bottom-shape">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-10">
                                    <div class="banner__content p-relative z-index-1">
                                        <span class="banner__sub-title wow fade-in-bottom" data-wow-delay="200ms"></span>
                                        <h2 class="banner__title wow fade-in-bottom" data-wow-delay="400ms">
                                            {{ $banner->titre ?? '' }}</h2>
                                        <p class="h5 wow fade-in-bottom" data-wow-delay="400ms">
                                            {{ $banner->sous_titre ?? '' }}</p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- If we need navigation buttons -->
            <div class="banner__navigation d-none d-lg-block">
                <button class="banner__button-next"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10H1" stroke="#001D08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 1L1 10L10 19" stroke="#001D08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <button class="banner__button-prev"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 10H19" stroke="#001D08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M10 1L19 10L10 19" stroke="#001D08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

            </div>
        </div>
    </section>





    <section class="latest-about2__area section-space overflow-hidden">
        <div class="container p-relative z-index-1">
            <div class="row align-items-center">
                <!-- Texte -->
                <div class="col-xl-6 col-lg-6">
                    <div class="latest-about2__content">
                        <h3 class="subtitle wow fadeInLeft animated"  style="color: #4e73b7;"  data-wow-delay=".8s"> {{ \App\Helpers\TranslationHelper::TranslateText($config->titre_home ) }}</h3>

<br>
                        <h3 class="title wow fadeInLeft animated" style="color: #db7354"   data-wow-delay=".8s"> {{ \App\Helpers\TranslationHelper::TranslateText($config->sous_titre_home) }}</h3>
                        <br>
                        <div class="latest-about2__content-description">

                            <p class="wow fadeInLeft animated" data-wow-delay="1s"> {!! \App\Helpers\TranslationHelper::TranslateText($config->slogan_apropos) !!}</p>
                        </div>

                    </div>
                </div>

                <!-- Images -->
                <div class="col-xl-6 col-lg-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <img src="{{ Storage::url($config->image1_home) }}" height="370" width="500" class="img-fluid rounded shadow" alt="img not found">
                        </div>
                        <div class="col-6">
                            <img src="{{ Storage::url($config->image2_home) }}" height="370" width="500" class="img-fluid rounded shadow" alt="img not found">
                        </div>
                        <div class="col-6">
                            <img src="{{ Storage::url($config->image3_home) }}" height="370" width="500" class="img-fluid rounded shadow" alt="img not found">
                        </div>
                        <div class="col-6">
                            <img src="{{ Storage::url($config->image4_home) }}" height="370" width="500" class="img-fluid rounded shadow" alt="img not found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




  <!-- service area start -->
    <section class="latest-service__area pt-120 pb-90 p-relative overflow-hidden latest-service-bg">
        <div class="container p-relative">
            <div class="latest-service__all-shape">
                <div class="latest-service__right-shape">
                    <img class="upDown" src="/front/assets/imgs/service/right-shape.svg" alt="img not found">
                </div>
                <div class="latest-service__bg-shape">
                    <img class="upDown" src="/front/assets/imgs/service/service-bg-shape.png" alt="img not found">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="latest-service__title-box mb-40 text-center">
                        <div class="latest-service__title-box-subtitle wow fadeInLeft animated" data-wow-delay=".6s">
                            <h6> {{ \App\Helpers\TranslationHelper::TranslateText('Services') }}</h6>
                        </div>
                        <div class="latest-service__title-box-title wow fadeInLeft animated" data-wow-delay=".8s">
                           {{--  <h2>Professional Digital Printing</h2> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                 @foreach ($services as $service)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="latest-service__item text-center wow fadeInLeft animated" data-wow-delay="1s">
                        <div class="latest-service__item-icon">
                            <img src="{{ Storage::url($service->image) }}" alt="img not found">
                        </div>
                        <div class="latest-service__item-title">
                              <a href="{{ route('details-services', ['id' => $service->id, 'slug'=>Str::slug(Str::limit($service->nom, 10))]) , }}"><h4>{{ \App\Helpers\TranslationHelper::TranslateText($service->nom) }}</h4></a>
                     
                        </div>
                        <div class="latest-service__item-text">
                            <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;">{!! \App\Helpers\TranslationHelper::TranslateText($service->meta_description) !!}</p>
                        </div>
                    </div>
                </div>
                 @endforeach
               
            </div>
        </div>
    </section>
    <!-- service area end -->



    <!--latest about end-->

    <!-- Faq area start -->
    <!-- Faq area start -->

    {{-- @foreach ($categories as $category )
    <section class="question__area overflow-hidden section-space question-bg">
        <div id="primary" class="content-area">
            <div class="container p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="faq">
                            <div id="faq" class="accordion">
                                <h6 class="subtitle wow fadeInLeft animated" data-wow-delay=".1s">{{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}</h6>
    <p>

        {!! \App\Helpers\TranslationHelper::TranslateText($category->description) !!}
    </p>

    <div class="card wow fadeInLeft animated" data-wow-delay=".2s">
        <div class="mediad">
            <img src="{{ Storage::url($category->photo) }}" width="400" height="400" alt="img not found">
        </div>
    </div>

    </div>
    </div>


    </div>

    <div class="col-xl-5 col-lg-6 col-md-6">
        <div class="latest-service__title-box-subtitle wow fadeInLeft animated" data-wow-delay=".6s">
            <h6>
                {{ \App\Helpers\TranslationHelper::TranslateText('Nos principaux Partenaires') }}
            </h6>
        </div>
        <br>
        @if($category->sponsors->count())
        <div id="sponsorCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-wrap="true">
            <div class="carousel-inner">
                @foreach ($category->sponsors as $key => $sponsor)
                <div class="carousel-item @if($key == 0) active @endif">
                    <img src="{{ Storage::url($sponsor->image) }}" class="d-block w-100" alt="{{ $sponsor->titre }}" style="height: 300px; object-fit: contain;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $sponsor->titre }}</h5>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Contrôles optionnels -->
            <button class="carousel-control-prev" type="button" data-bs-target="#sponsorCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sponsorCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
        @endif
    </div>


    </div>


    </div>
    </div>
    </div>
    </section>
    @endforeach --}}



    <!-- Script -->




    <!-- latest-counter area start -->
    <!-- Brand area start -->
    <section class="main-brand__area">
        <div class="brand__area pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="latest-service__title-box mb-40 text-center">
                            <div class="latest-service__title-box-subtitle wow fadeInLeft animated" data-wow-delay=".6s">
                              
                                  {{--   {{ \App\Helpers\TranslationHelper::TranslateText('Ils nous font confiance') }}
                                    --}}    <h2 class="latest-about2__content-title" style="color: #db7354"> {{ \App\Helpers\TranslationHelper::TranslateText('Ils nous font confiance') }}</h2>
                       
                            </div>
                              
                            <div class="latest-service__title-box-title wow fadeInLeft animated" data-wow-delay=".8s">
                                {{-- <h2>Professional Digital Printing</h2> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper brand__active wow fadeIn" data-wow-delay=".3s">
                            <div class="swiper-wrapper">
                                @foreach($sponsors as $gallery)
                                <div class="swiper-slide">
                                    <div class="brand__item text-center  wow fadeIn animated" data-wow-delay=".1s">
                                        <div class="brand__thumb">
                                            <img class="img-fluid" src="{{ Storage::url($gallery->image) }}" alt="image not found">
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand area end -->


    <!--testimonial-area start -->
    <section class="testimonial-3__area feedback-2 position-relative overflow-hidden section-space">
        <div class="container">
            <div class="testimonial-3__shape-wrapper">
                <div class="testimonial-3__shape-wrapper-bg-shape">
                    <img class="upDown" src="front/assets/imgs/testimonial-3/testmonial-3-bg-shape.svg" alt="img not found">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-3__title-wrapper text-center mb-50">
                        <h6 class="testimonial-3__title-wrapper-subtitle"> {{ \App\Helpers\TranslationHelper::TranslateText('Les retours de nos clients') }}</h6>
                        <h2 class="testimonial-3__title-wrapper-title">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Ce que nos clients disent de leur expérience') }}
</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-3__wrapper feedback-2__wrapper">
                        <div class="swiper testimonial-3__wrapper-active-2 feedback__active-2  wow fadeIn animated" data-wow-delay=".9s">
                            <div class="swiper-wrapper">
                                 @if ($testimonials->isEmpty())
                                    <p> {{ \App\Helpers\TranslationHelper::TranslateText('Aucun témoignage disponible') }}.
                                    </p>
                                    @else
                                    @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-3__wrapper-item-2 feedback__item-2">
                                        <div class="testimonial-3__wrapper-item-2-content feedback__item-2-content d-flex mb-sm-35 mb-xs-30">
                                            <div class="testimonial-3__wrapper-item-2-content-right-img">
                                                <figure class="image-anime">
                                                        @if ($testimonial->photo)
                                                        <img src="{{ asset('uploads/testimonials/' . $testimonial->photo) }}" alt="Photo Témoignage" width="100" height="100">
                                                        @else
                                                        <img src="images/author-1.jpg" alt="">
                                                        @endif
                                                    </figure>
                                               </div>

                                            <div class="content-thumb-social">
                                                <div class="testimonial-3__wrapper-item-2-content-social mb-10">

                                                     @for ($i = 1; $i <= 5; $i++) @if ($i <=$testimonial->stars)
                                                       {{--  <i class="fa-solid fa-star"></i> --}}
                                                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="#FFB016"/>
                                                    </svg> 
                                                        @else
                                                        <span class="icon-star text-muted"></span>
                                                        @endif
                                                        @endfor
                                                    {{-- <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="#FFB016"/>
                                                    </svg>                                                    
                                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="#FFB016"/>
                                                    </svg>                                                    
                                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="#FFB016"/>
                                                    </svg>                                                    
                                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="#FFB016"/>
                                                    </svg>                                                    
                                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 0L14.6942 8.2918H23.4127L16.3593 13.4164L19.0534 21.7082L12 16.5836L4.94658 21.7082L7.64074 13.4164L0.587322 8.2918H9.30583L12 0Z" fill="#FFB016"/>
                                                    </svg>    --}}                                                 
                                                </div>
                                                <p class="testimonial-3__wrapper-item-2-content-description" style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;">{!! \App\Helpers\TranslationHelper::TranslateText($testimonial->message) !!}</p>
                                                <div class="testimonial-3__wrapper-item-2-author feedback__item-2-author d-flex align-items-end justify-content-between">
                                                    <div class="testimonial-3__wrapper-item-2-author feedback__item-2-info">
                                                        <h4 class="text-capitalize">{{ $testimonial->name }}</h4>
                                                       {{--  <span>Product Manager</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                                 @endforeach
                                    @endif

                              
                            </div>
                        </div>

                        <div class="feedback-2__nav-pre wrapper">
                            <!-- If we need navigation buttons -->
                            <div class="feedback-2__navigation">
                                <button class="feedback-2__slider-button-prev">
                                    <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 22L2 12L12 2" stroke="#001D08" stroke-opacity="1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                        
                                </button>
                                <!-- If we need pagination -->
                                <button class="feedback-2__slider-button-next">
                                    <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 22L12 12L2 2" stroke="#001D08" stroke-opacity="1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                        
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <br>
                        
                        <div class="col-12 d-flex justify-content-center">
                            <div class="form-group mb--0">
                                <button type="submit" class="rr-btn mt-30" data-bs-toggle="modal" data-bs-target="#exampleModal">


                                    {{ \App\Helpers\TranslationHelper::TranslateText('Laissez un témoignage') }}
                                    <span class="icon-arrow-right"></span></button>
                            </div>

                        </div>

                         <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                        <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
        </div>
    </section>
    <!--testimonial-area end -->

    <!-- blog-news area start -->
    <section class="latest-blog__area pb-90 overflow-hidden latest-blog-bg">
        <div class="container">
            <div class="blog-top heading-space2">
                <div class="latest-blog__title-wrapper">
                   {{--  <h6 class="subtitle wow fadeInLeft animated" data-wow-delay=".2s"> {{ \App\Helpers\TranslationHelper::TranslateText('Les actualités') }}</h6>
                   --}} 
                      <h2 class="latest-about2__content-title2" style="color: #db7354"> {{ \App\Helpers\TranslationHelper::TranslateText('Actualités') }}</h2>
                       
                   <h2 class="title wow fadeInLeft animated" data-wow-delay=".4s">

                        {{ \App\Helpers\TranslationHelper::TranslateText('Restez informer des dernières actualités') }}

                    </h2>
                </div>
                <div class="latest-blog__button-right fadeInRight animated" data-wow-delay=".3s">
                    <button class="small-btn small-btn-transparent blog__slider-button-prev">
                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17L1 9L9 1" stroke="#001D08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="small-btn small-btn-transparent blog__slider-button-next">
                        <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 17L9 9L1 1" stroke="#001D08" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="row mb-minus-30">
                <div class="col-12">
                    <div class="latest-blog__item mb-30 wow fadeInLeft animated" data-wow-delay=".8s">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($blogs as $blog )

                                <div class="swiper-slide latest-blog__item-slide pb-30">
                                    <div class="latest-blog__item-media">
                                        <a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}">
                                            <img src="{{ Storage::url($blog->image) }}" alt="images not found" class="img-fluid">
                                        </a>
                                    </div>

                                    <div class="latest-blog__item-text">
                                        <div class="latest-blog__item-text-meta d-flex">
                                            <div class="latest-blog__item-text-meta-calender">
                                                <h4>{{ $blog->created_at->format('d') }}</h4>
                                                <p>{{ $blog->created_at->format('M') }}</p>
                                            </div>
                                            <span><a href="#"><i class="fa-regular fa-user"></i>{{ $blog->user->nom ?? 'Admin' }}</a></span>
                                            <span class="meta-comment"><a href="#"><i class="fa-regular fa-comment"></i>

                                                    {{ $blog->comments->count() }}
                                                    {{ \App\Helpers\TranslationHelper::TranslateText('Commentaire(s)') }}
                                                </a></span>



                                        </div>

                                        <div class="latest-blog__item-text-bottom">
                                            <a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}">
                                                <h4> {{ \App\Helpers\TranslationHelper::TranslateText($blog->title) }} </h4>
                                            </a>
                                            <a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}" class="readmore d-flex align-items-center"> {{ \App\Helpers\TranslationHelper::TranslateText('Voir plus') }} <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-counter__area pt-75 pb-75 pt-xs-30 pb-xs-60   latest-counter-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="latest-counter__counter-box wow fadeInLeft animated" data-wow-delay="1s">
                        <div class="latest-counter__content text-center">
                            <div class="latest-counter__content__counter-img mt-40">
                                <img src="/front/assets/imgs/counter/home1-counter-up-1.svg" alt="img not found">
                            </div>
                            <h5><span class="count">{{ $config->client }}</span>+</h5>
                            <span>
                                {{ \App\Helpers\TranslationHelper::TranslateText('Clients satisfaits') }}

                                
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="latest-counter__content text-center wow fadeInLeft animated" data-wow-delay="1.2s">
                        <div class="latest-counter__content__counter-img">
                            <img src="/front/assets/imgs/counter/home1-counter-up-2.svg" alt="img not found">
                        </div>
                        <h5><span class="count">{{ $config->sponsor }}</span>+</h5>
                        <span> {{ \App\Helpers\TranslationHelper::TranslateText('Paternaires') }}</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="latest-counter__content text-center wow fadeInLeft animated" data-wow-delay="1.4s">
                        <div class="latest-counter__content__counter-img man-icon">
                            <img src="/front/assets/imgs/counter/home1-counter-up-3.svg" alt="img not found">
                        </div>
                        <h5><span class="count">{{ $config->projet }}</span>+</h5>
                        <span>
                            {{ \App\Helpers\TranslationHelper::TranslateText('Experts') }}
                        </span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="latest-counter__content text-center wow fadeInLeft animated" data-wow-delay="1.6s">
                        <div class="latest-counter__content__counter-img ellipse-icon">
                            <img src="/front/assets/imgs/counter/home1-counter-up-4.svg" alt="img not found">
                        </div>
                        <h5><span class="count">{{ $config->experience }}</span>+</h5>
                        <span> {{ \App\Helpers\TranslationHelper::TranslateText('ans d\'expérience') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- latest-newsletter area start -->
    <section class="latest-newsletter__area pt-80 pb-80 overflow-hidden latest-newsletter-bg">
        <div class="container p-relative">
            <div class="row">
                <div class="col-xl-12">
                    <div class="latest-newsletter__content text-center">
                        <h2 class="title wow fadeInLeft animated" data-wow-delay=".4s">Newsletter</h2>
                        <p class="title wow fadeInLeft animated" data-wow-delay=".1s">
                            {!! \App\Helpers\TranslationHelper::TranslateText('Vous souhaitez bénéficier d\'offres spéciales') !!}
                            <br>
                            {!! \App\Helpers\TranslationHelper::TranslateText( ' et mises à jour ?') !!}</p>
                        <form id="newsletter-form" class="footer-widget-two__newsletter-form " action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <div class="search custom-search d-flex wow fadeInRight animated" data-wow-delay=".4s">
                                <input type="email" name="email" id="newsletter-email" placeholder=" Email">
                                <button type="submit" id="submit-btn" class="rr-btn"> {!! \App\Helpers\TranslationHelper::TranslateText( 'S\'inscrire maintenant') !!}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Vérifier si un message de succès ou d'erreur est dans la session
            @if(session('success'))
            Swal.fire('Succès', '{{ session('
                success ') }}', 'success');
            @endif

            @if(session('error'))
            Swal.fire('Erreur', '{{ session('
                error ') }}', 'error');
            @endif

            // Soumettre le formulaire newsletter avec AJAX
            $('#newsletter-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('newsletter.subscribe') }}", // Ta route d'abonnement
                    method: 'POST'
                    , data: {
                        _token: $('input[name="_token"]').val()
                        , email: $('#newsletter-email').val()
                    }
                    , success: function(response) {
                        Swal.fire({
                            icon: 'success'
                            , title: 'Succès'
                            , text: response.message, // Message du back-end
                            timer: 3000
                            , showConfirmButton: false
                        });

                        $('#newsletter-email').val(''); // Réinitialiser le champ email
                    }
                    , error: function(xhr) {
                        let message = 'Erreur inconnue.';
                        if (xhr.responseJSON ? .errors ? .email) {
                            message = xhr.responseJSON.errors.email[0]; // Afficher l'erreur de validation si elle existe
                        }

                        Swal.fire({
                            icon: 'error'
                            , title: 'Erreur'
                            , text: message // Message d'erreur
                        });
                    }
                });
            });
        });

    </script>


    <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{ \App\Helpers\TranslationHelper::TranslateText('Témoignage') }}</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>



    <div class="modal-body ">
        <form id="testimonialForm" action="{{ route('testimonial.store') }}" method="POST" class="testimonial-form p-4 rounded shadow-sm bg-light">
            @csrf
            <div class=" col-sm-9 form-group mb-2">
                <label class="form-label text-muted d-block mb-2">
                    {{ \App\Helpers\TranslationHelper::TranslateText('Votre nom') }}
                </label>
                <input type="text" class="form-control border-0 rounded-pill shadow-sm" id="name" name="name" required>
            </div>

            <div class="form-group mb-4">
                <label class="form-label text-muted d-block mb-2">
                    {{ \App\Helpers\TranslationHelper::TranslateText('Note') }}
                </label>
                <div class="star-rating">

                    @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" id="star{{ $i }}" name="stars" value="{{ $i }}" required>
                    <label for="star{{ $i }}" title="{{ $i }} étoiles">&#9733;</label>
                    @endfor
                </div>
            </div>

            <div class="form-group mb-4 col-sm-10">
                <label for="testimonial" class="form-label text-muted"> {{ \App\Helpers\TranslationHelper::TranslateText('Message') }}</label>
                <textarea class="form-control border-0 rounded-3 shadow-sm" id="testimonial" name="message" rows="10" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="thm-btn contact-one__btn rr-btn"> {{ \App\Helpers\TranslationHelper::TranslateText('Envoyer') }}</button>
            </div>
        </form>


        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
        @endif
        <style>
            .star-rating {
                direction: rtl;
                display: inline-flex;
                gap: 5px;
            }

            .star-rating input[type="radio"] {
                display: none;
            }

            .star-rating label {
                font-size: 2rem;
                color: #ccc;
                cursor: pointer;
            }

            .star-rating input[type="radio"]:checked~label,
            .star-rating label:hover,
            .star-rating label:hover~label {
                color: #FFD700;

            }

            .testimonial-form {
                max-width: 600px;
                margin: 0 auto;
                background-color: #f8f9fa;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                font-weight: 600;
                font-size: 1rem;
            }

            .form-control {
                padding: 0.75rem 1rem;
                font-size: 1rem;
                color: #495057;
                background-color: #fff;
                border-radius: 25px;
            }

            textarea.form-control {
                border-radius: 15px;
            }

            button.btn {
                padding: 0.5rem 2rem;
                font-size: 1.125rem;
                transition: background-color 0.3s ease;
            }

            button.btn-primary {
                background-color: #EFB121;
                border-color: #EFB121;
            }

            button.btn-primary:hover {
                background-color: #EFB121;
                border-color: #EFB121;
            }

            .alert {
                max-width: 600px;
                margin: 1rem auto;
            }

        </style>

    </div>



    </div>
    </div>
    </div>
    

    <style>
        .mediad img {
            width: 400px;
            height: 400px;
            object-fit: cover;
            /* ou "contain" si tu veux tout voir */
        }

    </style>
    <!--Testimonial One End-->



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // Vérifier si un message de succès ou d'erreur est dans la session
    @if(session('success'))
        Swal.fire('Succès', '{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        Swal.fire('Erreur', '{{ session('error') }}', 'error');
    @endif

    // Soumettre le formulaire newsletter avec AJAX
    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('newsletter.subscribe') }}", // Ta route d'abonnement
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                email: $('#newsletter-email').val()
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: response.message, // Message du back-end
                    timer: 3000,
                    showConfirmButton: false
                });

                $('#newsletter-email').val(''); // Réinitialiser le champ email
            },
            error: function (xhr) {
                let message = 'Erreur inconnue.';
                if (xhr.responseJSON?.errors?.email) {
                    message = xhr.responseJSON.errors.email[0]; // Afficher l'erreur de validation si elle existe
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: message // Message d'erreur
                });
            }
        });
    });
});
</script>



</main>


@endsection
