<?php

namespace App\Http\Livewire\Voter;

use App\Models\Voter;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $fullname, $username, $password, $photo;

    protected $rules = [
        'fullname' => 'required',
        'username' => 'required',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.voter.create');
    }

    public function save()
    {
        $this->validate();

        if ($this->photo != null) {
            Voter::create([
                'fullname' => $this->fullname,
                'username' => $this->username,
                'password' => bcrypt($this->password),
                'password_text' => $this->password,
                'photo' => $this->photo->store('photos')
            ]);
        } else {
            Voter::create([
                'fullname' => $this->fullname,
                'username' => $this->username,
                'password' => bcrypt($this->password),
                'password_text' => $this->password,
            ]);
        }


        return redirect('/admin/voter')->with('msg', 'Success add data');
    }
}
