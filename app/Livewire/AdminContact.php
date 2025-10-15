<?php

namespace App\Livewire;

use App\Models\config;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Validator;

class AdminContact extends Component
{
    use WithFileUploads;
    public $logo, $icon, $logo2, $icon2, $logoHeader, $telephone,$telephone1, $addresse, $email, $description, $fax, $logocontact, $logocontact2, $photos, $photos2, $titre_apropos, $des_apropos,
        $facebook, $messenger, $twitter, $instagram, $youtube, $linkedin, $tiktok, $coach, $seance, $adherent, $tounoir;
    public $imagecontact, $imagecontact2, $imageevent2, $imageformation2, $imageformation, $imageevent,$imageoffre,$imageoffre2, $imageblog, $imageblog2, $imageenteteabout, $imageenteteabout2;

    public   $image_apropos, $image_apropo2, $image1_apropos, $image1_apropos2, $texte, $texte2, $texte3, $texte1,
        $titre_apropos1, $des_apropos1, $image_apropos1, $image_apropos12, $image1_apropos1, $image1_apropos12, $image2_apropos1, $image2_apropos12,
        $image3_apropos1, $image3_apropos12, $explication, $explication1, $explication2, $explication3, $explication4, $explication5, $explication6,
        $titre_apropos2, $des_apropos2, $image_apropos2, $image_apropos22;
    public $slogan_apropos, $slogan1_apropos;

    public $image1_home, $image1_home2, $image2_home, $image3_home, $image3_home2, $image4_home, $image4_home2, $image2_home2, $titre_home, $sous_titre_home, $des_home,
        $note, $note1, $note2, $note3, $note4, $note5, $note6;

    public $biographie, $localisation;

    public $question,  $question1, $question2,    $reponse, $reponse1, $reponse2;
    public $experience, $client, $pourcentage, $sponsor, $projet;


    public function mount()
    {
        $config = config::first()  ?? new Config;;
        // $this->config = Config::first() ?? new Config;
        $this->logo2 = $config->logo;
        $this->photos2 = $config->photos;
        $this->icon2 = $config->icon;

        $this->experience = $config->experience;
        $this->client = $config->client;
        $this->pourcentage = $config->pourcetage;
        $this->sponsor = $config->sponsor;
        $this->projet = $config->projet;
        $this->titre_apropos = $config->titre_apropos;
        $this->texte = $config->texte;
        $this->texte1 = $config->texte1;
        $this->texte2 = $config->texte2;
        $this->texte3 = $config->texte3;
        $this->note = $config->note;
        $this->note1 = $config->note1;
        $this->note2 = $config->note2;
        $this->note3 = $config->note3;
        $this->note4 = $config->note4;
        $this->note5 = $config->note5;
/* 
        $this->explication = $config->explication;
        $this->explication1 = $config->explication1;
        $this->explication2 = $config->explication2;
        $this->explication3 = $config->explication3;
        $this->explication4 = $config->explication4;
        $this->explication5 = $config->explication5; */
        $this->des_apropos = $config->des_apropos;
        $this->imagecontact2 = $config->imagecontact;
        $this->imageevent2 = $config->imageevent;
        $this->imageformation2 = $config->imageformation;
        $this->imageblog2 = $config->imageblog;
                $this->imageoffre2 = $config->imageoffre;
        $this->imageenteteabout2 = $config->imageenteteabout;
        $this->image1_home2 = $config->image1_home;
        $this->image2_home2 = $config->image2_home;
        $this->image3_home2 = $config->image3_home;
        $this->image4_home2 = $config->image4_home;

        $this->question = $config->question;
        $this->question1 = $config->question1;
        $this->question2 = $config->question2;
        $this->reponse = $config->reponse;
        $this->reponse1 = $config->reponse1;
        $this->reponse2 = $config->reponse2;
        $this->titre_home = $config->titre_home;
        $this->sous_titre_home = $config->sous_titre_home;
        $this->des_home = $config->des_home;



        $this->image_apropo2 = $config->image_apropos;
        $this->image1_apropos2 = $config->image1_apropos;
        $this->image_apropos12 = $config->image_apropos1;
        $this->image1_apropos12 = $config->image1_apropos1;
        $this->image2_apropos12 = $config->image2_apropos1;
        $this->image3_apropos12 = $config->image3_apropos1;
        $this->image_apropos22 = $config->image_apropos2;
        $this->titre_apropos2 = $config->titre_apropos2;

        $this->slogan_apropos = $config->slogan_apropos;
        $this->slogan1_apropos = $config->slogan1_apropos;


        //$this->logocontact= $config->logocontact;
        $this->logocontact2 = $config->logocontact;
        $this->logoHeader = $config->logoHeader;
        $this->email = $config->email;
        $this->telephone = $config->telephone;
          $this->telephone1 = $config->telephone1;
        $this->fax = $config->fax;
        $this->addresse = $config->addresse;
        $this->description = $config->description;
        $this->facebook = $config->facebook;
          $this->messenger = $config->messenger;
        $this->twitter = $config->twitter;
        $this->instagram = $config->instagram;
        $this->youtube = $config->youtube;
        $this->linkedin = $config->linkedin;
        $this->tiktok = $config->tiktok;



        $this->titre_apropos1 = $config->titre_apropos1;
        $this->des_apropos1 = $config->des_apropos1;

        $this->titre_apropos2 = $config->titre_apropos2;
        $this->des_apropos2 = $config->des_apropos2;
        // $this->logoHeader = $config->logoHeader;  // not in the migration table so we commented it here
        $this->biographie = $config->biographie;
        $this->localisation = $config->localisation;
    }

