<?php

namespace App\Http\Livewire\Pages;

use App\Models\Voter;
use Livewire\Component;

class Setting extends Component
{
    public $new_password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.pages.setting');
    }

    public function save()
    {
        $this->validate([
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $data = Voter::findOrFail(auth()->user()->id);
        $data->password = bcrypt($this->new_password);
        $data->password_text = $this->new_password;
        $data->save();

        return to_route('main.voter.index');
    }
}
