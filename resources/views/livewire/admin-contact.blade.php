<div>
    @include('components.alert')


    <div class="card mb-8">
        <h5 class="card-header">Les configurations</h5>
        <form class="card-body" wire:submit="update_form" enctype="multipart/form-data">
            @csrf

            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Logo et images
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Logo</label>

                    <input type="file" wire:model="logo" accept="image/*" placeholder="votre logo"
                        class="form-control">
                    @error('logo')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Icone</label>

                    <input type="file" wire:model="icon" accept="image/*" placeholder="votre icone"
                        class="form-control">
                    @error('icon')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page contact(1920*800)</label>

                    <input type="file" wire:model="imagecontact" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('imagecontact')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page service (1920*800)</label>

                    <input type="file" wire:model="imageformation" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('imageformation')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page Actualité(1920*800)</label>

                    <input type="file" wire:model="imageblog" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('imageblog')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                 {{--  <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page Offre(1920*800)</label>

                    <input type="file" wire:model="imageoffre" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('imageoffre')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div> --}}

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page à propos(1920*800)</label>

                    <input type="file" wire:model="imageenteteabout" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('imageenteteabout')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                 {{-- <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image page Tracking(1920*800)</label>

                    <input type="file" wire:model="imageevent" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('imageevent')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div> --}}





                <div wire:ignore class="col-md-12">
                    <label class="form-label" for="multicol-username">Description</label>

                    <textarea type="text" wire:model="description" placeholder="description" rows="3"  class="ckeditor form-control"> </textarea>
                    @error('description')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

            </div>

            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    A propos de nous
                </h6>
            </div>
            <br>
            <br>
            <div class="row g-6">

                <div class="text-center bg-secondary card my-auto ">
                    <h6 class="text-white">
                        Section 1 (A propos de nous)
                    </h6>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Titre A propos de nous</label>

                    <input type="text" wire:model="titre_apropos" placeholder="Le titre " rows="3"
                        class="form-control">
                    @error('titre_apropos')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div wire:ignore class="col-md-12">
                    <label class="form-label" for="multicol-username">Description à propos de nous</label>

                    <textarea type="text" id="des_apropos" wire:model="des_apropos" placeholder="La description" rows="3"
                        class="form-control"> {!! $des_apropos !!}</textarea>
                    @error('des_apropos')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image 1 (500*370)</label>

                    <input type="file" wire:model="image_apropos" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image_apropos')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image 2 (370*261)</label>

                    <input type="file" wire:model="image1_apropos" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image1_apropos')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <br>
            <br><br>
            <div class="row g-6">
                <br><br>
                <br>
                <div class="text-center bg-secondary card my-auto ">

                    <h6 class="text-white">
                        Section 2( Pourquoi nous choisir)
                    </h6>
                </div>
                <br>

                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Titre </label>

                    <input type="text" wire:model="titre_apropos1" placeholder="Le titre " rows="3"
                        class="form-control">
                    @error('titre_apropos1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Description </label>

                    <textarea type="text" id="des_apropos1" wire:model="des_apropos1" placeholder="La description" rows="3"
                        class="form-control"> {!! $des_apropos1 !!} </textarea>
                    @error('des_apropos1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image 1 (468*641)</label>

                    <input type="file" wire:model="image_apropos1" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image1_apropos1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image 2 (270*500)</label>

                    <input type="file" wire:model="image1_apropos1" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image1_apropos1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image 3 (95*106)</label>

                    <input type="file" wire:model="image2_apropos1" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image2_apropos1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image 4 (95*102)</label>

                    <input type="file" wire:model="image3_apropos1" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image3_apropos1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <br> <br><br>
            <div class="row g-6">
                <div class="text-center bg-secondary card my-auto ">
                    <h6 class="text-white">
                        Section 3 (Question et réponce)
                    </h6>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Titre </label>

                    <input type="text" wire:model="titre_apropos2" placeholder="Le titre " rows="3"
                        class="form-control">
                    @error('titre_apropos2')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image (470*600)</label>

                    <input type="file" wire:model="image_apropos2" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image_apropos2')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Description</label>

                    <textarea type="text" wire:model="des_apropos2" placeholder="La description" rows="3"
                        class="form-control"> {!! $des_apropos2 !!}</textarea>
                    @error('des_apropos2')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>







                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Question 1</label>

                    <textarea type="text" wire:model="question" placeholder="La question" rows="3" class="form-control"> </textarea>
                    @error('question')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Reponse 1</label>

                    <textarea type="text" wire:model="reponse" placeholder="La réponse" rows="3" class="form-control"> </textarea>
                    @error('reponse')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>




                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Question 2</label>

                    <textarea type="text" wire:model="question1" placeholder="La question" rows="3" class="form-control"> </textarea>
                    @error('question1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Reponse 2</label>

                    <textarea type="text" wire:model="reponse1" placeholder="La réponse" rows="3" class="form-control"> </textarea>
                    @error('reponse1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Question 3</label>

                    <textarea type="text" wire:model="question2" placeholder="La question" rows="3" class="form-control"> </textarea>
                    @error('question2')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Reponse 3</label>

                    <textarea type="text" wire:model="reponse2" placeholder="La réponse" rows="3" class="form-control"> </textarea>
                    @error('reponse2')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>










            </div>


            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Le home page
                </h6>
            </div>

            <div class="row g-6">
                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Titre </label>

                    <input type="text" wire:model="titre_home" placeholder="Le titre " rows="3"
                        class="form-control">
                    @error('titre_home')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="multicol-username">Sous titre</label>

                    <input type="text" wire:model="sous_titre_home" placeholder="Le titre " rows="3"
                        class="form-control">
                    @error('sous_titre_home')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div wire:ignore class="col-md-12">
                    <label class="form-label" for="multicol-username">Description</label>

                    <textarea type="text" id="des_home"    wire:model="slogan_apropos" placeholder="La description" rows="3"
                        class="form-control">{!! $slogan_apropos !!} </textarea>
                    @error('slogan_apropos')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image1 home section 1 (300*170)</label>

                    <input type="file" wire:model="image1_home" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image1_home')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image2 home section 1 (300*170)</label>

                    <input type="file" wire:model="image2_home" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image2_home')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image3 home section 1 (300*170)</label>

                    <input type="file" wire:model="image3_home" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image3_home')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-username">Image4 home section 1 (300*170)</label>

                    <input type="file" wire:model="image4_home" accept="image/*" placeholder="votre image"
                        class="form-control">
                    @error('image4_home')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

            </div>
            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Les Addresses et réseaux sociaux
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-12">
                    <label class="form-label" for="multicol-first-name">Addresse</label>
                    <input type="text"wire:model="addresse" id="multicol-first-name" class="form-control"
                        placeholder="Addresse" />
                    @error('addresse')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="multicol-first-name">Localisation(Map)</label>
                    <input type="text"wire:model="localisation" id="multicol-first-name" class="form-control"
                        placeholder="Localisation" />
                    @error('localisation')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-last-name">Téléphone 1</label>
                    

                    <input type="text" wire:model="telephone" id="multicol-last-name" class="form-control"
                        placeholder="+33612345678" />

                    @error('telephone')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>


                <div class="col-md-3">
                    <label class="form-label" for="multicol-last-name">Téléphone 2</label>
                   

                    <input type="text" wire:model="telephone1" id="multicol-last-name" class="form-control"
                        placeholder="+33612345678" />

                    @error('telephone1')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-last-name">Fax</label>
                    <input type="number"wire:model="fax" id="multicol-last-name" class="form-control"
                        placeholder="Votre fax" />
                    @error('fax')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Email</label>
                    <input type="email"wire:model="email" id="multicol-last-name" class="form-control"
                        placeholder="Email" />
                    @error('email')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Facebook</label>
                    <input type="text"wire:model="facebook" id="multicol-last-name" class="form-control"
                        placeholder="Facebook" />
                    @error('facebook')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                 <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Messenger</label>
                    <input type="text"wire:model="messenger" id="multicol-last-name" class="form-control"
                        placeholder="Messenger" />
                    @error('messenger')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Instagram</label>
                    <input type="text" wire:model="instagram" id="multicol-last-name" class="form-control"
                        placeholder="Instagram" />
                    @error('instagram')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">TikTok</label>
                    <input type="text"wire:model="tiktok" id="multicol-last-name" class="form-control"
                        placeholder="TikTok" />
                    @error('tiktok')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-country">Youtube</label>
                    <input type="text"wire:model="youtube" id="multicol-last-name" class="form-control"
                        placeholder="Youtube" />
                    @error('youtube')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>



            </div>


            <hr class="my-6 mx-n4" />
            <div class="text-center bg-primary card my-auto p-1 mb-3">
                <h6 class="text-white">
                    Les statistiques globales
                </h6>
            </div>
            <div class="row g-6">
                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Clients</label>
                    <input type="text"wire:model="client" id="multicol-last-name" class="form-control"
                        placeholder="Client" />
                    @error('client')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>



                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Nombre de pateraires</label>
                    <input type="text"wire:model="sponsor" id="multicol-last-name" class="form-control"
                        placeholder="Paternaires" />
                    @error('sponsor')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Année Experience</label>
                    <input type="text"wire:model="experience" id="multicol-last-name" class="form-control"
                        placeholder="Expérience" />
                    @error('experience')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="multicol-first-name">Expersts</label>
                    <input type="text"wire:model="projet" id="multicol-last-name" class="form-control"
                        placeholder="Experts" />
                    @error('projet')
                        <span class="text-danger small"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="pt-6">
                <span wire:loading>
                    <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                </span>
                <i class="ri-save-line me-1 fs-16 lh-1"></i>
                <button type="submit" class="btn btn-primary me-4">Enregistrer les changements</button>

            </div>
        </form>
    </div>

</div>

<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

<script>
    const editor = CKEDITOR.replace('des_apropos');
    editor.on('change', function(event) {
        console.log(event.editor.getData())
        @this.set('des_apropos', event.editor.getData());
    })

    const editor1 = CKEDITOR.replace('des_apropos1');
    editor1.on('change', function(event) {
        console.log(event.editor1.getData())
        @this.set('des_apropos1', event.editor1.getData());
    })

    const editor2 = CKEDITOR.replace('des_home');
    editor2.on('change', function(event) {
        console.log(event.editor2.getData())
        @this.set('des_home', event.editor2.getData());
    })
</script>


<script>
    document.addEventListener('livewire:load', function() {
        let editor0 = CKEDITOR.replace('des_apropos');

        editor0.on('change', function() {
            @this.set('des_apropos', editor0.getData());
        });

        Livewire.hook('message.processed', () => {
            if (!editor0.document) {
                editor0 = CKEDITOR.replace('des_apropos');
                editor0.setData(@this.get('des_apropos')); 
            }
        });
    });


    document.addEventListener('livewire:load', function() {
        let editor11 = CKEDITOR.replace('des_apropos1');

        editor11.on('change', function() {
            @this.set('des_apropos1', editor11.getData());
        });

        Livewire.hook('message.processed', () => {
            if (!editor11.document) {
                editor11 = CKEDITOR.replace('des_apropos1');
                editor11.setData(@this.get('des_apropos1')); 
            }
        });
    });

    document.addEventListener('livewire:load', function() {
        let editor22 = CKEDITOR.replace('des_home');

        editor22.on('change', function() {
            @this.set('des_home', editor22.getData());
        });

        Livewire.hook('message.processed', () => {
            if (!editor22.document) {
                editor22 = CKEDITOR.replace('des_home');
                editor22.setData(@this.get('des_home')); 
            }
        });
    });
    
</script>



{{-- Script CKEditor --}}
{{-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (document.querySelector('.ckeditor')) {
            CKEDITOR.replaceAll('ckeditor');
        }
    });
</script> --}}
