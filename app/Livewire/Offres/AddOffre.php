<?php

namespace App\Livewire\Offres;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Offre;

class AddOffre extends Component
{


     use WithFileUploads;

    public $nom,$slug, $seo_title, $category_id,$image, $images,  $image2, $images2, $offres,$offre, $description,$reference ;

    public $free, $body, $excerpt, $meta_description, $meta_keywords, $active ,$user_id;


    public function mount($offre)
    {
        if ($offre) {
            $this->offre = $offre;
            $this->nom = $offre->nom;
           
            $this->category_id = $offre->category_id;
     
            $this->image2 = $offre->image;
            $this->images2 = $offre->images;
            $this->description = $offre->description;
          
            $this->excerpt =$offre->excerpt;
            $this->meta_description =$offre->meta_description;
            $this->meta_keywords =$offre->meta_keywords;

        

        }
    }


    public function create()
    {
        $data =  $this->validate([
            'nom' => 'required|string',
            'description' => 'required|string|max:5000060',
      
           'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
         
            'category_id' => 'required|integer|exists:categories,id',
            
          
       
        ]);
        ;[
           
            'nom.required' => 'Veuillez entrer votre nom',
          
           
      
          ];


        $categories = Category::findOrFail($data[('category_id')]);
     

        $offres = new Offre();
        $offres->nom = $this->nom;

    
                $offres->description = $this->description;
                $offres->meta_description = $this->meta_description;
   
    $offres->user_id = auth()->id();
       

        $offres->category_id = $this->category_id;
    


        $offres->image = $this->image->store('offres', 'public');
      

        $categories->offres()->save($offres);

        //reset input
        $this->reset();

        //flash message
        session()->flash('success', 'Offre ajoutée avec succès');
    }


    public function update_offres()
    {
        if ($this->offre) {
            $this->validate([
                'nom' => 'required|string',
            'description' => 'required|string|max:5000060',
      
            'category_id' => 'required|integer|exists:categories,id',
            
          
       
        ]);
        ;[
            'nom.required' => 'Veuillez entrer votre nom',
          
           
      
          ];



            $this->offre->nom = $this->nom;
            $this->offre->description = $this->description;
            $this->offre->meta_description = $this->meta_description;
        
          
            $this->offre->category_id = $this->category_id;
           $this->offre->user_id = auth()->id();
        

            if ($this->image) {
                //delete old image
                if ($this->offre->image) {
                    Storage::disk('public')->delete($this->offre->image);
                }
                $this->offre->image = $this->image->store('offres', 'public');
            }

            $this->offre->save();


            $this->resetInput();

            return redirect()->route('offres')->with('succes', "Offre modifiée avec succès");
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.offres.add-offre', compact('categories'));
    }

     public function resetInput()
    {
        $this->nom = '';
       
      
    }

}
