<?php

namespace App\Livewire\categories;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddCategory extends Component
{
    use WithFileUploads;

    public $posts, $title, $body, $post_id;
    public $updateMode = false;
   

    public $nom, $photo,$photo2,$couverture, $couverture2,$category,$description;
public $site_url,$link, $top;

    public function mount($category){
        if($category){
            $this->category = $category;
            $this->nom = $category->nom;
            $this->description = $category->description;
           
            $this->photo2 = $category->photo;
            $this->couverture2 = $category->couverture;
            $this->site_url = $category->site_url;
            $this->link = $category->link ?? 0;
             $this->top = $category->top ?? 0;
        }
    }

    private function resetInputFields(){
        $this->nom = '';
        $this->description = '';
    }

 public function toggleTop($id)
    {
        $cat = Category::findOrFail($id);

        // Basculer entre yes et no
        $cat->top = $cat->top === 'yes' ? 'no' : 'yes';
        $cat->save();

        session()->flash('success', 'Statut mis à jour avec succès ✅');
    }



    public function render()
    {
        return view('livewire.categories.add-category');
    }




    

    //validation
    public function create()
    {
        $this->validate([
            'nom' => 'required|string',
            'description' => 'nullable|string|Max:5000',
          //  'photo' => 'required|image|mimes:jpg,jpeg,png,webp',
            'photo' => 'sometimes|required|file|mimetypes:image/*',
            'couverture' => 'sometimes|nullable|file|mimetypes:image/*',
             'link'=>'nullable',
        ]);
        ;[
            'description.required' => 'La description doit avoir moins de 5000 caractères',
            'nom.required' => 'Veuillez entrer le nom ',
           'photo.required' => 'Veuillez  mettre une photo',
            //'adresse.required' => 'Veuillez entrer votre addresse',
      
          ];

       


        $category = new Category();
        $category->nom = $this->nom;
        $category->description = $this->description;
        $category->site_url = $this->site_url;
          $category->link = $this->link ?? false;
           $this->top = $category->top ?? 0;
           

        
// Vérification de la présence des fichiers
    if (!is_null($this->photo)) {
        $category->photo = $this->photo->store('categories', 'public');
    }

    if (!is_null($this->couverture)) {
        $category->couverture = $this->couverture->store('categories', 'public');
    }
      //  $category->photo = $this->photo->store('categories', 'public');
       // $category->couverture = $this->couverture->store('categories', 'public');
      /*   if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('categories', 'public');
            }
            $category->photos = json_encode($photosPaths);
        } */
        $category->save();

        //reset input
        $this->resetInput();
       // $this->resetInputFields();


        //flash message
        session()->flash('success', 'category ajoutée avec succès');
    }




    public function update_category(){
        if($this->category){
            $this->validate([
                'nom' => 'required|string',
                'description' => 'required|string',
                'photo' => 'sometimes|nullable|file|mimetypes:image/*',
                'couverture' => 'sometimes|nullable|file|mimetypes:image/*',
              
               // 'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
               
            ]);



            $this->category->nom = $this->nom;
            $this->category->description = $this->description;
            $this->category->site_url= $this->site_url;

            if($this->photo){
                
                if ($this->category->photo) {
                    Storage::disk('public')->delete($this->category->photo);
                }
                $this->category->photo = $this->photo->store('categories', 'public');
            }
     if($this->couverture){
                
                if ($this->category->couverture) {
                    Storage::disk('public')->delete($this->category->couverture);
                }
                $this->category->couverture = $this->couverture->store('categories', 'public');
            }


     
            $this->category->save();
    
  
            $this->resetInput();
    
            return redirect()->route('categories')->with('success',"category modifié avec succès");



        }
    }










    public function resetInput()
    {
        $this->nom = '';
        $this->description = '';
        $this->photo = '';
    }
}
