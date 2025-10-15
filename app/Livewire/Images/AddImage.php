<?php

namespace App\Livewire\Images;

use App\Models\Category;
use Livewire\Component;
use App\Models\Image;
use App\Models\Service;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AddImage extends Component
{


    use WithFileUploads;


    public $titre, $description, $email,  $image, $image2, $img, $category_id, $service_id;
    public $updateMode = false;
    public $services = array();

    public function mount($img)
    {
        if ($img) {
            $this->img = $img = $img;
            $this->titre = $img->titre;


            $this->image2 = $img->image;
            $this->services = Service::where('category_id', $this->category_id)->get();
        }
    }

    public function loadServices()
    {
        $this->service_id = null;
        $this->services = Service::where('category_id', $this->category_id)->get();
    }
    

    private function resetInputFields()
    {
        $this->titre = '';


        $this->image = '';
        $this->image2 = '';
    }




    public function save()
    {
        $data =  $this->validate([
            'titre' => 'required|string',


            'image' => 'sometimes|required|file|mimetypes:image/*',
            'category_id' => 'nullable|integer|exists:categories,id',
            'service_id' => 'nullable|integer|exists:services,id',



        ]);;
        [
            'titre.required' => 'Le titre',




        ];
        $categories = Category::findOrFail($data[('category_id')]);
        $services = Service::findOrFail($data[('service_id')]);


        $img = new Image();

        $img->titre = $this->titre;
        $img->service_id = $this->service_id;
        $img->category_id = $this->category_id;


        //  if($this->image){
        $img->image = $this->image->store('images', 'public');
        //  }


        $img->save();

        $this->resetInputFields();

        session()->flash('success', 'img$img ajouté avec succès');

        return redirect()->back()->with('success', 'Image ajoutée avec succès !');
    }

    public function render()
    {
        $categories = Category::all();
        $services = Service::all();
        return view('livewire.images.add-image', compact('categories', 'services'));
    }
}
