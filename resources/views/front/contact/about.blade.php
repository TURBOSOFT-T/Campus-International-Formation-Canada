@extends('front.fixe')
@section('titre', 'About')
@section('body')
    @php
        $config = DB::table('configs')->first();
         $images = DB::table('images')->get();
       
    @endphp



<!-- Body main wrapper start -->
<main>


                <div class="breadcrumb__area breadcrumb-space overflow-hidden" style="background: url('{{ asset('storage/' .$config->imageenteteabout) }}')  center center / cover no-repeat;  height: 600px;">

         
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
    </div>
</div>

    <!--latest about start-->
    <section class="latest-about2__area section-space overflow-hidden">
        <div class="container p-relative z-index-1">
            <div class="latest-about2__all-shape">
                <div class="latest-about2__all-shape-bg-shape">
                    <img class="upDown-bottom" src="/front/assets/imgs/latest-about/home-2/about2-bg-shape.svg" alt="img not found">
                </div>
                <div class="latest-about2__all-shape-circle-shape">
                    <img class="zooming" src="/front/assets/imgs/latest-about/home-2/about2-circle-img1.svg" alt="img not found">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="latest-about2__content">
                        <h6 class="latest-about2__content-subtitle">
                             {{ \App\Helpers\TranslationHelper::TranslateText('A propos de nous') }}
                        </h6>
                      {{--   <h2 class="latest-about2__content-title">  {{ \App\Helpers\TranslationHelper::TranslateText($config->titre_apropos ?? '') }}</h2>
                      --}}   <div class="latest-about2__content-description">
                            <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;">
                              {{--  {!!  $config->des_apropos !!}  --}}
                                {!! \App\Helpers\TranslationHelper::TranslateText($config->des_apropos ?? '') !!}
                            </p>
                        </div>
                    
                        <div class="latest-about2__content-btn">
                            <a  href="{{ route('contact') }}" class="rr-btn"> {{ \App\Helpers\TranslationHelper::TranslateText('Contact') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="latest-about2__media">
                        <div class="latest-about2__media-img1">
                            <img src="{{ Storage::url($config->image_apropos) }}" class="img-fluid" alt="img not found">
                        </div>
                        <div class="latest-about2__media-img2">
                            <img src="{{ Storage::url($config->image1_apropos) }}" class="img-fluid" alt="img not found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--latest about end-->


    <!--latest Choose Us start-->
    <section class="latest-Choose-us__area section-space overflow-hidden latest-Choose-bg">
        <div class="container p-relative z-index-1">
            <div class="latest-Choose-us__all-shape">
                <div class="latest-Choose-us__bg-shape">
                    <img class="upDown img-fluid" src="/front/assets/imgs/choose-us/bg-shape.svg" alt="img not found">
                </div>
                <div class="latest-Choose-us__bag-shape">
                    <img class="zooming img-fluid" src="{{ Storage::url($config->image_apropos1) }}" alt="img not found">
                </div>
                <div class="latest-Choose-us__cap-shape">
                    <img class="upDown-top img-fluid" src="{{ Storage::url($config->image1_apropos1) }}" alt="img not found">
                </div>
            </div>
            <div class="latest-Choose-us__media-experience-box d-flex" data-parallax='{"y": -160, "smoothness": 15}'>
                <div class="title">
                    <h3><span class="count">{{ $config->experience }}</span>+</h3>
                    <h4> {{ \App\Helpers\TranslationHelper::TranslateText('années') }}</h4>
                </div>
                <div class="description">
                    <p> {{ \App\Helpers\TranslationHelper::TranslateText('d\'expérience') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="latest-Choose-us__content mb-40">
                        <h6 class="subtitle wow fadeInLeft animated" data-wow-delay=".3s">
                             {{ \App\Helpers\TranslationHelper::TranslateText('Pourquoi nous choisir') }}
                        </h6>
                    <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;" class="wow fadeInLeft animated" data-wow-delay=".2s"> {!! \App\Helpers\TranslationHelper::TranslateText($config->des_apropos1 ?? ' ') !!}</p>

                 
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-5">
                    <div class="latest-Choose-us__media d-flex flex-row">
                        <div class="latest-Choose-us__media-img1">
                            <img src="{{ Storage::url($config->image2_apropos1) }}" alt="image not found" class="img-fluid">
                        </div>
                        <div class="latest-Choose-us__media-img2">
                            <img src="{{ Storage::url($config->image3_apropos1) }}" alt="image not found" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--latest Choose Us end-->

  

    <!-- Faq area start -->
    <section class="question__area overflow-hidden section-space question-bg">
        <div id="primary" class="content-area">
            <div class="container p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="faq">
                            <div id="faq" class="accordion">
                                <h6 class="subtitle wow fadeInLeft animated" data-wow-delay=".1s">
                                     {{ \App\Helpers\TranslationHelper::TranslateText('❓ Vous avez des questions ?') }}
                                </h6>
                                <h2 class="title mb-40 wow fadeInLeft animated" data-wow-delay=".2s">
 {{ \App\Helpers\TranslationHelper::TranslateText('Questions fréquemment posées (FAQ)') }}
                                </h2>

                                <div class="card wow fadeInLeft animated" data-wow-delay=".2s">
                                    <div class="card-header">
                                        <button class="card-link" data-bs-toggle="collapse" data-bs-target="#faq-1">
                                             {{ \App\Helpers\TranslationHelper::TranslateText($config->question ?? '') }}
                                        </button>
                                    </div>
                                    <div id="faq-1" class="collapse" data-bs-parent="#faq">
                                        <div class="card-body">
                                            <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;">
                                                 {!! \App\Helpers\TranslationHelper::TranslateText($config->reponse ?? '') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow fadeInLeft animated" data-wow-delay=".3s">
                                    <div class="card-header">
                                        <button class="card-link" data-bs-toggle="collapse" data-bs-target="#faq-2">
                                         {{ \App\Helpers\TranslationHelper::TranslateText($config->question1 ?? '') }}
                                        </button>
                                    </div>
                                    <div id="faq-2" class="collapse" data-bs-parent="#faq">
                                        <div class="card-body">
                                            <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;"> {!! \App\Helpers\TranslationHelper::TranslateText($config->reponse1 ?? '') !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card wow fadeInLeft animated" data-wow-delay=".4s">
                                    <div class="card-header">
                                        <button class="card-link" data-bs-toggle="collapse" data-bs-target="#faq-3">
                                          {{ \App\Helpers\TranslationHelper::TranslateText($config->question2 ?? '') }}
                                        </button>
                                    </div>
                                    <div id="faq-3" class="collapse" data-bs-parent="#faq">
                                        <div class="card-body">
                                        <p  style=" font-family: 'Times New Roman';color: black;font-size: 18px; line-height: 2; text-align: justify;"> {!! \App\Helpers\TranslationHelper::TranslateText($config->reponse2 ?? ' ') !!}</p>    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="media">
                            <img data-parallax='{"scale": 1.3, "smoothness": 15}' src="{{ Storage::url($config->image_apropos1) }}" alt="img not found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Faq area end -->

 <section class="main-brand__area">
        <div class="brand__area pb-120">
            <div class="container">
                <div class="row">
                    <div class="main-brand__tittle-wrapper text-center mb-40">
                        <h4 class="main-brand__tittle-wrapper-title">{{ \App\Helpers\TranslationHelper::TranslateText('Galleries') }}</h4>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper brand__active wow fadeIn" data-wow-delay=".3s">
                            <div class="swiper-wrapper">
                                @foreach($images as $gallery)
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
