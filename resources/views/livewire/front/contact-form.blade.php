<div>

    <style>
        .form-control {
            width: 100% !important;
            background-color: #ffffff !important;
            border: solid 1px rgba(0, 0, 0, 0.096) !important;
            min-height: 50px !important;
            margin-left: 0px !important;
            font-size: 16px !important;
        }

        .loading-btn {
            height: 20px !important;
            width: 20px !important;
        }
    </style>

    <form wire:submit="save">
        <div class="row wow fadeInLeft animated" data-wow-delay=".9s">
            <div class="col-sm-6 pb-3">
                <input wire:model="nom" type="text" id="nom" class="form-control    " placeholder="Votre nom">
                @error('nom')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 pb-3">
                <input wire:model="email" type="email" id="email" class="form-control   "
                    placeholder="Votre Email">
                @error('email')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 pb-3">
                <input wire:model="telephone" type="number" id="telephone" class="form-control    "
                    placeholder="Votre téléphone">
                @error('telephone')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 pb-3">
                <input wire:model="sujet" id="suject" type="text" class="form-control  " placeholder="Subject">
                @error('sujet')
                    <span class="small text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <div class="contact-us__textarea ">
                    <textarea wire:model="message" cols="5" id="message" class="form-control " placeholder="Votre message"></textarea>
                    @error('message')
                        <span class="small text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
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

                <button class="rr-btn mt-30" type="submit">
                    <span wire:loading>
                        <img src="/icons/kOnzy.gif" class="loading-btn" alt="loading" srcset="">
                    </span>
                    <span>
                        {!! \App\Helpers\TranslationHelper::TranslateText( 'Envoyer') !!}
                    </span>
                </button>
            </div>

        </div>
    </form>

</div>
