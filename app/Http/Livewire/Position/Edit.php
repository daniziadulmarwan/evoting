<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
use Livewire\Component;

class Edit extends Component
{
    public $description;
    public $max_vote;
    public $positionId;

    protected $listeners = ['edit-position' => 'edit'];

    public function render()
    {
        return view('livewire.position.edit');
    }

    public function edit($id)
    {
        $data = Position::findOrFail($id);
        $this->positionId = $data->id;
        $this->description = $data->description;
        $this->max_vote = $data->max_vote;
    }

    public function update()
    {
        $data = Position::findOrFail($this->positionId);
        $data->description = $this->description;
        $data->max_vote = $this->max_vote;
        $data->save();
        return redirect('/admin/position')->with('msg', 'Success update data');
    }
}
