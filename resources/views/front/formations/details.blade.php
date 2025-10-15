@extends('layouts.formation')
@php
    $title = \App\Helpers\TranslationHelper::TranslateText('Détails Formation');
    $subtitle =  \App\Helpers\TranslationHelper::TranslateText('Détails Formation');
@endphp

@php
    $config = DB::table('configs')->first();

           
           
        

@endphp
@section('title',  \App\Helpers\TranslationHelper::TranslateText('Détails Formation'))
@section('body')

 <head>
    @section('formation')
        <meta name="author" content="belle.com">
        <meta property="og:title" content="{{ $formation->nom }}">
        <meta property="og:description" content="{{ $formation->description ?? '' }}">
        <meta property="og:image" content="{{ $formation->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $formation->prix }} DT">

        <meta property="og:availability" content="{{ $formation->statut }}">

        <meta property="formationt:price:amount" content="{{ $formation->prix }} DT">

        <meta property="product:availability" content="{{ $formation->statut }}">
        <meta name="robots" content="index, follow">
    @endsection
    <link rel="stylesheet" href="path/to/zoom.css">
<script src="path/to/zoom.js"></script>
</head>

<x-strickyHeader/>
<x-sidebar/>

        <!--Blog Details Start-->
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img-1">
                                <img src="{{ Storage::url($formation->image) }}" alt="">
                                <div class="blog-details__date">
                                    <p>22 jan</p>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                <h3 class="blog-details__title-1"> {{ \App\Helpers\TranslationHelper::TranslateText($formation->titre) }}</h3>
                                {{-- <p class="blog-details__text-1">Real estate is a lucrative industry that involves the
                                    buying selling and renting properties It encompasses residential commercial and
                                    industrial designsin properties. Real estate agents play a crucial</p> --}}
                                <p class="blog-details__text-2"> {!! \App\Helpers\TranslationHelper::TranslateText($formation->description) !!}
                                </p>
                                <div class="blog-details__quote-box">
                                    <div class="blog-details__quote-icon">
                                        <span class="icon-quote"></span>
                                    </div>
                                    {{-- <h3 class="blog-details__quote-box-client-name">Mark wood</h3>
                                    <p class="blog-details__quote-box-sub-title">CEO</p> --}}
                                    <p class="blog-details__quote-box-text">

                                         {{ \App\Helpers\TranslationHelper::TranslateText($formation->meta_description) }}
                                    </p>
                                </div>
                               {{--  <h3 class="blog-details__title-2">Your Event Our Expertise</h3>
                                <p class="blog-details__text-3">Aliquam eros justo, posuere loborti viverra laoreet
                                    matti ullamcorper design posuere viverra .Aliquam an eros justo, posuere lobortis,
                                    viverra laoreet augues mattis fermentum ullamcorper </p> --}}
                              {{--   <div class="blog-details__points-box">
                                    <ul class="blog-details__points list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-double-angle"></span>
                                            </div>
                                            <p>Creating Memories, One Event at a Time</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-double-angle"></span>
                                            </div>
                                            <p>Celebrate in Style, Celebrate with Class</p>
                                        </li>
                                    </ul>
                                    <ul class="blog-details__points list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-double-angle"></span>
                                            </div>
                                            <p>Where Events Come to Life</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-double-angle"></span>
                                            </div>
                                            <p>Making Your Event Dreams Come True</p>
                                        </li>
                                    </ul>
                                </div>
                                <p class="blog-details__text-4">A personal portfolio is a collection of work samples,
                                    projects, and achievements that showca individual skills and expertise in a
                                    particular field. It serves as a professional showcase to attract</p>
                                <div class="blog-details__img-box">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="blog-details__img-box-img-1">
                                                <img src="assets/images/blog/blog-details-img-box-img-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="blog-details__img-box-img-1">
                                                <img src="assets/images/blog/blog-details-img-box-img-2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                              
                                <div class="comment-one__btn-box">
                                    <a href="{{ route('formation.inscription',  $formation->id) }}"
                                        class="thm-btn comment-one__btn">

                                         {{ \App\Helpers\TranslationHelper::TranslateText('S\'inscrire') }}
                                        <span class="icon-arrow-right"></span>
                                     </a>
                                     
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__search">
                                <h3 class="sidebar__title"> {{ \App\Helpers\TranslationHelper::TranslateText('Recherche') }}</h3>
                                <form role="search" action="{{ url('searchformation') }}" method="get" class="sidebar__search-form">
                                    {{--  <input type="search" placeholder="Search...."> --}}
                                     <input  id="search"  type="search" name="search"    value="{{ $name ?? '' }}"
                                     placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Rechercher .......') }}">
                                     <button type="submit"><i class="icon-loupe"></i></button>
                                 </form>
                            </div>
                            <div class="sidebar__single sidebar__all-category">
                                <h3 class="sidebar__title"> {{ \App\Helpers\TranslationHelper::TranslateText('Categories') }}</h3>
                                <ul class="sidebar__all-category-list list-unstyled">
                                    @foreach ($categories as $category)
                                 
                           

                                    <li>
                                        <a href="/category_formation/{{ $category->id }}"><i class="icon-double-angle"></i> {{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}
                                            <span>({{ $category->formations_count }})</span></a>
                                    </li>
                               @endforeach
                                </ul>
                            </div>
                            
                            <div class="comment-one__btn-box">
                                <a href="{{ route('formation.inscription',  $formation->id) }}"
                                    class="thm-btn comment-one__btn">
                                     {{ \App\Helpers\TranslationHelper::TranslateText('S\'isncrire') }}
                                    <span class="icon-arrow-right"></span>
                                 </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Details End-->



        <!--CTA One Start-->
            <section class="cta-one">
            <div class="container">
                   <div class="cta-one__inner">
                <h3 class="cta-one__title">
                    {{ \App\Helpers\TranslationHelper::TranslateText('Vous souhaitez bénéficier d\'offres spéciales') }}
                    <br>
                    
                {{ \App\Helpers\TranslationHelper::TranslateText(' et mises à jour des formations?') }}
                </h3>
                <form  id="newsletter-form" class="cta-one__form mc-form"  action="{{ route('newsletter.subscribe') }}" method="POST" >
                    <div class="cta-one__form-input-box">
                        <input type="email" id="newsletter-email" placeholder="{{ \App\Helpers\TranslationHelper::TranslateText('Entrez votre email') }}" name="email">
                        <button type="submit" id="submit-btn" class="cta-one__btn"><span class="icon-paper-plan"></span></button>
                    </div>
                </form>
            </div>
            </div>
        </section>
        <!--CTA One End-->

<x-footer2 />
<x-mobileMenu/>
<x-searchPopup/>
<x-scroll-to-top/>
@endsection