<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{Blog, Category, config, Event, Formation, Offre, Service, Testimonial, Video};

class HomeComposer
{

  public function compose(View $view)
  {
    $view->with([
      'categories' => Category::has('sponsors')->take(6)->get(),
      'catblogs' => Category::has('blogs')->get(),
       'catoffres' => Category::has('offres')->get(),
    //  'catServices' => Category::has('services')->get(),
    'catServices' => Category::where('top', 1)->has('services')->get(),
      'catevents' => Category::has('events')->get(),
      'blogs' => Blog::select('*')->latest()->take(6)->get(), /// Pour le home page
       'offres' => Offre::select('*')->latest()->take(6)->get(), /// Pour le home page
      'events' => Event::select('*')->latest()->take(4)->get(),
      'services' => Service::select('*')->latest()->take(6)->get(),
      'videos ' => Video::select('*')->latest()->take(10)->get(),
      'formations' => Formation::select('*')->latest()->take(6)->get(),
      'enventfooter' => Event::select('*')->latest()->take(2)->get(),
      'testimonials' => Testimonial::orderBy('created_at', 'desc')
        ->where('active', '1')
        ->limit(100)->get(),
      'configs' => config::all(),
      'config' => config::all(),

    ]);
  }
}
