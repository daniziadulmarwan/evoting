<?php

namespace App\Http\Livewire\Voter;

use App\Models\Voter;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $fullname, $username, $password_text, $voterId, $oldPhoto, $newPhoto, $status;

    protected $listeners = ['edit-voter' => 'edit'];

    public function render()
    {
        return view('livewire.voter.edit');
    }

    public function edit($id)
    {
        $data = Voter::findOrFail($id);
        $this->fullname = $data->fullname;
        $this->password_text = $data->password_text;
        $this->voterId = $data->id;
        $this->oldPhoto = $data->photo;
        $this->username = $data->username;
        $this->status = $data->status;
    }

    public function update()
    {
        $data = Voter::findOrFail($this->voterId);

        if ($this->newPhoto != null) {
            Storage::delete($this->oldPhoto);
            $data->fullname = $this->fullname;
            $data->username = $this->username;
            $data->status = $this->status;
            $data->photo = $this->newPhoto->store('photos');
            $data->save();
            return redirect('/admin/voter')->with('msg', 'Success update data and save photo');
        } else {
            $data->fullname = $this->fullname;
            $data->username = $this->username;
            $data->status = $this->status;
            $data->save();
            return redirect('/admin/voter')->with('msg', 'Success update data');
        }
    }
}
