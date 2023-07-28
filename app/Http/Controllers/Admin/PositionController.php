<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.position.index', [
            'data' => Position::all()
        ]);
    }

    public function store(Request $request)
    {
        Position::create([
            'description' => $request->input('description'),
        ]);

        return redirect('/admin/position')->with('msg', 'Success add data');
    }

    public function destroy(string $id)
    {
        $data = Position::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Berhasil hapus data'
        ]);
    }
}
