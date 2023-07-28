<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Setting;
use App\Models\Vote;
use App\Models\Voter;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = Candidate::all();
        $setting = Setting::first();
        return view('voter.dashboard', compact('data', 'setting'));
    }

    public function vote(Request $request)
    {
        $voter = Voter::findOrFail(auth()->user()->id);

        foreach ($request->vote as $id) {
            $data = Candidate::findOrFail($id);
            $data->point += 1;
            $data->save();
            Vote::create([
               'candidate' => $data->fullname,
               'position' => $data->position->description,
               'voter' => $voter->fullname 
            ]);
        }

        $voter->status = 'voted';
        $voter->save();


        return to_route('main.voter.index');
    }
}
