    <!-- Center modal content -->
    <div class="modal fade" id="personnel-{{ $personnel->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myCenterModalLabel">
                        Configuration des accès du  personnel 
                        <b class="text-capitalize"> {{ $personnel->nom }} </b>.
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update-personnel-permissions') }}" method="post">
                    <input type="hidden" name="id" value="{{$personnel->id}}">
                    @csrf
                    <div class="modal-body text-start">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>Dashborad</b>
                                    </td>
                                    <td colspan="4">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="dashboard" @checked($personnel->hasPermissionTo('dashboard'))  > Voir
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Clients</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="clients_view" @checked($personnel->hasPermissionTo('clients_view')) > Voir
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="clients_delete" @checked($personnel->hasPermissionTo('clients_delete'))> Supprimer
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                               
                              {{--   <tr>
                                    <td>
                                        <b>Gestion de stock</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="gestion_stock" @checked($personnel->hasPermissionTo('gestion_stock'))> Ajouter du stock
                                    </td>
                                </tr> --}}
                              
 <tr>
                                    <td>
                                        <b>Actualités</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="blog_view" @checked($personnel->hasPermissionTo('blog_view'))> Voir
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="blog_add" @checked($personnel->hasPermissionTo('blog_add'))> Ajouter
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="blog_edit" @checked($personnel->hasPermissionTo('blog_edit'))> Modifier
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="blog_delete" @checked($personnel->hasPermissionTo('blog_delete'))> Supprimer
                                    </td>

                                    
                                </tr>
                                <tr>
                                    <td>
                                        <b>Activités</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="category_view" @checked($personnel->hasPermissionTo('category_view'))> Voir
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="category_add" @checked($personnel->hasPermissionTo('category_add'))> Ajouter
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="category_edit" @checked($personnel->hasPermissionTo('category_edit'))> Modifier
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="category_delete" @checked($personnel->hasPermissionTo('category_delete'))> Supprimer
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Servives</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="service_view" @checked($personnel->hasPermissionTo('service_view'))> Voir
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="service_add" @checked($personnel->hasPermissionTo('service_add'))> Ajouter
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="service_edit" @checked($personnel->hasPermissionTo('service_edit'))> Modifier
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="service_delete" @checked($personnel->hasPermissionTo('service_delete'))> Supprimer
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Partenaires</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="sponsor_view" @checked($personnel->hasPermissionTo('sponsor_view'))> Voir
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="sponsor_add" @checked($personnel->hasPermissionTo('sponsor_add'))> Ajouter
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="sponsor_edit" @checked($personnel->hasPermissionTo('sponsor_edit'))> Modifier
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="sponsor_delete" @checked($personnel->hasPermissionTo('sponsor_delete'))> Supprimer
                                    </td>
                                </tr>

                               
                                <tr>
                                    <td>
                                        <b>Paramètres</b>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permissions[]" value="setting_view" @checked($personnel->hasPermissionTo('setting_view'))> Voir
                                    </td>
                                    <td colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">
                            Mettre a jour les permissions
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
