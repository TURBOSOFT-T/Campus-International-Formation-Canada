@extends('front.fixe')
@section('titre', 'Services')
@section('body')


<main>

    @php
    $config = DB::table('configs')->first();

    @endphp






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
                            <h6> {{ \App\Helpers\TranslationHelper::TranslateText('Nos principaux services') }}</h6>
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
                            <img src="{{ Storage::url($service->image) }}" alt="img not found">
                        </div>
                        <div class="latest-service__item-title">
                            <a href="{{ route('details-services', ['id' => $service->id, 'slug'=>Str::slug(Str::limit($service->nom, 10))]) , }}">
                                <h4>{{ \App\Helpers\TranslationHelper::TranslateText($service->nom) }}</h4>
                            </a>
                        </div>
                        <div class="latest-service__item-text">
                            <p>{{ \App\Helpers\TranslationHelper::TranslateText($service->meta_description) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


        </div>



    </section>
    <!-- service area end -->


 


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



    <!-- latest-newsletter area end -->





</main>


@endsection
