<?php

// app/Models/MaintenanceReport.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'technician_name',
        'number_of_sheets',
        'client',
        'site',
        'report',
    ];
}
