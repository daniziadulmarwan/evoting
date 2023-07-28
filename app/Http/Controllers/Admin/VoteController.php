<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        return view('admin.vote.index', [
            'data' => Vote::all()
        ]);
    }

    public function store(Request $request)
    {
        Vote::create([
            'fullname' => $request->input('fullname'),
            'username' => date('Ymds'),
            'password' => bcrypt($request->input('password')),
            'password_text' => $request->input('password'),
        ]);

        return redirect('/admin/vote')->with('msg', 'Success add data');
    }

    public function destroy(string $id)
    {
        $data = Vote::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Berhasil hapus data'
        ]);
    }

    public function delete(Request $request)
    {
        $confirm = $request->input('confirm');
        if ($confirm == 'yes') {
            Vote::truncate();
        }
        return to_route('vote.index')->with('msg', 'Success delete all data');
    }
}
