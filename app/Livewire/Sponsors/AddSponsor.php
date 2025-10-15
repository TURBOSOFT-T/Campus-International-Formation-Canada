<?php

namespace App\Livewire\Sponsors;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Sponsor;



class AddSponsor extends Component
{
    
    use WithFileUploads;

    public $titre,$category_id, $description,$meta_description, $email, $telephone, $image , $image2,$adresse, $sponsor;
    public $updateMode = false;
    protected $listeners = ['sponsorAdded' => 'render'];
    public $category_ids = [];


    public function mount($sponsor){
        if($sponsor){
            $this->sponsor = $sponsor;
            $this->titre = $sponsor->titre;
             $this->category_id = $sponsor->category_id;
            $this->description = $sponsor->description;
              $this->meta_description = $sponsor->meta_description;

            $this->email = $sponsor->email;
            $this->telephone = $sponsor->telephone;
            $this->image = $sponsor->image;
            $this->image2 = $sponsor->image;
            $this->adresse = $sponsor->adresse;

          
        }
    }

    
private function resetInputFields(){
    $this->titre= '';
    $this->description = '';
    $this->email = '';
    $this->telephone = '';
    $this->image = '';
    $this->image2 = '';
    $this->adresse = '';

}

   

    
public function create()
{
    $data =  $this->validate([
        'titre' => 'required|string',
       'description' => 'required|string|max:260',
         'email' => 'required|email|unique:sponsors,email',
        'telephone' => 'required|numeric',
        'adresse' => 'nullable|string|max:260',
        //  'category_id' => 'required|integer|exists:categories,id',
          'category_ids' => 'required|array',
    'category_ids.*' => 'exists:categories,id',
        
        //  'image' => 'required|image|mimes:jpg,jpeg,png,webp',
       // 'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
      //  'image' => 'required|image|mimes:jpg,jpeg,png,webp',
       // 'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
     
    ]);
    ;[
        'titre.required' => 'Le titre',
        'description.required' => 'Veuillez entrer votre description',
        'email.required' => 'Veuillez entrer votre email',
        'email.email' => 'Veuillez entrer une adresse email valide',
        'email.unique' => 'Cet email est déjà utilisé',
        'telephone.required' => 'Veuillez entrer votre numéro de téléphone',
        'telephone.numeric' => 'Veuillez entrer un numéro de téléphone valide',
        'adresse.max' => 'L\'adresse ne doit pas dépasser 260 caractères',
        //  'image.required' => 'Veuillez choisir une image',
        //  'photos.*.required' => 'Veuillez choisir une image',
        //  'photos.*.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        
       // 'image.mimes' => 'Veuillez choisir une image de type jpg,jpeg,png,webp',
        
  
      ];

      //  $categories = Category::findOrFail($data[('category_id')]);
      $sponsor = new Sponsor();
     
      $sponsor->titre = $this->titre;
      $sponsor->description = $this->description;
    //   $sponsor->category_id = $this->category_id;
      $sponsor->email = $this->email;
      $sponsor->telephone = $this->telephone;
      $sponsor->adresse = $this->adresse;
      //  if($this->image){
          $sponsor->image = $this->image->store('sponsors', 'public');
      //  }

      
      $sponsor->save();
      $sponsor->categories()->attach($this->category_ids);

      //  $categories->services()->save($sponsor);
    /*   $this->resetInputFields(); */

    session()->flash('success', 'Sponsor ajouté avec succès');
    // reset input
   // $this->reset();
  

     //dispach event
     $this->dispatch('sponsorAdded');

   //  $this->emit('sponsorAdded');
  
}



public function delete($id)
    {
        $sponsor = Sponsor::find($id);

        if ($sponsor) {
            $sponsor->delete();
            session()->flash('message', 'Sponsor supprimé avec succès.');
        } else {
            session()->flash('error', 'Sponsor non trouvé.');
        }
    }


public function render()
{
     $categories = Category::all();
    return view('livewire.sponsors.add-sponsor',  compact('categories'));
}


}
