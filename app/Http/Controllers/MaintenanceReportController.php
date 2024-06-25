<?php

// app/Http/Controllers/MaintenanceReportController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceReport;

class MaintenanceReportController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'technicianName' => 'required|string|max:255',
            'numberOfSheets' => 'required|integer',
            'client' => 'required|string|max:255',
            'site' => 'required|string|max:255',
            'report' => 'required|string',
        ]);

        $report = MaintenanceReport::create([
            'technician_name' => $validated['technicianName'],
            'number_of_sheets' => $validated['numberOfSheets'],
            'client' => $validated['client'],
            'site' => $validated['site'],
            'report' => $validated['report'],
        ]);

        return response()->json(['message' => 'Rapport de maintenance créé avec succès.'], 201);
    }
    public function index(Request $request)
    {
        $reports = MaintenanceReport::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

   
        $search = $request->input('search');

        $query = MaintenanceReport::query();

        if ($search) {
            $query->where('technician_name', 'like', '%' . $search . '%')
                  ->orWhere('client', 'like', '%' . $search . '%')
                  ->orWhere('site', 'like', '%' . $search . '%')
                  ->orWhere('report', 'like', '%' . $search . '%');
        }

        $reports = $query->orderBy('created_at', 'desc')->paginate(10);

        return response()->json($reports);
    }
}
