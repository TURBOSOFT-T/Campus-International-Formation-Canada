@extends('layouts.event')
@php
    $title = \App\Helpers\TranslationHelper::TranslateText('Evènements');
    $subtitle = \App\Helpers\TranslationHelper::TranslateText('Evènements');
@endphp

@php
    $config = DB::table('configs')->first();
@endphp
@section('title', \App\Helpers\TranslationHelper::TranslateText(' Evènements'))
@section('event')

<x-strickyHeader/>
<x-sidebar/>

        <!-- Event Page Start -->
        <section class="event-page">
            <div class="container">
                <div class="schedule-one__inner">
                    <div class="section-title text-left">
                        <div class="section-title__tagline-box">
                            <span class="section-title__tagline">

                                {!! 
                                   \App\Helpers\TranslationHelper::TranslateText('Nos évènements') 
                                !!}
                            </span>
                        </div>
                       {{--  <h2 class="section-title__title">Follow event schedule</h2> --}}
                    </div>
                    <div class="schedule-one__main-tab-box tabs-box">
                        <ul class="tab-buttons clearfix list-unstyled">
                            {{-- <li data-tab="#1st-day" class="tab-btn active-btn">
                                <h3>Day 01</h3>
                                <p>16 April 2024</p>
                            </li>
                            <li data-tab="#2nd-day" class="tab-btn">
                                <h3>Day 02</h3>
                                <p>18 April 2024</p>
                            </li>
                            <li data-tab="#3rd-day" class="tab-btn">
                                <h3>Day 03</h3>
                                <p>24 April 2024</p>
                            </li> --}}
                        </ul>
                        <div class="tabs-content">
                            <!--tab-->
                            <div class="tab active-tab" id="1st-day">
                                <div class="schedule-one__tab-content-box">
                                    @foreach ($events as $event )
                                    <div class="schedule-one__single">
                                        <div class="schedule-one__left">
                                            <h3 class="schedule-one__title"><a   href="{{ route('details-events', ['id' => $event->id, 'slug'=>Str::slug(Str::limit($event->titre, 10))]) , }}">
                                                
                                            {!! 
                                   \App\Helpers\TranslationHelper::TranslateText($event->titre) 
                                !!}
                                            </a></h3>
                                            <p class="schedule-one__text"> 

                                                {!! 
                                   \App\Helpers\TranslationHelper::TranslateText($event->mete_description) 
                                !!}
                                            </p>
                                        </div>
                                        <div class="schedule-one__img">
                                            

                                            <a href="{{ route('details-events', ['id' => $event->id, 'slug'=>Str::slug(Str::limit($event->titre, 10))]) , }}">
                                                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title ?? 'Image de l\'événement' }}">
                                            </a>
                                        </div>
                                        <div class="schedule-one__address-and-btn-box">
                                            <ul class="list-unstyled schedule-one__address">
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-clock"></span>
                                                    </div>
                                                    <div class="text">
                                                       {{--  <p>10 Am To 10 Pm <br> 20 April 2024</p> --}}

                                                       <div class="text" style="font-weight: bold;">
                                                        <p>{{ \Carbon\Carbon::parse($event->start)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($event->heure)->format('H:i') }}
                                                            <br>
                                                            au {{ \Carbon\Carbon::parse($event->end)->format('d/m/Y') }}
                                                        </p>
                                                    </div>
                                                    
                                                    </div>
                                                </li>
                                                <li>@if($event->type == 'presentiel')
                                                    <div class="icon">
                                                        <span class="icon-pin"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p>{{ $event->adresse }} <br> {{ $event->country }}</p>
                                                    </div>
                                                @endif
                                                  
                                                </li>
                                            </ul>
                                            <div class="schedule-one__btn-box">
                                                <a  href="{{ route('event.inscription', ['id' => $event->id, 'slug'=>Str::slug(Str::limit($event->titre, 10))]) , }}" class="schedule-one__btn thm-btn">
                                                    {!! 
                                  \App\Helpers\TranslationHelper::TranslateText('Reservation')
                                !!}
                                                    <span
                                                        class="icon-arrow-right"></span> </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                  
                                   
                                </div>
                            </div>
                            <!--tab-->
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Event Page End -->

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