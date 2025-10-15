<div>
  {{--   @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}

    <form wire:submit.prevent="save">
          <div class="modal-body">
              @include('components.alert') 
            <div class="row">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre *</label>
            <input type="text" id="titre" wire:model="titre" class="form-control">
            @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="col-sm-6 mb-3">
                    <label for="">Activités </label>
                    <select wire:model='category_id'  wire:change="loadServices" class="form-control @error('category_id') is-invalid @enderror">
                        <option value=""></option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>


                     <div class="col-sm-6 mb-3">
                    <label for="">Services </label>
                    <select wire:model='service_id' class="form-control @error('service_id') is-invalid @enderror">
                        <option value=""></option>
                        @foreach ($services as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image *</label>
            <input type="file" id="image" wire:model="image" class="form-control"  accept="image/*">

            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
          </div>
    </form>
</div>
