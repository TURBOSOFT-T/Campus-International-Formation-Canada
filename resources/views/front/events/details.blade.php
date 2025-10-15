@extends('layouts.event')
@php
    $title = \App\Helpers\TranslationHelper::TranslateText('Détails évènement');
    $subtitle = \App\Helpers\TranslationHelper::TranslateText('Détails évènement');
@endphp

@php
    $config = DB::table('configs')->first();

@endphp
@section('title',  \App\Helpers\TranslationHelper::TranslateText('Détails évènement') )
@section('event')
 <head>
    @section('event')
        <meta name="author" content="belle.com">
        <meta property="og:title" content="{{ $event->nom }}">
        <meta property="og:description" content="{{ $event->description ?? '' }}">
        <meta property="og:image" content="{{ $event->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $event->prix }} DT">

        <meta property="og:availability" content="{{ $event->statut }}">

        <meta property="event:price:amount" content="{{ $event->prix }} DT">

        <meta property="event:availability" content="{{ $event->statut }}">
        <meta name="robots" content="index, follow">
    @endsection
    <link rel="stylesheet" href="path/to/zoom.css">
<script src="path/to/zoom.js"></script>
</head>
    <x-strickyHeader />
    <x-sidebar />

    <!--Event Details Start-->
    <section class="event-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="event-details__left">
                        <div class="event-details__img">
                            <img src="{{ Storage::url($event->image) }}" alt="">
                        </div>
                        <div class="event-details__main-tab-box tabs-box">

                            <div class="tabs-content">
                                <!--tab-->
                                <div class="tab active-tab" id="year-1">
                                    <div class="event-details__tab-content-box">
                                        <ul class="event-details__meta list-unstyled">
                                            @if ($event->type == 'presentiel')
                                                <li>
                                                    <p><span class="icon-clock"></span>{{ $event->adresse }}
                                                        {{ $event->country }}</p>
                                                </li>
                                            @endif
                                            <li>
                                                <p><span class="icon-pin"></span>
                                                    {{ \Carbon\Carbon::parse($event->start)->format('d/m/Y') }} à
                                                    {{ \Carbon\Carbon::parse($event->heure)->format('H:i') }}

                                                    au {{ \Carbon\Carbon::parse($event->end)->format('d/m/Y') }}
                                                </p>
                                            </li>
                                        </ul>
                                        <h3 class="event-details__title-1">{{ $event->titre }}</h3>
                                        <p class="event-details__text-1">
                                            {!! $event->description !!}
                                        </p>
                                        <p class="event-details__text-2">
                                            {!! $event->autre_description !!}
                                        </p>
                                        <br>
                                        <p class="event-details__text-2">
                                            {!! $event->autre_description1 !!}
                                        </p>


                                    </div>
                                </div>
                                <!--tab-->


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="event-details__right">

                        <div class="event-details__ticket">
                            <h3 class="event-details__ticket-title">Don’t have a ticket?</h3>
                            <p class="event-details__ticket-sub-title">Call Us Now</p>
                            <div class="event-details__ticket-icon">
                                <span class="icon-call"></span>
                            </div>
                            <p class="event-details__ticket-sub-title-2">For fast service</p>
                            <h3 class="event-details__ticket-number"><a
                                    href="tel:0173456765">{{ $event->telephone ?? 'not' }}</a></h3>
                        </div>
                        <div class="event-details__ticket-two">
                            <h3 class="event-details__ticket-two-title">Don’t have a ticket?</h3>
                            <p class="event-details__ticket-two-text">Events are special occasions where people
                                gather together to celebrate an Events are s occasions where people gather</p>
                            <div class="event-details__ticket-two-btn-box">
                                <a {{-- href="{{ route('event.inscription', ['id' => $event->id, 'slug'=>Str::slug(Str::limit($event->titre, 10))]) }}" --}} 
                                     href="{{ route('event.inscription', ['id' => $event->id, 'slug'=>Str::slug(Str::limit($event->titre, 10))]) , }}"
                                    class="event-details__ticket-two-btn thm-btn">Buy Ticket<span
                                        class="icon-arrow-right"></span></a>
                            </div>
                        </div>

                        <div class="event-details__location">
                            <h3 class="event-details__location-title">Location</h3>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                                class="google-map__one" allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Event Details End-->


    <!--CTA One Start-->
         <section class="cta-one">
            <div class="container">
                   <div class="cta-one__inner">
                <h3 class="cta-one__title">
                    {{ \App\Helpers\TranslationHelper::TranslateText('Vous souhaitez bénéficier d\'offres spéciales') }}
                    <br>
                    
                {{ \App\Helpers\TranslationHelper::TranslateText(' et mises à jour des events?') }}
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
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
