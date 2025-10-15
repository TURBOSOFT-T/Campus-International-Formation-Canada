@include('sweetalert::alert')
@extends('layouts.blog')

@php
$title = \App\Helpers\TranslationHelper::TranslateText(' Détails actualité');
$subtitle = \App\Helpers\TranslationHelper::TranslateText(' Détails actualité');
@endphp
@section('title', \App\Helpers\TranslationHelper::TranslateText(' Détails actualité'))
@section('blog')
@php
$config = DB::table('configs')->first();


$service = DB::table('services')->get();
$produit = DB::table('produits')->get();
// $categories = DB::table('categories')->first();



@endphp


 <head>
    @section('blogs')
        <meta name="author" content="belle.com">
        <meta property="og:title" content="{{ $blog->nom }}">
        <meta property="og:description" content="{{ $blog->description ?? '' }}">
        <meta property="og:image" content="{{ $blog->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $blog->prix }} DT">

        <meta property="og:availability" content="{{ $blog->statut }}">

        <meta property="blog:availability" content="{{ $blog->statut }}">
        <meta name="robots" content="index, follow">
    @endsection
    <link rel="stylesheet" href="path/to/zoom.css">
<script src="path/to/zoom.js"></script>
</head>
<x-strickyHeader />
<x-sidebar />

