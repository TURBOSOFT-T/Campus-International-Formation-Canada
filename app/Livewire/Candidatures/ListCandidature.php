<?php

namespace App\Livewire\Candidatures;

use App\Models\Candidature;
use Livewire\Component;

class ListCandidature extends Component
{

     public $selectedCommandes = [];
    public $date, $statut, $key, $gouvernoratsTunisie, $gouvernorat, $statut2;


     public function delete($id)
    {
        $commande = Candidature::find($id);
        if ($commande) {
            $commande->delete();

            //flash message
            session()->flash('success', 'Candidature supprimée avec succès');
        }
        return view('livewire.candidatures.list-candidature');
    }
    public function render()
    {

        
        $candidaturessQuery = Candidature::query();
       
       
        if (strlen($this->statut) > 0) {
            $candidaturessQuery->where('statut', $this->statut);
        }
        if (strlen($this->statut2) > 0) {
            if ($this->statut2 == "confirmer") {
                $candidaturessQuery->where('etat', "confirmé");
            } else {
                $candidaturessQuery->where('etat', "annulé");
            }
        }
        if (strlen($this->key) > 0) {
            $candidaturessQuery->where('nom', 'like', '%' . $this->key . '%')
                
                ->orWhere('phone', 'like', '%' . $this->key . '%')
                
                ->orWhere('prenom', 'like', '%' . $this->key . '%');
        }
        $candidatures = $candidaturessQuery->Orderby('id', "Desc")->paginate(80);
        $total = Candidature::count();
        return view('livewire.candidatures.list-candidature', compact('total','candidatures') );
    }
}
