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
        @section('offres')
        <meta name="author" content="belle.com">
        <meta property="og:title" content="{{ $blog->nom }}">
        <meta property="og:description" content="{{ $blog->description ?? '' }}">
        <meta property="og:image" content="{{ $blog->image }}">
        <meta property="og:type" content="product">

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
                            </ul>

                            <h4>

                                {{ \App\Helpers\TranslationHelper::TranslateText($blog->nom ) }}
                            </h4>
                            <br>


                            <blockquote>
                                <p>{!!
                                    \App\Helpers\TranslationHelper::TranslateText($blog->meta_description)
                                    !!}</p>

                                <span>TCHYCO </span>
                            </blockquote>





                            <p>{!!
                                \App\Helpers\TranslationHelper::TranslateText($blog->description)
                                !!}</p>



                        </div>


                        <div class="search custom-search d-flex wow fadeInRight animated" data-wow-delay=".4s">

                            <button type="submit" id="submit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" class="rr-btn">{!! \App\Helpers\TranslationHelper::TranslateText('Postuler maintenant') !!}</button>
                        </div>
                        <div id="successMessage" class="alert alert-success" style="display:none;"></div>
                    <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>


                    </div>

                    <div class="col-xl-4">
                        <div class="sidebar">
                            <div class="sidebar__widget">
                                <h5 class="sidebar__widget-title">{{ \App\Helpers\TranslationHelper::TranslateText('Recherche') }}</h5>

                                <div class="sidebar__widget-search">
                                    <div class="search__bar">
                                        <form role="search" action="{{ url('searchoffre') }}" method="get" class="sidebar__search-form">
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

                                            <a href="{{ route('details-offres', ['id' => $blog->id, 'slug'=>Str::slug(Str::limit($blog->nom, 10))]) , }}">
                                                <h3 class="title rr-fw-medium"> {{ $blog->nom }}
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
 <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{ \App\Helpers\TranslationHelper::TranslateText('Candidature') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            html: `
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            `,
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: "{{ session('success') }}",
            confirmButtonText: 'OK'
        });
    </script>
@endif


                <div class="modal-body ">
                    <form id="testimonialForms"  enctype="multipart/form-data" action="{{ route('post.confirm') }}" method="POST" class="testimonial-form p-4 rounded shadow-sm bg-light">
                        @csrf
                        <input   type="hidden"   name="offre_id" value="{{ $blog->id }}">
                    {{ csrf_field()}} 
                        <div class=" col-sm-10 form-group mb-2">
                            <label class="form-label text-muted d-block mb-2">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Votre nom') }}
                            </label>
                            <input type="text" class="form-control border-0 rounded-pill shadow-sm" id="name"@if (Auth::user()) value="{{ Auth::user()->nom }}"@endif name="nom" required>
                        </div>

                         <div class=" col-sm-10 form-group mb-2">
                            <label class="form-label text-muted d-block mb-2">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Votre prenom') }}
                            </label>
                            <input type="text" class="form-control border-0 rounded-pill shadow-sm" id="prenom" name="prenom"  @if (Auth::user()) value="{{ Auth::user()->prenom }}" @endif  required>
                        </div>
                         <div class=" col-sm-10 form-group mb-2">
                            <label class="form-label text-muted d-block mb-2">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Votre E-mail') }}
                            </label>
                            <input type="text" class="form-control border-0 rounded-pill shadow-sm" id="mail" name="email"  @if (Auth::user()) value="{{ Auth::user()->email }}" @endif required>
                        </div>
                         <div class=" col-sm-10 form-group mb-2">
                            <label class="form-label text-muted d-block mb-2">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Votre téléphone') }}
                            </label>
                            <input type="text" class="form-control border-0 rounded-pill shadow-sm" id="phone" name="phone"   @if (Auth::user()) value="{{ Auth::user()->phone }}" @endif required>
                        </div>

                          <div class=" col-sm-9 form-group mb-2">
                            <label class="form-label text-muted d-block mb-2">
                                {{ \App\Helpers\TranslationHelper::TranslateText('Votre CV') }}
                            </label>
                            <input type="file" class="form-control border-0 rounded-pill shadow-sm" id="file" name="file"  accept=".pdf,.doc,.docx" required>
                        </div> 
                        

                        <div class="form-group mb-4 col-sm-10">
                            <label for="testimonial" class="form-label text-muted"> {{ \App\Helpers\TranslationHelper::TranslateText('Message') }}</label>
                            <textarea class="form-control border-0 rounded-3 shadow-sm" id="testimonial" name="note" rows="10" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="thm-btn contact-one__btn rr-btn"> {{ \App\Helpers\TranslationHelper::TranslateText('Postuler') }}</button>
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
                            /* jaune étoile */
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




    </main>
    @endsection
