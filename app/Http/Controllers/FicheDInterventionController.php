<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FicheDIntervention;

class FicheDInterventionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ClientNom' => 'nullable|string|max:255',
            'ClientSite' => 'nullable|string|max:255',
            'ClientBureau' => 'nullable|string|max:255',
            'Date' => 'nullable|date',
            'TypeIntervention' => 'nullable|string|in:Maintenance préventive,Intervention sur demande',
            'TypeMateriel' => 'nullable|string|max:255',
            'AutreMateriel' => 'nullable|string|max:255',
            'Modele' => 'nullable|string|max:255',
            'NumeroSerie' => 'nullable|string|max:255',
            'OS' => 'nullable|string|max:255',
            'Processeur' => 'nullable|string|max:255',
            'CapaciteRAM' => 'nullable|integer',
            'TailleDisqueDur' => 'nullable|integer',
            'NomMachine' => 'nullable|string|max:255',
            'PanneDeclaree' => 'nullable|string|max:255',
            'ConstatTechnicien' => 'nullable|string|max:255',
            'ProblemeResolu' => 'nullable|boolean',
            'DeplacerDiagnostic' => 'nullable|boolean',
            'NecessiteCommandePieces' => 'nullable|boolean',
            'NonReparable' => 'nullable|boolean',
            'AutresObservations' => 'nullable|string|max:255',
            'ObservationsUtilisateur' => 'nullable|string|max:255',
            'Satisfait' => 'nullable|boolean',
            'Insatisfait' => 'nullable|boolean',
            'NomIntervenant' => 'nullable|string|max:255',
            'SignatureIntervenant' => 'nullable|string',
            'NomUtilisateur' => 'nullable|string|max:255',
            'SignatureUtilisateur' => 'nullable|string',
        ]);

        $fiche = FicheDIntervention::create($validatedData);

        return response()->json($fiche, 201);
    }
    public function index(Request $request)
    {
        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->query('search');

        // Commencer avec la requête pour toutes les fiches
        $query = FicheDIntervention::query();

        // Si un terme de recherche est fourni, filtrer les fiches en conséquence
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('ClientNom', 'like', "%$searchTerm%")
                  ->orWhere('NomIntervenant', 'like', "%$searchTerm%")
                  ->orWhere('Date', 'like', "%$searchTerm%");
                        });            // Ajoutez d'autres conditions de recherche pour d'autres champs si nécessaire
        }

        // Récupérer les fiches triées par ordre décroissant de création
        $fiches = $query->orderBy('created_at', 'desc')->get();

        return response()->json($fiches, 200);
    }
    public function show($id)
{
    // Recherche de la fiche par son ID
    $fiche = FicheDIntervention::find($id);

    // Vérification de l'existence de la fiche
    if (!$fiche) {
        return response()->json(['message' => 'Fiche non trouvée.'], 404);
    }

        // Retourne les données de la fiche
        return response()->json($fiche);
}


    
}