<!--Blog Details Start-->
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img-1">
                        <img src="{{ Storage::url($blog->image) }}" alt="">
                        <div class="blog-details__date">
                            {{-- <p>22 jan</p> --}}
                        </div>
                    </div>
                    <div class="blog-details__content">
                        <h3 class="blog-details__title-1">{{ $blog->title }}</h3>

                        
                       {{--  <p class="blog-details__text-1">Real estate is a lucrative industry that involves the
                            buying selling and renting properties It encompasses residential commercial and
                            industrial designsin properties. Real estate agents play a crucial</p>
                        <p class="blog-details__text-2">Real estate is a lucrative industry that involves the
                            buying, selling, and wasi renting properties. It encom residential, commercial, and
                            industrial properties is here Real estate is a lucrative industry that involves the
                            buying, selling, and wasi renting properties. It encompasses residential, commercial
                        </p> --}}
                        <div class="blog-details__quote-box">
                            <div class="blog-details__quote-icon">
                                <span class="icon-quote"></span>
                            </div>
                            {{-- <h3 class="blog-details__quote-box-client-name">Mark wood</h3>
                                    <p class="blog-details__quote-box-sub-title">CEO</p> --}}
                            <p class="blog-details__quote-box-text">{!! 
                                 \App\Helpers\TranslationHelper::TranslateText($blog->mete_description) 
                                !!}
                            </p>
                        </div>

                        <p class="blog-details__text-3">{!! 
                                   \App\Helpers\TranslationHelper::TranslateText($blog->description) 
                                !!}</p>

                       {{--  <p class="blog-details__text-4">A personal portfolio is a collection of work samples,
                            projects, and achievements that showca individual skills and expertise in a
                            particular field. It serves as a professional showcase to attract</p> --}}
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
                        </div>
                        {{-- <div class="blog-details__prev-and-next">
                                    <div class="blog-details__prev-box">
                                        <a href="#" class="blog-details__prev-arrow"><span
                                                class="icon-arrow-left"></span></a>
                                        <a href="#" class="blog-details__prev">Previous<br> post</a>
                                    </div>
                                    <div class="blog-details__next-box">
                                        <a href="#" class="blog-details__next">Next<br> post</a>
                                        <a href="#" class="blog-details__next-arrow"><span
                                                class="icon-arrow-right"></span></a>
                                    </div>
                                </div> --}}
                        {{-- <div class="blog-details__keyword-and-social">
                                    <div class="blog-details__keyword-box">
                                        <span>Keyword:</span>
                                        <div class="blog-details__keyword">
                                            <a href="#">Event Prodigy</a>
                                            <a href="#">Event Management</a>
                                        </div>
                                    </div>
                                    <div class="blog-details__social">
                                        <a href="#"><span class="icon-facebook"></span></a>
                                        <a href="#"><span class="icon-fi"></span></a>
                                        <a href="#"><span class="icon-instagram"></span></a>
                                    </div>
                                </div> --}}
                        <div class="blog-details__comment-box">
                            <h3 class="blog-details__comment-title">{{ $blog->comments->count() }} +  {{ \App\Helpers\TranslationHelper::TranslateText('Commentaire(s)') }}</h3>
                           
                                <p class="text-muted views-count" id="views-count-{{ $blog->id }}">{{ $blog->views ?? '0' }}
                            {{ \App\Helpers\TranslationHelper::TranslateText('Vues') }}
                        </p>
                           
                            @if ($comments->isEmpty())
                            <div class="alert alert-info">
                                <p>
                                
                                  {{ \App\Helpers\TranslationHelper::TranslateText('Aucun commentaire n\'a été publié pour le moment. Soyez le premier à laisser un commentaire!') }}
                                </p>
                            </div>
                            @else
                            @foreach ($comments as $comment)
                            <p class="blog-details__comment-date">{{ $comment->created_at->diffForHumans() }}</p>
                            <h4 class="blog-details__comment-client-name">{{ $comment->user->nom ?? ' ' }}</h4>
                            <p class="blog-details__comment-text">{!!    \App\Helpers\TranslationHelper::TranslateText($comment->body)  !!}</p>
                            {{-- <div class="blog-details__comment-btn-box">
                                        <a href="#" class="blog-details__comment-btn thm-btn">reply</a>
                                    </div> --}}

                            @endforeach
                            @endif

                            <div class="pagination-wrapper">
                                {{ $comments->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="comment-one">
                        @if (Auth::check())
                        <h3 class="comment-one__title">
                              {{ \App\Helpers\TranslationHelper::TranslateText('Laissez un commentaire') }}
                        </h3>
                        <p class="comment-one__text">
  {!! \App\Helpers\TranslationHelper::TranslateText(' Votre avis compte pour nous ! N\'hésitez pas à partager vos impressions, questions ou suggestions en utilisant le formulaire ci-dessous. Nous sommes à votre écoute.
') !!}

</p>






                        <form id="commentForm" class="comment-one__form contact-form-validated" method="POST">
                            @csrf


                            <div class="row">
                                <input type="hidden" name="post_id" value="{{ $blog->id }}">
                                <div class="col-xl-12">
                                    <div class="comment-one__input-box">
                                        <input type="text" name="nom" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="comment-one__input-box">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="comment-one__input-box text-message-box">
                                        <textarea name="body" placeholder="Message here.."></textarea>
                                    </div>
                                    <div class="comment-one__btn-box">
                                        <button type="submit" class="thm-btn comment-one__btn">
                                              {{ \App\Helpers\TranslationHelper::TranslateText('Evoyer message') }}
                                            <span class="icon-arrow-right"></span></button>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <!-- Container pour l'alerte -->
                        <div id="successMessage" style="display:none; margin-top:15px;" class="alert alert-success"></div>


                        @else
                        <div class="alert" style="background-color: #f0ad4e; color: white;">
                            <p>
                                  {{ \App\Helpers\TranslationHelper::TranslateText('Vous devez') }}
                                <a href="{{ route('login') }}" style="color: white;">
                                
                                  {{ \App\Helpers\TranslationHelper::TranslateText('vous connecter') }}
                                </a> 
                                
                                  {{ \App\Helpers\TranslationHelper::TranslateText('pour laisser un commentaire.') }}
                                </p>
                        </div>
                        @endif
                        <div class="result"></div>
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
                        <h3 class="sidebar__title">  {{ \App\Helpers\TranslationHelper::TranslateText('Categorie') }}</h3>
                        <ul class="sidebar__all-category-list list-unstyled">
                            @foreach ($categories as $category)



                            <li>
                                <a href="/category_blog/{{ $category->id }}"><i class="icon-double-angle"></i>
                                      {{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}
                                    <span>({{ $category->blogs_count }})</span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__post">
                        <h3 class="sidebar__title">Recent Post
                              {{ \App\Helpers\TranslationHelper::TranslateText('Rescentes publications') }}
                        </h3>
                        <ul class="sidebar__post-list list-unstyled">
                            @foreach ($lasts as $blog )
                            <li>
                                <div class="sidebar__post-content">
                                    <p class="sidebar__post-date"><span class="icon-calendar"></span>{{ $blog->created_at }}
                                    </p>
                                    <h3>
                                        <a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}">
                                            {{ $blog->title }}</a>
                                    </h3>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__single sidebar__tags">
                        {{-- <h3 class="sidebar__title">Tags</h3>
                                <div class="sidebar__tags-list">
                                    <a href="#">All Project</a>
                                    <a href="#">Prodigy</a>
                                    <a href="#">Stellar Events</a>
                                    <a href="#">Occasions</a>
                                    <a href="#">Spectacular</a>
                                    <a href="#">Moments</a>
                                </div> --}}
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
                    
                {{ \App\Helpers\TranslationHelper::TranslateText(' et mises à jour des blogs?') }}
                </h3>
                <form  id="newsletter-form" class="cta-one__form mc-form"  action="{{ route('newsletter.subscribe') }}" method="POST" >
                    <div class="cta-one__form-input-box">
                        <input type="email" id="newsletter-email" placeholder="{{ \App\Helpers\TranslationHelper::TranslateText('Entrez votre email') }}" name="email">
                        <button type="submit" id="submit-btn" class="cta-one__btn"><span class="icon-paper-plan"></span></button>
                    </div>
                </form>
            </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('#commentForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();
            let postId = $('input[name="post_id"]').val();

            $.ajax({
                url: '/posts/' + postId + '/comments'
                , type: 'POST'
                , data: formData
                , success: function(response) {
                    Swal.fire({
                        icon: 'success'
                        , title: 'Merci !'
                        , text: 'Votre commentaire a été soumis et attend une validation.'
                        , confirmButtonColor: '#3085d6'
                    });

                    $('#commentForm')[0].reset(); // Réinitialiser le formulaire
                }
                , error: function(xhr) {
                    Swal.fire({
                        icon: 'error'
                        , title: 'Erreur'
                        , text: 'Une erreur est survenue lors de l\'envoi du commentaire.'
                    });
                }
            });
        });

    </script>

</section>
<!--CTA One End-->

<x-footer2 />
<x-mobileMenu />
<x-searchPopup />
<x-scroll-to-top />
@endsection