    public function render()
    {
        return view('livewire.admin-contact');
    }
    protected $rules = [
        'telephone' => 'required|regex:/^\+\d{6,20}$/',
    ];

    public function update_form()
    {
        
        $this->validate([
            'logo' => 'sometimes|nullable|file|mimetypes:image/*',  // 1MB Max
            'photos.*' => 'sometimes|nullable|file|mimetypes:image/*',
           
             'imagecontact' => 'sometimes|nullable|file|mimetypes:image/*',
            'imageformation' => 'sometimes|nullable|file|mimetypes:image/*', // 1MB Max
            'icon' =>  'sometimes|nullable|file|mimetypes:image/*',

          
            'telephone' => 'nullable|regex:/^[0-9\s\-\+\(\)]+$/|min:10|max:20',
            'email' => 'nullable',
            'addresse' => 'nullable|string',
            'description' => 'nullable|string',
            'logoHeader' => 'nullable|image',
            'fax' => 'nullable|numeric',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'coach' => 'nullable|numeric',
            'seance' => 'nullable|numeric',
            'adherent' => 'nullable|numeric',
            'tounoir' => 'nullable|numeric',


        ]);

        // update the user
        $config = config::first();
        if ($this->logo) {
            //delete old logo
            if ($this->logo2) {
                Storage::disk('public')->delete($this->logo2);
            }
            $config->logo = $this->logo->store('logo', 'public');
        }
        if ($this->logoHeader) {
            //delete old logo
            if ($this->logoHeader2) {
                Storage::disk('public')->delete($this->logoHeader2);
            }
            $config->logoHeader = $this->logoHeader->store('logoHeader', 'public');
        }

        if ($this->icon) {
            //delete old icon
            if ($this->icon2) {
                Storage::disk('public')->delete($this->icon2);
            }
            $config->icon = $this->icon->store('icon', 'public');
        }

        if ($this->logocontact) {
            //delete old logo
            if ($this->logocontact2) {
                Storage::disk('public')->delete($this->logocontact2);
            }
            $config->logocontact = $this->logocontact->store('logocontact', 'public');
        }

        if ($this->imagecontact) {
            //delete old logo
            if ($this->imagecontact2) {
                Storage::disk('public')->delete($this->imagecontact2);
            }
            $config->imagecontact = $this->imagecontact->store('imagecontact', 'public');
        }


        if ($this->imageevent) {
            //delete old logo
            if ($this->imageevent2) {
                Storage::disk('public')->delete($this->imageevent2);
            }
            $config->imageevent = $this->imageevent->store('imageevent', 'public');
        }



        if ($this->imageenteteabout) {
            //delete old logo
            if ($this->imageenteteabout2) {
                Storage::disk('public')->delete($this->imageenteteabout2);
            }
            $config->imageenteteabout = $this->imageenteteabout->store('imageenteteabout', 'public');
        }


        if ($this->imageblog) {
            //delete old logo
            if ($this->imageblog2) {
                Storage::disk('public')->delete($this->imageblog2);
            }
            $config->imageblog = $this->imageblog->store('imageblog', 'public');
        }

            if ($this->imageoffre) {
            //delete old logo
            if ($this->imageoffre2) {
                Storage::disk('public')->delete($this->imageoffre2);
            }
            $config->imageoffre = $this->imageoffre->store('imageblog', 'public');
        }



        if ($this->imageformation) {
            //delete old logo
            if ($this->imageformation2) {
                Storage::disk('public')->delete($this->imageformation2);
            }
            $config->imageformation = $this->imageformation->store('imageformation', 'public');
        }


        if ($this->image_apropos) {
            //delete old image
            if ($this->image_apropo2) {
                Storage::disk('public')->delete($this->image_apropo2);
            }
            $config->image_apropos = $this->image_apropos->store('image_apropos', 'public');
        }


        if ($this->image1_apropos) {
            //delete old image
            if ($this->image1_apropos2) {
                Storage::disk('public')->delete($this->image1_apropos2);
            }
            $config->image1_apropos = $this->image1_apropos->store('image_apropos', 'public');
        }
        if ($this->image_apropos1) {
            //delete old image
            if ($this->image_apropos12) {
                Storage::disk('public')->delete($this->image_apropos12);
            }
            $config->image_apropos1 = $this->image_apropos1->store('image_apropos', 'public');
        }


        if ($this->image1_apropos1) {
            //delete old image
            if ($this->image1_apropos12) {
                Storage::disk('public')->delete($this->image1_apropos12);
            }
            $config->image1_apropos1 = $this->image1_apropos1->store('image_apropos', 'public');
        }

        if ($this->image2_apropos1) {
            //delete old image
            if ($this->image2_apropos12) {
                Storage::disk('public')->delete($this->image2_apropos12);
            }
            $config->image2_apropos1 = $this->image2_apropos1->store('image_apropos', 'public');
        }

        if ($this->image3_apropos1) {
            //delete old image
            if ($this->image3_apropos12) {
                Storage::disk('public')->delete($this->image3_apropos12);
            }
            $config->image3_apropos1 = $this->image3_apropos1->store('image_apropos', 'public');
        }

        if ($this->image_apropos2) {
            //delete old image
            if ($this->image_apropos22) {
                Storage::disk('public')->delete($this->image_apropos22);
            }
            $config->image_apropos2 = $this->image_apropos2->store('image_apropos', 'public');
        }


        if ($this->image1_home) {
            //delete old image
            if ($this->image1_home2) {
                Storage::disk('public')->delete($this->image1_home2);
            }
            $config->image1_home = $this->image1_home->store('image_home', 'public');
        }

        if ($this->image2_home) {
            //delete old image
            if ($this->image2_home2) {
                Storage::disk('public')->delete($this->image2_home2);
            }
            $config->image2_home = $this->image2_home->store('image_home', 'public');
        }

        if ($this->image3_home) {
            //delete old image
            if ($this->image3_home2) {
                Storage::disk('public')->delete($this->image3_home2);
            }
            $config->image3_home = $this->image3_home->store('image_home', 'public');
        }


        if ($this->image4_home) {
            //delete old image
            if ($this->image4_home2) {
                Storage::disk('public')->delete($this->image4_home2);
            }
            $config->image4_home = $this->image4_home->store('image_home', 'public');
        }

        /*   if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('image_apropos', 'public');
            }
          

            $this->config->photos = json_encode($photosPaths);
        }  
 *//* 
        if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('apropos', 'public');
            }
            $config->photos = json_encode($photosPaths);
        } */

        if (!empty($this->photos)) {
            // 1. Supprimer les anciennes photos si elles existent
            if ($config->photos) {
                $oldPhotos = json_decode($config->photos, true);
                foreach ($oldPhotos as $oldPhoto) {
                    if (Storage::disk('public')->exists($oldPhoto)) {
                        Storage::disk('public')->delete($oldPhoto);
                    }
                }
            }

            // 2. Enregistrer les nouvelles photos
            $photosPaths = collect($this->photos)
                ->filter(fn($photo) => $photo !== null)
                ->map(function ($photo) {
                    return $photo->store('apropos', 'public');
                })
                ->toArray();

            $config->photos = json_encode($photosPaths);
        }


        $config->telephone = $this->telephone;
        $config->fax = $this->fax;
        $config->email = $this->email;
        $config->addresse = $this->addresse;
        $config->description = $this->description;
        $config->facebook = $this->facebook;
        //$config->twitter = $this->twitter;
        $config->instagram = $this->instagram;
        $config->youtube = $this->youtube;
        $config->linkedin = $this->linkedin;
        $config->tiktok = $this->tiktok;
        $config->messenger = $this->messenger;

        $config->titre_apropos = $this->titre_apropos;
        $config->des_apropos = $this->des_apropos;
        // $config->titre_apropos = $this->titre_apropos;
        // $config->des_apropos = $this->des_apropos;

        $config->titre_apropos1 = $this->titre_apropos1;
        $config->des_apropos1 = $this->des_apropos1;

        $config->titre_apropos2 = $this->titre_apropos2;
        $config->des_apropos2 = $this->des_apropos2;
        $config->slogan_apropos = $this->slogan_apropos;
        $config->slogan1_apropos = $this->slogan1_apropos;

        $config->des_home = $this->des_home;
        $config->titre_home = $this->titre_home;
        $config->sous_titre_home = $this->sous_titre_home;
        $config->biographie = $this->biographie;
        $config->localisation = $this->localisation;

        $config->texte = $this->texte;
        $config->texte1 = $this->texte1;
        $config->texte2 = $this->texte2;
        $config->texte3 = $this->texte3;
     /*    $config->explication = $this->explication;
        $config->explication1 = $this->explication1;
        $config->explication2 = $this->explication2;
        $config->explication3 = $this->explication3;
        $config->explication4 = $this->explication4;
        $config->explication5 = $this->explication5; */
        $config->question = $this->question;
        $config->question1 = $this->question1;
        $config->question2 = $this->question2;
        $config->reponse = $this->reponse;
        $config->reponse1 = $this->reponse1;
        $config->reponse2 = $this->reponse2;

        $config->note = $this->note;
        $config->note1 = $this->note1;
        $config->note2 = $this->note2;
        $config->note3 = $this->note3;
        $config->note4 = $this->note4;
        $config->note5 = $this->note5;

        $config->pourcetage = $this->pourcentage;
        $config->experience = $this->experience;
        $config->sponsor = $this->sponsor;
        $config->client = $this->client;
        $config->projet = $this->projet;

        if ($config->save()) {
            //flash message
            session()->flash('info', 'Vos modifications ont été enregistrées.');
        } else {
            //flash message
            session()->flash('danger', 'Vos modifications n\'ont pas été enregistrées.');
        }
    }
}
