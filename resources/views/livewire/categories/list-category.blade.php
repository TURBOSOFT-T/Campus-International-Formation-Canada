<div>

    <form wire:submit="filtrer">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control btn-sm" wire:model="key" placeholder="Titre,Description ">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            Filtrer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @include('components.alert')

    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
            <thead class="table-dark cusor">
                <tr>

                    <th>Logo</th>
                    <th>Couverture</th>
                    <th>Activité</th>
                  {{--   <th>Le lien du site</th> --}}
                    <th>Services(s)</th>
                  {{--    <th>Offre(s)</th> --}}

                    <th>Actualité(s)</th>

  <th>Statut</th>

                    <th style="text-align: right;">
                        <span wire:loading>
                            <img src="https://i.gifer.com/ZKZg.gif" width="20" height="20" class="rounded shadow"
                                alt="">
                        </span>
                    </th>
                </tr>
            </thead>


            <tbody>
                @forelse ($categories as $cat)
                    <tr>
                        <td>
                            <img src="{{ Storage::url($cat->photo) }}" width="40 " height="40 "
                                class="rounded shadow" alt="">

                        </td>

                        <td>
                            <img src="{{ Storage::url($cat->couverture) }}" width="40 " height="40 "
                                class="rounded shadow" alt="">

                        </td>
                        <td>


                            {{ $cat->nom }}
                        </td>

                       {{--  <td>

                            @if ($cat->site_url)
                                <a href="{{ $cat->site_url }}" target="_blank"
                                    class="badge bg-success text-decoration-none">
                                    Voir le site
                                </a>
                            @else
                                <span class="badge bg-secondary">
                                    Pas encore de site
                                </span>
                            @endif

                        </td> --}}
                        <td>{{ $cat->services->count() }}</td>
                       {{--    <td>{{ $cat->offres->count() }}</td> --}}

                        <td>{{ $cat->blogs->count() }}</td>
                       {{--  <td>
                            <button wire:click="toggleTop({{ $cat->id }})"
        wire:loading.attr="disabled"
        wire:target="toggleTop({{ $cat->id }})"
        class="btn btn-sm {{ $cat->top == '1' ? 'btn-success' : 'btn-danger' }}">
    @if ($cat->top == '1')
        <i class="bi bi-check-circle"></i> Activé
    @else
        <i class="bi bi-x-circle"></i> Désactivé
    @endif
</button>
                        </td>
 --}}

<td>
    <button wire:click="toggleTop({{ $cat->id }})"
            wire:loading.attr="disabled"
            wire:target="toggleTop({{ $cat->id }})"
            class="btn btn-sm {{ $cat->top == 1 ? 'btn-success' : 'btn-danger' }}">
        @if ($cat->top == 1)
            <i class="bi bi-check-circle"></i> Activé
        @else
            <i class="bi bi-x-circle"></i> Désactivé
        @endif
    </button>
</td>

 





                        <td style="text-align: right;">

                            <div class="btn-group">
                                <!-- Bouton Modifier -->
                                @can('category_edit')
                                    <a href="{{ route('categories.update', ['id' => $cat->id]) }}"
                                        class="btn btn-sm btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="35"
                                            hight="38" fill="currentColor">
                                            <path
                                                d="M16.7574 2.99677L9.29145 10.4627L9.29886 14.7098L13.537 14.7024L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z">
                                            </path>
                                        </svg>
                                    </a>
                                @endcan


                                <!-- Bouton Supprimer (avec confirmation JS) -->
                                @can('category_delete')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="toggle_confirmation({{ $cat->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                            style="background-color: #e0610d22; fill:#dbd7d7;" height="22"
                                            fill="currentColor">
                                            <path
                                                d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                            </path>
                                        </svg>
                                    </button>
                                @endcan
                            </div>

                           

                            <button class="btn btn-sm btn-success d-none" type="button"
                                id="confirmBtn{{ $cat->id }}" wire:click="delete({{ $cat->id }})">
                                <i class="bi bi-check-circle"></i>
                                <span class="hide-tablete">
                                    Confirmer
                                </span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            <div>
                                <img src="/icons/icons8-ticket-100.png" height="100" width="100" alt=""
                                    srcset="">
                            </div>
                            Aucune category trouvée
                        </td>
                    </tr>
                @endforelse

            </tbody>


        </table>
    </div>
    {{ $categories->links('pagination::bootstrap-4') }}



</div>
