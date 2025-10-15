<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\config;
use App\Models\historiques_connexion;
use App\Models\{Blog, Candidature, produits, Category, Comment as ModelsComment, Marque, Contact, favoris, Formation, Inscription, Offre, Online_classe, Service, Testimonial};
use App\Models\User;
use App\Models\views;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use App\Http\Traits\ListGouvernorats;
use App\Models\clients;
use App\Models\contenu_commande;
use App\Models\domaines;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Image;
use App\Models\Video;
use App\Models\notifications;
use App\Models\templates;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\{OrderChangeStatut, ChangeStatut};
use Dom\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use App\Http\Traits\MeetingZoomTrait;

class AdminController extends Controller
{
    use ListGouvernorats;
    use MeetingZoomTrait;

 

     public function admin_contact_form(){
        $contacts = Contact::paginate(100);
        return view('admin.contacts.list', compact('contacts'));
     }

     public function supprimer_messages(Request $request , $id){
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Message supprimé avec succès');;

     }

    public function dashboard(Request $request)
    {

        if (auth()->user()->can('dashboard')) {
            // accès OK
        } else {
            $routes = [
                'product_view' => 'produits',
                'sponsor_view' => 'sponsors',
                'event_view' => 'events',
                'video_view' => 'videos',
                'order_view' => 'commandes',
                'clients_view' => 'clients',
                'contact_view' => 'contacts',
                'service_view' => 'services',
            ];
        
            foreach ($routes as $permission => $route) {
                if (auth()->user()->can($permission)) {
                    return redirect()->route($route);
                }
            }
        
            return redirect('/')->with('error', "Vous n'avez pas la permission d'accéder à cette page.");
        }
        

    

        $currentYear = date('Y');

        $currentYear2 = Carbon::now()->year;


        // Format ISO 8601 (YYYY-MM-DD)
        $firstDayOfYearISO = Carbon::createFromDate($currentYear2, 1, 1)->startOfDay()->format('Y-m-d');
        $lastDayOfYearISO = Carbon::createFromDate($currentYear2, 12, 31)->endOfDay()->format('Y-m-d');



        $date_debut = $request->input('date_debut') ??  $firstDayOfYearISO;
        $date_fin = $request->input('date_fin') ?? $lastDayOfYearISO;


        //get statistiques
        $visitsPerMonth = [];
        $videosPerMonth = [];

       
        $inscriptionMonth = [];
       
        for ($i = 1; $i <= 12; $i++) {
            $visitsPerMonth[] = Views::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)
                ->count();
            $videosPerMonth[] = Video::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)->count();

            $inscriptionMonth[] = User::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $i)
                ->count();
          
        }

        $topUsers = User::withCount('videos')
        ->orderBy('videos_count', 'desc')
        ->take(5) // Limiter aux 10 meilleurs utilisateurs
        ->get();


        $total_visites = views::whereBetween('created_at', [$date_debut, $date_fin])->count();
       
        
        $totalUser = User::whereBetween('created_at', [$date_debut, $date_fin])->count();
        $totalVideos = Video::count();
        $totalFormations = Formation::count();
        $totalactualites = Blog::count();
        $latestVideos = Video::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

             $latestImages = Image::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            $lastevents = Blog::latest()->take(5)->get();
            $lastevent = Event::latest()->take(1)->get();
            $lastblog =Blog::latest()->take(1)->get();
            $latestVideo = Video::orderBy('created_at', 'desc')->first();
         


            $videosVues = Online_classe::count();
           
        $totalEvents = Event::count();
        $totalSponsors = Sponsor::count();
         $totalOffres = Offre::count();
         $totalCandidatures = Candidature::count();


           return view('admin.index' , compact('totalCandidatures','totalOffres','latestImages','lastblog','totalactualites','totalFormations','lastevents','lastevent','latestVideo','videosVues','latestVideos','total_visites', 'inscriptionMonth','totalUser','videosPerMonth','topUsers','totalVideos','totalEvents','totalSponsors'));
    }



    public function update_config(Request $request)
    {
        $send_mail_update_commande = $request->input('send_mail_update_commande') ? 1 : 0;
        $config = config::first();
        $config->send_mail_update_commande = $send_mail_update_commande;
        $config->save();

        return redirect()
            ->route('commandes')
            ->with('success', 'Configuration mise à jour avec succès');
    }




    public function export_clients()
    {
        $users = clients::select('nom', 'phone', 'adresse', 'pays', 'gouvernorat')
            ->get();
        return Excel::download(new ExportUser($users), 'users.xlsx');
    }



    public function live_notifications()
    {
        $total = notifications::where("statut", "unread")->count();
        return response()->json(
            [
                'total' => $total
            ]
        );
    }
//////////Categories/////////////
public function category_add()
{
    return view('admin.categories.add');
}

public function categories()
{
    return view('admin.categories.list');
}

public function categories_update($id)
{
    $category = Category::find($id);
    if (!$category) {
        $message = "Category non disponible !";
        abort(404, $message);
    }
    return view('admin.categories.update', compact('category'));
}

//////////////Les meetings//////////////

public function webinaire_add()
{
     $formations = Formation::all();
      $events = Event::all();
    return view('admin.webinaires.add', compact('formations','events'));
}

