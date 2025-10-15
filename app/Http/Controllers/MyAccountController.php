<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\config;
use App\Models\historiques_connexion;
use App\Models\{produits, Category, Comment, favoris as ModelsFavoris, Inscription, Online_classe};
use App\Models\User;
use App\Models\views;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Http\Traits\ListGouvernorats;
use App\Models\clients;
use App\Models\contenu_commande;
use App\Models\domaines;
use App\Models\notifications;
use App\Models\templates;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\{OrderChangeStatuts, ChangeStatut};
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\File;

class MyAccountController extends Controller
{
    use ListGouvernorats;




     public function comptes(){

        $commandes= commandes::where('user_id', auth()->id() )->get();
        return view('front.comptes.commandes' , compact('commandes'));
     }

     
public function profile(){
    return view('front.comptes.profile');
}


public function avatar(Request $request)
{
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $user = Auth::user();
    if ($user->avatar) {
        $oldAvatarPath = public_path('public/avatars/') . '/' . $user->avatar;
        if (File::exists($oldAvatarPath)) {
            File::delete($oldAvatarPath);
        }
    }

    $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();

    $request->avatar->move(public_path('public/avatars/'), $avatarName);

    Auth()->user()->update(['avatar' => $avatarName]);

    return back()->with('success', 'Avatar updated successfully.');
}


public function account(){

    $user = Auth::user();

    $inscriptions2 = Inscription::where('user_id', $user->id)
    ->with('event', 'formation')  // Charger l'événement et la formation
    ->paginate(10);;
   
    $inscriptions = $user->inscriptions()->with('event', 'formation')
    
    ->paginate(10);;

   
 $onlineClasses = Online_classe::whereIn('event_id', $inscriptions->pluck('event_id')->toArray())
                                  ->orWhereIn('formation_id', $inscriptions->pluck('formation_id')->toArray())
                                  ->with(['events', 'formations'])
                                  ->paginate(10);
  
                                  $totalZoomMeetings = $onlineClasses->count();
    $totalInscription = Inscription::where('user_id', auth()->id())
    ->WhereIn('statut',[ 'livrée', 'payée'])
    ->count();
    $totalcomments = Comment::where('user_id', auth()->id())->count();
   // $comments = Comment::where('user_id', auth()->id())->latest()->paginate(10);
    $comments = $user->comments()->with('blog')->whereNotNull('blog_id')->paginate(10);;
    $commentaires = Comment::whereHas('blog', function ($query) {
        $query->where('user_id', auth()->id());
    })->get();
    
  
    $inscriptionsEnCours = Inscription::where('user_id', auth()->id())
    ->whereIn('statut', ['attente' ,'traitement', 'En cours livraison','planification'])
    ->count();

    

    return view('front.comptes.account', compact('totalZoomMeetings', 'totalInscription','totalcomments','inscriptionsEnCours', 'comments', 'inscriptions', 'onlineClasses'));

}



public function delecomment($id)
{
    $comment = Comment::findOrFail($id);
    $comment->delete();

  
 return response()->json(['success' => true, 'message' => 'Commentaire supprimé avec succès.']);

}




}
