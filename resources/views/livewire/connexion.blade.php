{{--

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

<h4 class="mb-1">Bienvenue👋</h4>

@if (session()->has('error'))
<div class="alert alert-danger p-3 small">
    {{ session('error') }}
</div>
@endif
@if (session()->has('success'))
<div class="alert alert-success p-3 small">
    {{ session('success') }}
</div>
@endif
<form form wire:submit='connexion'>

    @csrf
    <div class="mb-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" value="{{ old('email') }}" class="form-control" id="email" wire:model="email" placeholder="Entrez votre email" autofocus />
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

    </div>
    <div class="mb-6 form-password-toggle">
        <label class="form-label" for="password">Mot de passes</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" wire:model="password" placeholder="Votre mot de passe" aria-describedby="password" />
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
        </div>
    </div>
    <div class="my-8">
        <div class="d-flex justify-content-between">
            <div class="form-check mb-0 ms-2">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Se souvenir de moi </label>
            </div>
            <a href="{{ route('forgot-password') }}">
                <p class="mb-0">Mot de passe oublié?</p>
            </a>
        </div>
    </div>
    <div class="mb-6">
        <button class="btn btn-primary d-grid w-100" type="submit">Connexion</button>
    </div>
</form>

<p class="text-center">
    <span>Nouvelle su notre platforme?</span>
    <a href="{{ route('register') }}">
        <span>Créer un compte</span>
    </a>
</p>



</div>
</div>

</div>
</div>
</div>
--}}


<div class="register-area pt-120 pb-120">
    <div class="container container-small">
        <div class="row">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="all-content">
                    <div class="title-wrapper text-center mb-40">
                        <h3 class="title">Welcome back!</h3>
                        {{-- <h6 class="subtitle">Enter your Credentials to access your account</h6> --}}
                    </div>
                    <div class="signup-form-wrapper">

                        @if (session()->has('error'))
                        <div class="alert alert-danger p-3 small">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-success p-3 small">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form form wire:submit='connexion'>

                            @csrf
                            <div class="item-thumb">
                                <div class="signup-item">
                                    <h6> 
                                      {{ \App\Helpers\TranslationHelper::TranslateText('E-mail') }}
                                    </h6>
                                  
                                     <input type="email" value="{{ old('email') }}"  id="email" wire:model="email"   placeholder="Votre mail" autofocus />
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
                                </div>
                                <div class="signup-item">
                                    <div class="wrap d-flex justify-content-between">
                                        <h6>{{ \App\Helpers\TranslationHelper::TranslateText('Mot de passe') }}</h6>
                                        <a href="{{ route('forgot_password') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('Mot de passe oublié?') }}
                                        </a>
                                    </div>
                                    <input type="password" id="password"  wire:model="password"   placeholder="Votre mot de passe" aria-describedby="password" />
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            
            @endif
           
                                </div>
                                <div class="signup-action">
                                    <div class="course-sidebar-list">
                                        <input class="signup-checkbo" type="checkbox" id="sing-in">
                                        <label class="sign-check" for="sing-in"><span>
                                         {{ \App\Helpers\TranslationHelper::TranslateText('Se souvenir pendant 30 jours') }}  
                                        </span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                              
                                 <button class="sing-buttom mb-20" type="submit">
                                   {{ \App\Helpers\TranslationHelper::TranslateText('Connxion') }}
                                 </button>
                            </div>
                            <div class="bottom-button">
                            </div>
                        </form>
                    </div>
                    <div class="button-wrap d-flex ">


                    </div>
                    <div class="sign-social text-center mt-25">
                        <h5> {{ \App\Helpers\TranslationHelper::TranslateText('Nouvelle sur notre plateforme ? ') }} <a href="{{ route('register') }}"> <span> {{ \App\Helpers\TranslationHelper::TranslateText('Créer un compte') }}</span></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
