<?php

namespace App\Livewire\Services;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

class UpdateService extends Component
{

    use WithFileUploads;
    public $nom,$description,$photo,$service,$category_id;

    public function mount($service){
        $this->service = $service;
        $this->nom = $this->service->nom;
         $this->category_id = $service->category_id;
        $this->description = $this->service->description;
    }

    public function update(){
    $data=    $this->validate([
            'nom' =>'required|string|max:200',
            'description' =>'required|string|max:5000',
            'photo' =>'nullable|image|mimes:jpg,jpeg,png,webp',
             'category_id' => 'required|integer|exists:categories,id',
        ]);

$categories = Category::findOrFail($data[('category_id')]);

        $this->service->nom = $this->nom;
        $this->service->description = $this->description;
        if($this->photo){
            Storage::disk('public', 'services')->delete($this->service->image); 
            $this->service->image = $this->photo->store('services', "public");
        }
       // $this->service->save();
        $categories->services()->save($this->service);



        return redirect('/admin/services')->with('success', "Marque modifié !");
    }
    public function render()
    {
         $categories = Category::all();
        return view('livewire.services.update-service', compact('categories'));
    }
}
