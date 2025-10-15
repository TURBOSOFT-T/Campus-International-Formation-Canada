<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Models\Contenu_candidature;
use App\Models\notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class CandidatureController extends Controller
{


      public function confirmPost(Request $request)
  {
    $request->validate([

      'nom' => ['nullable', 'string', 'max:255'],
      'prenom' => ['nullable', 'string', 'max:255'],
      'email' => 'required',
       'file' => 'nullable|file|mimes:pdf,doc,docx|max:20048',
      //  'adresse' => 'required',
     
        'phone' => 'required',
    // 'frais' => 'required',

    ]
    , [
    'file.max'   => 'Le fichier ne doit pas dépasser 5 Mo',
    'file.mimes' => 'Le CV doit être en PDF, DOC ou DOCX',
]
  
  ); 


    $connecte = Auth::user();
  



if($connecte){

  $post = new Candidature([

    'user_id' => auth()->user()->id,
     'nom' => $request->input('nom'),
     'prenom' => $request->input('prenom'),
     'email' => $request->input('email'),
    
     'phone' => $request->input('phone'),
   
     'note' => $request->input('note'),
     

   ]);[
     'email.required' => 'Veuillez entrer votre email',
     'nom.required' => 'Veuillez entrer votre nom',
    
   ];
} else{

  $post = new Candidature([

  ///  'user_id' => auth()->user()->id,
     'nom' => $request->input('nom'),
     'prenom' => $request->input('prenom'),
     'email' => $request->input('email'),
    
     'phone' => $request->input('phone'),
    
     'note' => $request->input('note'),
    
   ]);[
     'email.required' => 'Veuillez entrer votre email',
     'nom.required' => 'Veuillez entrer votre nom',
     'phone.required' => 'Veuillez entrer votre numéro de téléphone',
   
   ];
}

 // ✅ Gestion de l'upload
   if ($request->hasFile('file')) {
        $path = $request->file('file')->store('documents', 'public');
        $post->file = $path; // On stocke le chemin complet
    }
  

    $post->save();

   $user = new User([
     
    'nom' => $request->input('nom'),
    'prenom' => $request->input('prenom'),
    'email' => $request->input('email'),
    'password' => Hash::make($request->input('phone')),
   
    'phone' => $request->input('phone'),
  ]);



  $existingUsersWithEmail = User::where('email', $request['email'])->exists();

  if (!$existingUsersWithEmail) {
   
   // Mail::to($user->email)->send(new FirstOrder($user));
   //$this->sendOrderConfirmationMail($order);
 
    $user->save();
}
 

    


      

    //envoyer les emails
    //  $this->sendOrderConfirmationMail($order);
     
  
    //generate notification
    $notification = new notifications();
   // $notification->url = "admin/commande" . $order->id;
 //  $notification->url = route('details_commande', ['id' => $order->id]);
    $notification->titre = "Nouvelle candidature.";
   $notification->message = "Passée par " . $post->nom;
    $notification->type = "commande";
    $notification->save();
   

    return redirect()->route('thank-yous');
  }

 
public function index(Request $request)
  {

    return view('front.candidatures.thankyou');
  }


}