public function store(Request $request)
{
    $request->validate([
        'type' => 'required|in:formation,event',
        'topic' => 'required|string',
        'start_at' => 'required|date',
        'formation_id' => 'nullable|exists:formations,id',
        'event_id' => 'nullable|exists:events,id',
    ]);

    $meeting = $this->createMeeting($request);

    $onlineClass = new Online_classe();
    $onlineClass->user_id = auth()->id();
    $onlineClass->meeting_id = $meeting->id;
    $onlineClass->topic = $request->topic;
    $onlineClass->start_at = $request->start_at;
    $onlineClass->duration = $meeting->duration;
    $onlineClass->password = $meeting->password;
    $onlineClass->start_url = $meeting->start_url;
    $onlineClass->join_url = $meeting->join_url;

    // Définir le type
    if ($request->type === 'formation') {
        $onlineClass->formation_id = $request->formation_id;
        $onlineClass->event_id = null;
    } else {
        $onlineClass->event_id = $request->event_id;
        $onlineClass->formation_id = null;
    }

    $onlineClass->save();

    // Envoi des mails (optionnel)
    $users = User::all();
    $details = [
        'topic' => $request->topic,
        'join_url' => $meeting->join_url,
        'duration' => $meeting->duration,
    ];

    foreach ($users as $user) {
        // Notification::send($user, new SendEmailZoom($details));
    }

    return back()->with('ok', __('The class has been successfully created.'));
}


public function webinaires()
{
    return view('admin.webinaires.list');
}





//////////Services///////////////////////
public function service_add()
{
    return view('admin.services.add');
}

public function services()
{
    return view('admin.services.list');
}

public function services_update($id)
{
    $service = Service::find($id);
    if (!$service) {
        $message = "Service non disponible !";
        abort(404, $message);
    }
    return view('admin.services.update', compact('service'));
}


//////////Blogs////////////////////////////

public function blog_add()
{
    return view('admin.blogs.add');
}

public function blogs()
{
    return view('admin.blogs.list');
}

public function blogs_update($id)
{
    $blog = Blog::find($id);
    if (!$blog) {
        $message = "Blog non disponible !";
        abort(404, $message);
    }
    return view('admin.blogs.update', compact('blog'));
}

//////////Blogs////////////////////////////

public function offre_add()
{
    return view('admin.offres.add');
}

public function offres()
{
    return view('admin.offres.list');
}

public function offres_update($id)
{
    $offre = Offre::find($id);
    if (!$offre) {
        $message = "Offre non disponible !";
        abort(404, $message);
    }
    return view('admin.offres.update', compact('offre'));
}

public function candidatures(){

    return view('admin.offres.candidatures');
}


/////////////Formations////////////

public function formations()
{
    // Retrieve all formations from the database
    $formations = Formation::all();

    // Pass the formations to the view for rendering
    return view('admin.formations.list', compact('formations'));
   // return view('admin.formations.list');
}
public function inscriptions(){
  //  $inscriptions = Inscription::all();
    $inscriptions = Inscription::with(['country', 'state', 'city', 'formation'])
        ->where('type', 'Formation')
        ->get();
    return view('admin.formations.list-inscriptions' , compact('inscriptions'));
}


//////////////////////events//////////////

public function events()
{
    $events = Event::all();
    return view('admin.evenements.list', compact('events') );
}

public function inscriptions_evenements(){
   // $inscriptions = Inscription::all();
  $inscriptions = Inscription::with(['country', 'state', 'city', 'event'])
                    ->where('type', 'Event')
                    ->get();
    return view('admin.evenements.list-inscriptions' , compact('inscriptions'));
}


/////////////////sponsor//////////////

public function sponsors()
{

    $sponsors = Sponsor::all();
    return view('admin.sponsors.list' , compact('sponsors') );
}
///////////////Testimonials////////////

public function testimonials()
{
    $testimonials = Testimonial::paginate(10);
    return view('admin.testimonials.list', compact('testimonials') );
}

//////////////////Comments//////////////
public function comment()
{
    $comments = ModelsComment::paginate(10);

    return view('admin.comments.list', compact('comments') );
}

///////////////////////Images////////////

public function images()
{
    $images = Image::all();
    return view('admin.images.list', compact('images') );
}

////////////////////////videos////////////

public function videos()
{
    $videos = Video::all();
    return view('admin.videos.list', compact('videos') );
}

public function sponsor_add()
{
    return view('admin.sponsors.add');
}

public function sponsor_update($id){

    $sponsor = Sponsor::find($id);
    if (!$sponsor) {
        $message = "Sponsor non disponible !";
        abort(404, $message);
    } 
    
    return view('admin.sponsors.update', compact('sponsor'));
}








    public function parametres()
    {
        $connexions = historiques_connexion::Orderby("id", "Desc")
            ->where('user_id', Auth::id())
            ->get();

        $ipAddress = request()->ip();
        return view('admin.parametres.index', compact('connexions'));
    }


    public function personnels()
    {
        $personnels = User::where('role', 'personnel')->get();
      // $personnels = User::all();
        return view('admin.personnels.list', compact('personnels'));
    }


 




    public function clients()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.clients.list', compact('clients'));
    }



    public function contact_admin()
    {
        return view('admin.parametres.contact');
    }

    public function delete_personnel($id)
    {
        $user = User::where("id", '=', $id)->first();
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Personnel supprimé avec succès!');
        }
    }


    public function update_permission(Request $request)
    {

        $selectedPermissions = $request->input('permissions', []);
        $user = User::findOrFail($request->input('id'));
        $user->syncPermissions($selectedPermissions);
        return redirect()
            ->back()
            ->with('success', 'Permissions mises à jour avec succès.');
    }
}
