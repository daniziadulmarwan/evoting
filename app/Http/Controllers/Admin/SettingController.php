<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::first();
        return view('admin.setting.index', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = Setting::findOrFail($id);
        $data->title = $request->title;
        $data->max_vote = $request->max_vote;
        $data->save();
        return redirect('/admin/setting')->with('msg', 'Success update data');
    }
}
