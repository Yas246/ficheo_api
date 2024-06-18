<?php

// database/migrations/xxxx_xx_xx_create_fiche_d_interventions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheDInterventionsTable extends Migration
{
    public function up()
{
    Schema::create('fiche_d_interventions', function (Blueprint $table) {
        $table->id();
        $table->string('ClientNom')->nullable();
        $table->string('ClientSite')->nullable();
        $table->string('ClientBureau')->nullable();
        $table->date('Date')->nullable();
        $table->enum('TypeIntervention', ['Type1', 'Type2', 'Type3'])->nullable(); // Remplacez par vos types réels
        $table->string('TypeMateriel')->nullable();
        $table->string('AutreMateriel')->nullable();
        $table->string('Modele')->nullable();
        $table->string('NumeroSerie')->nullable();
        $table->string('OS')->nullable();
        $table->string('Processeur')->nullable();
        $table->integer('CapaciteRAM')->nullable();
        $table->integer('TailleDisqueDur')->nullable();
        $table->string('NomMachine')->nullable();
        $table->string('PanneDeclaree')->nullable();
        $table->string('ConstatTechnicien')->nullable();
        $table->boolean('ProblemeResolu')->nullable();
        $table->boolean('DeplacerDiagnostic')->nullable();
        $table->boolean('NecessiteCommandePieces')->nullable();
        $table->boolean('NonReparable')->nullable();
        $table->string('AutresObservations')->nullable();
        $table->string('ObservationsUtilisateur')->nullable();
        $table->boolean('Satisfait')->nullable();
        $table->boolean('Insatisfait')->nullable();
        $table->string('NomIntervenant')->nullable();
        $table->longText('SignatureIntervenant')->nullable();
        $table->string('NomUtilisateur')->nullable();
        $table->longText('SignatureUtilisateur')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('fiche_d_interventions');
    }
}
