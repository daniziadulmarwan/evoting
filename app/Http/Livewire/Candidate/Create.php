<?php

namespace App\Http\Livewire\Candidate;

use App\Models\Candidate;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $positionId, $fullname, $profile, $photo;

    protected $rules = [
        'fullname' => 'required',
        'profile' => 'required',
        'positionId' => 'required',
    ];

    public function render()
    {
        return view('livewire.candidate.create', [
            'positions' => Position::all()
        ]);
    }

    public function save()
    {
        $this->validate();

        if ($this->photo != null) {
            Candidate::create([
                'position_id' => $this->positionId,
                'fullname' => $this->fullname,
                'profile' => $this->profile,
                'photo' => $this->photo->store('photos')
            ]);
        } else {
            Candidate::create([
                'position_id' => $this->positionId,
                'fullname' => $this->fullname,
                'profile' => $this->profile,
            ]);
        }

        return redirect('/admin/candidate')->with('msg', 'Success add data');
    }
}
