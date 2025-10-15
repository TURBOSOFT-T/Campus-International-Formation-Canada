<div>
   

    @include('components.alert')

    <div class="table-responsive-sm">
        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
            <thead class="table-dark">
                <tr>
                  
                    <td></td>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>
                   
                  
                   <th>CV</th>
                    <th>Date</th>
                    <th class="text-end">
                        <span wire:loading>
                            <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                        </span>
                    </th>
                </tr>
            </thead>


            <tbody>
                @forelse ($candidatures as $candidature)
                    <tr>
                        {{-- <td>
                            <input type="checkbox" wire:click="togglecandidatureSelection({{ $candidature->id }})">
                        </td> --}}
                        <td>
                            <button class="btn btn-sm" data-bs-toggle="modal"
                                data-bs-target="#qr-code-{{ $candidature->id }}">
                                <i class="ri-qr-scan-2-line"></i>
                            </button>
                            <!-- Center modal content -->
                            <div class="modal fade" id="qr-code-{{ $candidature->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">
                                                candidature #{{ $candidature->id }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="text-muted">
                                                Veuillez scanner ce code Qr pour impprimer le Reçu de candidature .
                                            </h6>
                                           
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>
                        <td>{{ $candidature->id }}</td>
                        <td>
                            {{ $candidature->nom }}
                            @if ($candidature->note)
                                <i class="ri-message-2-fill" title="Une note a été ajouté"></i>
                            @endif
                        </td>
                        <td>{{ $candidature->prenom }}</td>
                         <td>{{ $candidature->email }}</td>
                        <td>{{ $candidature->phone }}</td>
                             
                        <td>
                            @if ($candidature->file)
    <a href="{{ asset('storage/' . $candidature->file) }}" target="_blank" class="custom-download-link">
        📄 Télécharger le CV
    </a>
@endif
                        </td>
                       
                        <td>{{ $candidature->created_at }} </td>
                        <td style="text-align: right;">
                            <div class="btn-group">
                               
                             
                              
                             
                              
                                    <button class="btn btn-sm btn-danger"
                                        onclick="toggle_confirmation({{ $candidature->id }})">
                                        <i class="ri-delete-bin-6-line"></i>
                                    </button>
                             
                            </div>
                           
                                <button class="btn btn-sm btn-success d-none" type="button"
                                    id="confirmBtn{{ $candidature->id }}" wire:click="delete({{ $candidature->id }})">
                                    <span class="hide-tablete">
                                        Confirmer
                                    </span>
                                </button>
                          
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11">
                            <div class="text-center">
                                <div>
                                    <img src="/icons/icons8-ticket-100.png" height="100" width="100"
                                        alt="" srcset="">
                                </div>
                                Aucune candidature trouvé
                                @if ($key)
                                    <b> " {{ $key }} " </b>
                                @endif
                                .
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>


        </table>
    </div>

    {{ $candidatures->links('pagination::bootstrap-4') }}




</div>
