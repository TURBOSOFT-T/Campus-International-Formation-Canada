@extends('front.fixe')
@section('titre', 'Services')
@section('body')


    <main>

        @php
            $config = DB::table('configs')->first();
            
        @endphp





   {{--  <div class="breadcrumb__area breadcrumb-space overflow-hidden banner-home-bg "> --}}
     <div class="breadcrumb__area breadcrumb-space overflow-hidden" style="background: url('{{ asset('storage/' . $current_category->couverture) }}')  center center / cover no-repeat;  height: 600px;">

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
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">{{ \App\Helpers\TranslationHelper::TranslateText('Services') }}</h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">{{ \App\Helpers\TranslationHelper::TranslateText('Accueil') }}</a></span></li>
                                    <li class="active"><span>{{ \App\Helpers\TranslationHelper::TranslateText('Service') }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

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
                        <div class="latest-service__title-box-subtitle wow fadeInLeft animated" data-wow-delay=".3s">
                            <h6>  {{ \App\Helpers\TranslationHelper::TranslateText('Nos principaux services') }}</h6>
                        </div>
                        {{-- <div class="latest-service__title-box-title wow fadeInLeft animated" data-wow-delay=".4s">
                            <h2>Professional Digital Printing</h2>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                 @foreach ($services as $service )
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="latest-service__item text-center wow fadeInLeft animated" data-wow-delay=".4s">
                        <div class="latest-service__item-icon">
                            <img  src="{{ Storage::url($service->image) }}" alt="img not found">
                        </div>
                        <div class="latest-service__item-title">
                            <a href="{{ route('details-services', ['id' => $service->id, 'slug'=>Str::slug(Str::limit($service->nom, 10))])  }}"><h4>{{ \App\Helpers\TranslationHelper::TranslateText($service->nom) }}</h4></a>
                        </div>
                        <div class="latest-service__item-text">
                            <p style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;" >{{ \App\Helpers\TranslationHelper::TranslateText($service->meta_description) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>

             
        </div>



                            <div class="row">
                <div class="col-xl-12">
                    <div class="latest-service__title-box mb-40 text-center">
                        <div class="latest-service__title-box-subtitle wow fadeInLeft animated" data-wow-delay=".3s">
                          {{--   <h6>  {{ \App\Helpers\TranslationHelper::TranslateText('Nos principaux services') }}</h6> --}}
                          @if ($current_category->site_url)
                                <a href="{{ $current_category->site_url }}" target="_blank"
                                    class="badge bg-primary text-decoration-none">
                                   <h6>  {{ \App\Helpers\TranslationHelper::TranslateText('Voir le site') }}</h6>
                                </a>
                         
                            @endif
                        </div>
                        {{-- <div class="latest-service__title-box-title wow fadeInLeft animated" data-wow-delay=".4s">
                            <h2>Professional Digital Printing</h2>
                        </div> --}}
                    </div>
                </div>
            </div>
    </section>
    <!-- service area end -->


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
                                   <form  id="newsletter-form" class="footer-widget-two__newsletter-form "
                                action="{{ route('newsletter.subscribe') }}" method="POST" 
                                >
                                 @csrf
                        <div class="search custom-search d-flex wow fadeInRight animated" data-wow-delay=".4s">
                            <input  type="email" name="email" id="newsletter-email" placeholder=" Email">
                            <button type="submit" id="submit-btn" class="rr-btn">Subscribe Now</button>
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

    

    <!-- latest-newsletter area end -->
    




    </main>


@endsection