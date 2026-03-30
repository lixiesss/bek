<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiclashTeam;
use App\Models\ArchidrawRegistration;
use Illuminate\Http\Request;

class ApiDashboardController extends Controller
{
    public function getTeams()
    {
        $teams = ArchiclashTeam::with('participants')->latest()->get();
        return response()->json(['success' => true, 'data' => $teams]);
    }

    public function verifyTeam(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:pending,verified,rejected']);

        $team = ArchiclashTeam::findOrFail($id);
        $team->update(['status' => $request->status]);

        return response()->json(['success' => true, 'message' => 'Status updated']);
    }
}
