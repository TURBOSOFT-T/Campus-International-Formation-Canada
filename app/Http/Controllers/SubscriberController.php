<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;

use App\Providers\RouteServiceProvider;
use App\Http\Requests\Front\ContactRequest;
use App\Models\Contact;
use App\Models\Newsletter as ModelsNewsletter;
use App\Models\Subscriber;
use Auth;
use Session;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewsletterSubscribed;
use Illuminate\Support\Str;
use App\Notifications\NewsletterNotification;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

  



    public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscribers,email',
    ]);

    Subscriber::create(['email' => $request->email]);

   
   return response()->json(['message' => 'Merci pour votre abonnement à la newsletter !']);

}

    
        // Désinscription de la newsletter
        public function unsubscribe($email)
        {
            // Rechercher et supprimer l'abonné
            $subscriber = Subscriber::where('email', $email)->first();
    
            if ($subscriber) {
                $subscriber->delete();
                return redirect('/')->with('success', 'You have been unsubscribed from our newsletter.');
            }
    
            return redirect('/')->with('error', 'Email not found.');
        }
}
