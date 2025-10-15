@extends('front.fixe')
@section('titre', $blog->nom)
@section('body')
<main>


    @php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
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

    <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
            </form>
            <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
        </div>
    </div>
    <!-- Header area end -->

    <!-- Body main wrapper start -->
    <main>

        {{-- <div class="breadcrumb__area breadcrumb-space overflow-hidden banner-home-bg "> --}}
        <div class="breadcrumb__area breadcrumb-space overflow-hidden" style="background: url('{{ asset('storage/' . $config->imageblog) }}')  center center / cover no-repeat;  height: 600px;">

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
                        {{-- <div class="breadcrumb__content text-center">
                            <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                                <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Détails') }}</h1>
                    </div>
                    <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                        <nav>
                            <ul>
                                <li><span><a href="{{ route('home') }}">{{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></span>
                                </li>
                                <li class="active">
                                    <span>{{ \App\Helpers\TranslationHelper::TranslateText(' Détails actualité') }}</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
        </div>

        <!-- blog details area start -->
        <section class="section-space">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="blog__details-content">
                            <div class="blog__details-thumb mb-30">
                                <img src="{{ Storage::url($blog->image) }}" width="1390" height="747" alt="image not found" class="img-fluid">
                            </div>

                            <ul class="blog__details-meta mb-25">
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                                            <path d="M15.2222 17V15.2222C15.2222 14.2792 14.8476 13.3748 14.1808 12.708C13.514 12.0412 12.6097 11.6666 11.6667 11.6666H4.55556C3.61256 11.6666 2.70819 12.0412 2.0414 12.708C1.3746 13.3748 1 14.2792 1 15.2222V17" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.11024 8.11111C10.0739 8.11111 11.6658 6.51923 11.6658 4.55556C11.6658 2.59188 10.0739 1 8.11024 1C6.14656 1 4.55469 2.59188 4.55469 4.55556C4.55469 6.51923 6.14656 8.11111 8.11024 8.11111Z" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>{{ $blog->user->nom ?? 'Admin' }}</a></li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                        <path d="M13 2.50012H2.5C1.67157 2.50012 1 3.17169 1 4.00012V14.5001C1 15.3285 1.67157 16.0001 2.5 16.0001H13C13.8284 16.0001 14.5 15.3285 14.5 14.5001V4.00012C14.5 3.17169 13.8284 2.50012 13 2.50012Z" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.752 1V4" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4.75 1V4" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 6.99988H14.5" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ $blog->created_at ?? 'Date not found' }}</li>
                                </li>
                                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M14.9423 7.61112C14.9449 8.63769 14.7061 9.65036 14.2452 10.5667C13.6986 11.6647 12.8585 12.5882 11.8188 13.2339C10.7791 13.8795 9.58088 14.2217 8.35842 14.2222C7.33609 14.2249 6.32758 13.9851 5.41505 13.5222L1 15L2.47168 10.5667C2.01076 9.65036 1.7719 8.63769 1.77457 7.61112C1.77504 6.3836 2.11586 5.18046 2.75883 4.13644C3.40181 3.09243 4.32156 2.24879 5.41505 1.70002C6.32758 1.23719 7.33609 0.997346 8.35842 1.00002H8.7457C10.3602 1.08946 11.8851 1.77372 13.0284 2.9218C14.1718 4.06987 14.8532 5.60108 14.9423 7.22223V7.61112Z" stroke="#4A5764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg> {{ $blog->comments->count() }} +
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Commentaire(s)') }}</a></li>
                            </ul>

                            <h4>

                                {{ \App\Helpers\TranslationHelper::TranslateText($blog->title ) }}
                            </h4>
                            <br>


                            <blockquote>
                                <p>{!!
                                    \App\Helpers\TranslationHelper::TranslateText($blog->meta_description)
                                    !!}</p>

                                <span>Campus-International-Formation-Canada </span>
                            </blockquote>





                            <p>{!!
                                \App\Helpers\TranslationHelper::TranslateText($blog->description)
                                !!}</p>



                        </div>

                        <div class="comment-widget mt-80 mt-xs-60">
                            <h4 class="mb-30">

                                {{ $blog->comments->count() }} +
                                {{ \App\Helpers\TranslationHelper::TranslateText('Commentaire(s)') }}
                            </h4>
                            @if ($comments->isEmpty())
                            <div class="alert alert-info">
                                <p>

                                    {{ \App\Helpers\TranslationHelper::TranslateText('Aucun commentaire n\'a été publié pour le moment. Soyez le premier à laisser un commentaire!') }}
                                </p>
                            </div>
                            @else
                            @foreach ($comments as $comment)
                            <div class="comment-item d-flex align-items-start mb-30">
                                <div class="comment-item__img">
                                    <img src="/front/assets/imgs/blog-details/comment-1.png" alt="comment">
                                </div>
                                <div class="comment-item__content">
                                    <h6 class="name fs-16">{{ $comment->user->nom ?? ' ' }}</h6>
                                    <span class="date">{{ $comment->created_at->diffForHumans() }}</span>
                                    <p class="body-2 mb-20 mt-15">{!! \App\Helpers\TranslationHelper::TranslateText($comment->body) !!}</p>
                                    {{-- <button>Reply</button> --}}
                                </div>
                            </div>
                            @endforeach
                            @endif

                            <div class="pagination-wrapper">
                                {{ $comments->links('pagination::bootstrap-4') }}
                            </div>


                        </div>

                        <div class="live-comment-widget mt-80 mt-xs-60">
                            @if (Auth::check())
                            <h4> {{ \App\Helpers\TranslationHelper::TranslateText('Laissez un commentaire') }}</h4>
                            <p class="mb-30">
                                {!! \App\Helpers\TranslationHelper::TranslateText(' Votre avis compte pour nous ! N\'hésitez pas à partager vos impressions, questions ou suggestions en utilisant le formulaire ci-dessous. Nous sommes à votre écoute.
                                ') !!}

                                <span>*</span>
                            </p>

                            <div class="live-comment-widget__form">
                                <form id="commentForm" method="POST">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="post_id" value="{{ $blog->id }}">
                                        <div class="col-6">
                                            <div class="live-comment-widget__input">
                                                <label for="name">Name *</label>
                                                <input name="nom" placeholder="Name" id="name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="live-comment-widget__input">
                                                <label for="email">Email *</label>
                                                <input name="email" name="email" placeholder="Email" id="email" type="text">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="live-comment-widget__textarea">
                                                <label for="comment">Comment</label>
                                                <textarea name="body" name="textarea" id="comment" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="live-comment-widget__agree">
                                                <input style="" type="checkbox" class="form-check-input" id="agree">
                                                <label class="form-check-label" for="agree">Save my name, email,
                                                    and website in this browser for the next time I comment.</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="rr-btn mb-lg-60 mb-md-60 mb-sm-60 mb-xs-60">
                                                {{ \App\Helpers\TranslationHelper::TranslateText('Evoyer message') }}
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>


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
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="sidebar">
                            <div class="sidebar__widget">
                                <h5 class="sidebar__widget-title">{{ \App\Helpers\TranslationHelper::TranslateText('Recherche') }}</h5>

                                <div class="sidebar__widget-search">
                                    <div class="search__bar">
                                        <form role="search" action="{{ url('searchblog') }}" method="get" class="sidebar__search-form">
                                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M7.22221 13.4444C10.6586 13.4444 13.4444 10.6586 13.4444 7.22221C13.4444 3.78578 10.6586 1 7.22221 1C3.78578 1 1 3.78578 1 7.22221C1 10.6586 3.78578 13.4444 7.22221 13.4444Z" stroke="#525257" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M15.0005 15L11.6172 11.6167" stroke="#525257" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg></button>
                                            <input id="search" type="search" name="search" value="{{ $name ?? '' }}">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar__widget">
                                <h5 class="sidebar__widget-title sidebar__widget-title__have-bar">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Categorie') }}
                                </h5>

                                <div class="sidebar__widget-category">
                                    @foreach ($categories as $category)
                                    <a href="/category_blog/{{ $category->id }}/{{ $category->nom }}"><span><svg xmlns="http://www.w3.org/2000/svg" width="5" height="5" viewBox="0 0 5 5" fill="none">
                                            </svg> {{ \App\Helpers\TranslationHelper::TranslateText($category->nom) }}</span> <span>({{ $category->blogs_count }})</span>
                                    </a>
                                    @endforeach



                                </div>
                            </div>

                            <div class="sidebar__widget">
                                <h5 class="sidebar__widget-title"> {{ \App\Helpers\TranslationHelper::TranslateText('Rescentes publications') }}</h5>

                                <div class="sidebar-post__wrapper">
                                    @foreach ($lasts as $blog )
                                    <div class="sidebar-post">
                                        <a href="blog-details.html" class="sidebar-post_thumb">
                                            <img src="{{ Storage::url($blog->image) }}" alt="post">
                                        </a>

                                        <div class="sidebar-post_content">
                                            <ul class="post-meta">
                                                <li>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15 8C15 11.864 11.864 15 8 15C4.136 15 1 11.864 1 8C1 4.136 4.136 1 8 1C11.864 1 15 4.136 15 8Z" stroke="#FF3D00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M10.5962 10.2259L8.42623 8.93093C8.04823 8.70693 7.74023 8.16793 7.74023 7.72693V4.85693" stroke="#FF3D00" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    {{ $blog->created_at }}
                                                </li>
                                            </ul>

                                            <a href="{{ route('details-blogs', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->title, 10))]) , }}">
                                                <h3 class="title rr-fw-medium"> {{ $blog->title }}
                                                </h3>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="sidebar__widget-button">
                                <h5 class="sidebar">
                                    {{ \App\Helpers\TranslationHelper::TranslateText('Nous suivre') }}
                                </h5>

                                <div class="sidebar-tags">
                                    <div class="btn d-flex">
                                        @if($config->facebook)
                                        <a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if($config->messenger)
                                        <a href="{{ $config->messenger }}" target="_blank" rel="noopener noreferrer" aria-label="Messenger">
                                            <i class="fab fa-facebook-messenger"></i>
                                        </a>
                                        @endif

                                        @if($config->tiktok)
                                        <a href="{{ $config->tiktok }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                                            <i class="fab fa-tiktok"></i>
                                        </a>
                                        @endif
                                        @if($config->youtube)
                                        <a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
                                        @endif

                                        @if($config->instagram)
                                        <a href="{{ $config->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog details area end -->


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
                                {!! \App\Helpers\TranslationHelper::TranslateText(' et mises à jour ?') !!}
                            </p>
                            <form id="newsletter-form" class="footer-widget-two__newsletter-form " action="{{ route('newsletter.subscribe') }}" method="POST">
                                @csrf
                                <div class="search custom-search d-flex wow fadeInRight animated" data-wow-delay=".4s">
                                    <input type="email" name="email" id="newsletter-email" placeholder=" Email">
                                    <button type="submit" id="submit-btn" class="rr-btn">{!! \App\Helpers\TranslationHelper::TranslateText('S\'inscrire maintenant') !!}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                message = xhr.responseJSON.errors.email[
                                    0]; // Afficher l'erreur de validation si elle existe
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



    </main>
    @endsection
