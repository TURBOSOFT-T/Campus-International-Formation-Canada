{{-- <div>
    @php
    $config = DB::table('configs')->first();
    
@endphp
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
              
                <div class="card">
                    <div class="card-body">
                       
                        <div class="app-brand justify-content-center mb-6">
                            <a href="#" class="app-brand-link">
                                <img
                                src="{{ Storage::url($config->logo) }}" alt="Logo" height="80" width="80" />
                               
                            </a>
                        </div>
                      
                        <h4 class="mb-1">Bienvenue  🚀</h4>

                        @if ($isRegistered)
                        <div class="alert alert-success">
                            Votre compte a été créé avec succès!!
                        </div>
                    @else
                        <form form wire:submit='save'>
                            @csrf
                            <div class="mb-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" wire:model="nom" class="form-control" id="nom"
                                    placeholder="Votre nom" autofocus  required/>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"  class="form-control" placeholder="Adresse email" wire:model="email" name="email"required/>
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control"  wire:model="password"
                                        placeholder="Votre mot de passe"
                                        aria-describedby="password"  required/>
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Confirmation de mot de passe</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control"  wire:model="password_confirmation"
                                        placeholder="Votre mot de passe"
                                        aria-describedby="password" required/>
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>

                            <div class="my-8">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        J'accepte
                                        <a href="javascript:void(0);"> la politique de confidentialité et les conditions
                                            Confirmation</a>
                                    </label>

                                </div>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger small">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                            <button class="btn btn-primary d-grid w-100">
                                <span wire:loading>
                                    <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                                </span>
                                <i class="ri-save-line me-1 fs-16 lh-1"></i>
                               
                                Confirmation</button>
                        </form>
                        @endif
                        
                        <br>
                    

                        <p class="text-center">
                            <span>Avez-vous déjà un compte?</span>
                            <a href="{{ route('login') }}">
                                <span>Se connecter</span>
                            </a>
                        </p>


                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
 --}}

  <div class="register-area pt-120 pb-120">
        <div class="container container-small">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="all-content">
                        <div class="title-wrapper text-center mb-40">
                            <h3 class="title">Welcome back!</h3>
                           {{--  <h6 class="subtitle">Enter your Credentials to access your account</h6> --}}
                        </div>
                        <div class="signup-form-wrapper">
                               @if ($isRegistered)
                        <div class="alert alert-success">
                            
                            {{ \App\Helpers\TranslationHelper::TranslateText('Votrecompte a été créé avec succès') }}
                        </div>
                    @else
                        <form form wire:submit='save'>
                            @csrf
                            <div class="item-thumb">
                                <div class="signup-item">
                                    <h6>{{ \App\Helpers\TranslationHelper::TranslateText('Nom') }}</h6>
                                    <input type="text" wire:model="nom"  id="nom"
                                   {{ \App\Helpers\TranslationHelper::TranslateText('Votre nom') }} autofocus  required/>
                                </div>
                                <div class="signup-item">
                                    <h6>{{ \App\Helpers\TranslationHelper::TranslateText('Votre mail') }}</h6>
                                     <input type="email"   {{ \App\Helpers\TranslationHelper::TranslateText('Votre adresse mail') }} wire:model="email" name="email"required/>
                       
                                </div>
                                <div class="signup-item">
                                    <h6>{{ \App\Helpers\TranslationHelper::TranslateText('Mot de passe') }}</h6>
                                    <input type="password" id="password"   wire:model="password"
                                       {{ \App\Helpers\TranslationHelper::TranslateText('Votre mot de passe') }}
                                        aria-describedby="password"  required/>
                                     </div>

                                 <div class="signup-item">
                                    <h6>{{ \App\Helpers\TranslationHelper::TranslateText('Confirmation de mot de passe') }}</h6>
                                    <input type="password" id="password" class="form-control"  wire:model="password_confirmation"
                                        {{ \App\Helpers\TranslationHelper::TranslateText('Confirmez votre mot de passe') }}
                                        aria-describedby="password" required/>
                                  
                                </div>
                                </div>
                                <div class="signup-action">
                                    <div class="course-sidebar-list">
                                        <input class="signup-checkbo" type="checkbox" id="sing-in">
                                        <label class="sign-check" for="sing-in"><span>I Agree to the terms and privacy policy.</span></label>
                                    </div>
                                </div>
                            </div>

                             @if ($errors->any())
                            <div class="alert alert-danger small">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                            <div class="button">
                             

                                  <button class="sing-buttom mb-20">
                                <span wire:loading>
                                    <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                                </span>
                                <i class="ri-save-line me-1 fs-16 lh-1"></i>
                               
                                
                            {{ \App\Helpers\TranslationHelper::TranslateText('Cofirmation') }}
                            </button>
                            </div>
                            <div class="bottom-button">
                            </div>
                        </form>
                        @endif
                        </div>
                        </div>
                        <div class="button-wrap d-flex ">
                            
                        </div>
                        <div class="sign-social text-center mt-25">
                             <h5><span>
                             {{ \App\Helpers\TranslationHelper::TranslateText('Avez-vous déjà un compte ?') }}     
                            </span> <a href="{{ route('login') }}">
                             {{ \App\Helpers\TranslationHelper::TranslateText('Se connecter') }}     
                            </a></h5> 

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>