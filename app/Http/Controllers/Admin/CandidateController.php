<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return view('admin.candidate.index', [
            'positions' => Position::all(),
            'data' => Candidate::all()
        ]);
    }

    public function store(Request $request)
    {
        Candidate::create([
            'fullname' => $request->input('fullname'),
            'profile' => $request->input('profile'),
            'position_id' => $request->input('position_id'),
        ]);

        return redirect('/admin/candidate')->with('msg', 'Success add data');
    }

    public function destroy(string $id)
    {
        $data = Candidate::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Berhasil hapus data'
        ]);
    }
}
