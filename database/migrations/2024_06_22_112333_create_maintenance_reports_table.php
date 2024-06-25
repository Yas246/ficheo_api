<?php

// database/migrations/xxxx_xx_xx_create_maintenance_reports_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceReportsTable extends Migration
{
    public function up()
    {
        Schema::create('maintenance_reports', function (Blueprint $table) {
            $table->id();
            $table->string('technician_name');
            $table->integer('number_of_sheets');
            $table->string('client');
            $table->string('site');
            $table->text('report');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maintenance_reports');
    }
}
