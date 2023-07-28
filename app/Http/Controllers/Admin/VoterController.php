<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;
use App\Imports\VotersImport;
use Maatwebsite\Excel\Facades\Excel;

class VoterController extends Controller
{
    public function index()
    {
        return view('admin.voters.index', [
            'data' => Voter::all()
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $credentials['photo'] = $request->file('photo')->store('photo');
        }

        $credentials['password'] = bcrypt($request->input('password'));
        $credentials['password_text'] = $request->input('password');

        Voter::create($credentials);

        return redirect('/admin/voter')->with('msg', 'Success add data');
    }

    public function destroy(string $id)
    {
        $data = Voter::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Berhasil hapus data'
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new VotersImport, $request->document);
        return redirect('/admin/voter')->with('msg', 'Berhasil import data');
    }
}
