<?php

// app/Models/FicheDIntervention.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FicheDIntervention extends Model
{
    use HasFactory;

    protected $fillable = [
        'ClientNom', 'ClientSite', 'ClientBureau', 'Date', 'TypeIntervention', 
        'TypeMateriel', 'AutreMateriel', 'Modele', 'NumeroSerie', 'OS', 
        'Processeur', 'CapaciteRAM', 'TailleDisqueDur', 'NomMachine', 
        'PanneDeclaree', 'ConstatTechnicien', 'ProblemeResolu', 
        'DeplacerDiagnostic', 'NecessiteCommandePieces', 'NonReparable', 
        'AutresObservations', 'ObservationsUtilisateur', 'Satisfait', 
        'Insatisfait', 'NomIntervenant', 'SignatureIntervenant', 
        'NomUtilisateur', 'SignatureUtilisateur'
    ];
}
