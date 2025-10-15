<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
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

    public function store(StoreDocumentRequest $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'fichier' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validation du fichier
            'cours_id' => 'nullable|exists:cours,id', // Validation du cours
        ]);
    
        if ($request->hasFile('fichier')) {
            $fichier = $request->file('fichier');
            $fichierPath = $fichier->store('documents'); // Stockage du fichier dans le dossier 'documents'
        }
    
        // Création du document
        Document::create([
            'titre' => $request->titre,
            'fichier' => $fichierPath,
            'cours_id' => $request->cours_id,
        ]);
    
        return redirect()->route('documents.index')->with('success', 'Document ajouté avec succès.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


     
public function edit($id)
{
    $document = Document::findOrFail($id);
    return view('documents.edit', compact('document'));
}

public function update(UpdateDocumentRequest $request, $id)
{
    // Validation des données
    $request->validate([
        'titre' => 'required|string|max:255',
        'fichier' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validation pour un fichier (optionnel)
        'cours_id' => 'nullable|exists:cours,id', // Validation du cours
    ]);

    // Trouver le document par ID
    $document = Document::findOrFail($id);

    // Si un nouveau fichier a été téléchargé, on le supprime de la storage et on le remplace
    if ($request->hasFile('fichier')) {
        // Supprimer l'ancien fichier si il existe
        if ($document->fichier && Storage::exists($document->fichier)) {
            Storage::delete($document->fichier);
        }

        // Gérer l'upload du fichier
        $fichier = $request->file('fichier');
        $fichierPath = $fichier->store('documents'); // Stockage dans le dossier 'documents'
    } else {
        // Si aucun fichier n'est téléchargé, conserver l'ancien fichier
        $fichierPath = $document->fichier;
    }

    // Mettre à jour le document avec les nouvelles données
    $document->update([
        'titre' => $request->titre,
        'fichier' => $fichierPath,
        'cours_id' => $request->cours_id, // Si applicable
    ]);

    return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès.');
}
    public function edit1(Document $document)
    {
        //
    }


    
public function destroy($id)
{
    // Trouver le document par ID
    $document = Document::findOrFail($id);

    // Supprimer le fichier du système de fichiers (si le fichier existe)
    if ($document->fichier && Storage::exists($document->fichier)) {
        Storage::delete($document->fichier);
    }

    // Supprimer le document de la base de données
    $document->delete();

    return redirect()->back()->with('success', 'Document supprimé avec succès.');
}



}
