<?php

namespace App\Http\Livewire\Setting;

use App\Models\User;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password, $confirm_password;

    public function render()
    {
        return view('livewire.setting.change-password');
    }

    public function save()
    {
        $this->validate([
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $data = User::findOrFail(auth()->user()->id);

        $data->password = bcrypt($this->password);
        $data->password_text = $this->password;
        $data->save();

        return redirect('/admin/setting')->with('msg', 'Sucess change password');
    }
}
