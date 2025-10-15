@extends('layouts.formation')

@php
    $config = DB::table('configs')->first();

@endphp
@php
    $title = \App\Helpers\TranslationHelper::TranslateText('Inscription');
    $subtitle = \App\Helpers\TranslationHelper::TranslateText('Inscription');
@endphp
@section('titre', \App\Helpers\TranslationHelper::TranslateText('Inscription'))
@section('body')
 <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <x-strickyHeader />
    <x-sidebar />

    <!--Contact One Start-->



    <section class="contact-one">
        <div class="container">
            <div class="contact-one__inner">


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                <form id="formationForm" class="contact-form-validated contact-one__form" method="POST" {{-- action="{{ route('event.confirm') }}" --}}>
                    @csrf
                    <input type="hidden" name="formation_id" value="{{ $formation->id }}">
                    <div class="row">

                       <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <input name="nom" type="text" placeholder="
                                  {{ \App\Helpers\TranslationHelper::TranslateText('Votre nom') }}
                                " required="required">
                                @error('nom')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <input name="prenom" type="text" placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Votre prénom') }}" required="required">
                                @error('prenom')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <input name="email" type="email" placeholder=" Email" required="required">
                                @error('email')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Autres champs comme téléphone, adresse, message -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <input name="telephone" type="text" placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Votre téléphone') }}" required="required">
                                @error('telephone')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <div class="select-box" style="position: relative;">
                                    <input type="text" id="countryInput" name="country_id"
                                        placeholder="{{ \App\Helpers\TranslationHelper::TranslateText('Pays') }}"
                                        autocomplete="off" />
                                    <input type="hidden" name="country_id" id="countryId" />
                                    <ul id="country-dropdown" class="selectmenu wide"
                                        style="border:1px solid #ccc; max-height:150px; overflow-y:auto; display:none; position:absolute; background:white; width:100%; padding:0; margin:0; list-style:none; z-index: 1000;">
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <input name="ville" type="text" placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Votre ville') }}">
                                @error('ville')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-one__input-box">
                                <input name="addresse" type="text" placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Votre adresse') }}">
                                @error('addresse')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="contact-one__input-box text-message-box">
                                <textarea name="message" placeholder=" {{ \App\Helpers\TranslationHelper::TranslateText('Laisser une note') }}" required="required"></textarea>
                                @error('message')
                                    <span class="small text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="contact-one__btn-box">
                                <button type="submit" class="thm-btn contact-one__btn">
                                     {{ \App\Helpers\TranslationHelper::TranslateText('Confirmation') }} <span class="icon-arrow-right"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="result"></div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function () {
                $('#formationForm').on('submit', function (e) {
                    e.preventDefault();
        
                    let form = $(this);
                    let formData = form.serialize();
        
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("formation.confirm") }}', // Assure-toi que cette route est correcte
                        data: formData,
                        success: function (response) {
                            if (response.status === 'duplicate') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Déjà inscrit',
                                    text: response.message
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Inscription réussie',
                                    text: response.message
                                });
                                form[0].reset(); // Réinitialiser le formulaire
                            }
                        },
                        error: function (xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                let errorMessages = '';
                                $.each(errors, function (key, value) {
                                    errorMessages += value + '<br>';
                                });
        
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreurs de validation',
                                    html: errorMessages
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur',
                                    text: 'Une erreur est survenue. Veuillez réessayer.'
                                });
                            }
                        }
                    });
                });
            });
        </script>

        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    confirmButtonColor: '#d33'
                });
            @endif

            /*  Swal.fire({
          icon: 'info',
          title: 'Chargement...',
          didOpen: () => {
            Swal.showLoading();
          }
        }); */
        </script>



        <script>
            const countries = @json($countries);

            const input = document.getElementById('countryInput');
            const list = document.getElementById('country-dropdown');
            const hiddenInput = document.getElementById('countryId');

            input.addEventListener('input', function() {
                const val = this.value.toLowerCase();
                list.innerHTML = '';

                if (!val) {
                    list.style.display = 'none';
                    hiddenInput.value = ''; 
                    return;
                }

                const filtered = countries.filter(c => c.name.toLowerCase().includes(val));

                filtered.forEach(country => {
                    const li = document.createElement('li');
                    li.textContent = country.name;
                    li.style.padding = '5px';
                    li.style.cursor = 'pointer';
                    li.addEventListener('click', () => {
                        input.value = country.name;
                        hiddenInput.value = country.id; 
                        list.style.display = 'none';
                    });
                    list.appendChild(li);
                });

                list.style.display = filtered.length ? 'block' : 'none';
            });

            
            document.addEventListener('click', (e) => {
                if (e.target !== input) {
                    list.style.display = 'none';
                }
            });
        </script>




    </section>


    <x-footer2 />
    <x-mobileMenu />
    <x-searchPopup />
    <x-scroll-to-top />
@endsection
