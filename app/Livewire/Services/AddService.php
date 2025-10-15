<?php

namespace App\Livewire\Services;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddService extends Component
{
    use WithFileUploads;
    public $nom, $image, $service, $description, $OldPhoto , $meta_description, $category_id;

    public function mount($service)
    {
        if ($service) {
            $this->service = $service;
            $this->nom = $service->nom;
              $this->category_id = $service->category_id;
            $this->description = $service->description;
            $this->meta_description = $service->meta_description;
            $this->OldPhoto = $service->image;
       ///  $this->categories = $service->categories->pluck('id')->toArray();
        }
    }

    private function resetInputFields()
    {
        $this->nom = '';
        $this->description = '';
        $this->meta_description ='';
    }



    public function render()
    {
         $categories = Category::all();
      //   dd($categories);
        return view('livewire.services.add-service', compact('categories'));
    }






    //validation
    public function create()
    {
   $data=     $this->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|Max:5000000',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'category_id' => 'required|exists:categories,id',
        
        ], [
            'nom.required' => 'Le nom est obligatoire',
            'description.required' => 'La description est obligatoire',
            'image.required' => 'L\'image est obligatoire',
            'image.image' => 'L\'image doit être une image',
            'image.mimes' => 'L\'image doit être au format jpg,jpeg,png,webp',
            'image.max' => 'L\'image ne doit pas dépasser 4024 ko',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'description.max' => 'La description ne doit pas dépasser 5000 caractères',
        ]);

$categories = Category::findOrFail($data[('category_id')]);

        $service = new Service();
        $service->nom = $this->nom;
        $service->meta_description = $this->meta_description;
        $service->description = $this->description;
        $service->category_id = $this->category_id;
        $service->image = $this->image->store('services', 'public');
    
        $categories-> services()->save($service);
        $this->resetInput();
        session()->flash('success', 'Service ajoutée avec succès');
    }


    public function update_service()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string|Max:5000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ], [
            'nom.required' => 'Le nom est obligatoire',
            'description.required' => 'La description est obligatoire',
            'image.required' => 'L\'image est obligatoire',
            'image.image' => 'L\'image doit être une image',
            'image.mimes' => 'L\'image doit être au format jpg,jpeg,png,webp',
            'image.max' => 'L\'image ne doit pas dépasser 4024 ko',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères',
            'description.max' => 'La description ne doit pas dépasser 5000 caractères',
        ]);

        if ($this->service) {
            $this->service->nom = $this->nom;
            $this->service->description = $this->description;
            $this->service->meta_description = $this->meta_description;
            if ($this->image) {
                //delete old photo
                if ($this->service->image) {
                    Storage::disk('public')->delete($this->service->image);
                }
                $this->service->image = $this->image->store('services', 'public');
            }
            $this->service->save();
            session()->flash('success', "Service modifié avec succès");
        }
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->description = '';
        $this->image = '';
    }
}
