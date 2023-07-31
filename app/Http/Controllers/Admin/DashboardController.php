<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Position;
use App\Models\Vote;
use App\Models\Voter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $voter = count(Voter::all());
        $candidate = count(Candidate::all());
        $position = count(Position::all());
        $vote = count(Vote::all());
        return view('admin.dashboard.index', compact('voter', 'candidate', 'position', 'vote'));
    }

    public function chart()
    {
        $candidate = Candidate::select('fullname', 'point')->orderBy('point', 'desc')->limit(11)->get();
        $labels = $candidate->pluck('fullname');
        $points = $candidate->pluck('point');
        return response()->json(compact('labels', 'points'));
    }
}
