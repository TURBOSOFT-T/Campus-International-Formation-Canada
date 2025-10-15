@extends('layouts.blog')
@php
$title = \App\Helpers\TranslationHelper::TranslateText('Actualités');
$subtitle = \App\Helpers\TranslationHelper::TranslateText('Actualités');
@endphp

@php
$config = DB::table('configs')->first();


$service = DB::table('services')->get();
$produit = DB::table('produits')->get();
// $categories = DB::table('categories')->first();



@endphp
@section('title', \App\Helpers\TranslationHelper::TranslateText('Actualités'))
@section('blog')

<x-strickyHeader />
<x-sidebar />

<!--Blog Page Start-->
<section class="blog-list">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-list__left">
                    <!--BLog Page Single Start-->
                    @foreach ($blogs as $blog )
                    <div class="blog-list__single">
                        <div class="blog-list__img-box">
                            <div class="blog-list__img">
                                <img src="assets/images/blog/blog-list-1-1.jpg" alt="">
                            </div>
                            <div class="blog-list__date">
                                {{-- <p>29 jan</p> --}}
                            </div>
                        </div>
                        <div class="blog-list__content">
                            <ul class="blog-list__meta list-unstyled">
                                <li>
                                    {{-- <a href="#"><span class="icon-user"></span>By admin</a> --}}
                                </li>
                                <li>
                                    <a href="#"><span class="icon-calendar"></span>{{ $blog->created_at }}</a>
                                </li>

                                <li>
                                    <p class="text-muted views-count" id="views-count-{{ $blog->id }}">{{ $blog->views ?? '0' }}
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Vues') }}
                                    </p>
                                </li>
                            </ul>
                            <h3 class="blog-list__title"><a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}">{{$blog->title}} </a></h3>
                            <div class="blog-list__btn-box">
                                <a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}" class="blog-list__btn thm-btn">Read More<span class="icon-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!--BLog Page Single End-->

                    <!--BLog Page Single End-->
                    <div class="blog-list__pagination">
                        <ul class="pg-pagination list-unstyled">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <h3 class="sidebar__title">
                            {{ \App\Helpers\TranslationHelper::TranslateText('Recherche') }}
                        </h3>
                        <form role="search" action="{{ url('searchblog') }}" method="get" class="sidebar__search-form">
                            {{-- <input type="search" placeholder="Search...."> --}}
                            <input id="search" type="search" name="search" value="{{ $name ?? '' }}" placeholder="Search...">
                            <button type="submit"><i class="icon-loupe"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__all-category">
                        <h3 class="sidebar__title">Catagory</h3>
                        <ul class="sidebar__all-category-list list-unstyled">

                            @foreach ($categories as $category)



                            <li>
                                <a href="/category_blog/{{ $category->id }}"><i class="icon-double-angle"></i>{{ $category->nom }}
                                    <span>({{ $category->blogs_count }})</span></a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title"> {{ \App\Helpers\TranslationHelper::TranslateText('Rescentes publication') }}</h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach ($lasts as $blog )
                            <li>
                                <div class="sidebar__post-content">
                                    <p class="sidebar__post-date"><span class="icon-calendar"></span>{{ $blog->created_at }}
                                    </p>
                                    <h3>
                                        <a href="#">

                                            {{ \App\Helpers\TranslationHelper::TranslateText($blog->title) }}
                                        </a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__tags">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Page End-->



<!--CTA One Start-->
<section class="cta-one">
    <div class="container">
        <div class="cta-one__inner">
            <h3 class="cta-one__title">
                {{ \App\Helpers\TranslationHelper::TranslateText('Vous souhaitez bénéficier d\'offres spéciales') }}
                <br>

                {{ \App\Helpers\TranslationHelper::TranslateText(' et mises à jour des formations?') }}
            </h3>
            <form id="newsletter-form" class="cta-one__form mc-form" action="{{ route('newsletter.subscribe') }}" method="POST">
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
<x-mobileMenu />
<x-searchPopup />
<x-scroll-to-top />
@endsection
