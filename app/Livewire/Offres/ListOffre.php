<?php

namespace App\Livewire\Offres;

use App\Models\Offre;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class ListOffre extends Component
{

     use WithPagination;
    public $key, $image;
    public function render()
    {
         $Query = Offre::query();
        if(!is_null($this->key)){
            $Query->where('title', 'like', '%'.$this->key.'%');
        }
    $offres = $Query->paginate(30);
        $total = Offre::count();
     
        return view('livewire.offres.list-offre', compact('offres','total'));
    }
public function delete($id)
{
    $offre = Offre::findOrFail($id);

    
    if ($offre->image) {
        Storage::disk('public')->delete($offre->image);
    }

  
    $offre->delete();

    return redirect()->route('offres')->with('succes', "Offre supprimée avec succès");
}
    
     public function filtrer()
    {
        //reset page
        $this->resetPage();
    }
}
