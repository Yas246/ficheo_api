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
}
