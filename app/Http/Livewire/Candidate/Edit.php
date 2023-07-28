<?php

namespace App\Http\Livewire\Candidate;

use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $fullname, $profile, $positionId, $candidateId, $oldPhoto, $newPhoto;

    protected $listeners = ['edit-candidate' => 'edit'];

    public function render()
    {
        return view('livewire.candidate.edit', [
            'positions' => Position::all()
        ]);
    }

    public function edit(string $id)
    {
        $data = Candidate::findOrFail($id);
        $this->fullname = $data->fullname;
        $this->profile = $data->profile;
        $this->positionId = $data->position_id;
        $this->candidateId = $data->id;
        $this->oldPhoto = $data->photo;
    }

    public function update()
    {
        $data = Candidate::find($this->candidateId);

        if ($this->newPhoto != null) {
            Storage::delete($this->oldPhoto);
            $data->fullname = $this->fullname;
            $data->profile = $this->profile;
            $data->position_id = $this->positionId;
            $data->photo = $this->newPhoto->store('photos');
            $data->save();
            return redirect('/admin/candidate')->with('msg', 'Success update data with image');
        } else {
            $data->fullname = $this->fullname;
            $data->profile = $this->profile;
            $data->position_id = $this->positionId;
            $data->save();
            return redirect('/admin/candidate')->with('msg', 'Success update data');
        }
    }
}
