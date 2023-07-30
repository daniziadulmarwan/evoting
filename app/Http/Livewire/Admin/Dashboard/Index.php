<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Candidate;
use App\Models\Position;
use App\Models\Vote;
use App\Models\Voter;
use Livewire\Component;

class Index extends Component
{
    public $voter;
    public $candidate;
    public $position;
    public $vote;

    public $charts;

    protected $listeners = ['updateChart' => 'updateChartdata'];

    public function render()
    {
        return view('livewire.admin.dashboard.index')->extends('layouts.app', ['title' => 'Dashboard'])->section('content');
    }

    public function mount()
    {
        $this->voter = count(Voter::all());
        $this->candidate = count(Candidate::all());
        $this->position = count(Position::all());
        $this->vote = count(Vote::all());

        $result = Candidate::select('fullname', 'point')->orderBy('point', 'desc')->limit(11)->get();

        foreach ($result as $item) {
            $data['names'][] = $item->fullname;
            $data['datas'][] = (int) $item->point;
        }

        $this->charts = json_encode($data);
    }

    public function updateChartdata()
    {
        $result = Candidate::select('fullname', 'point')->orderBy('point', 'desc')->limit(11)->get();

        foreach ($result as $item) {
            $data['names'][] = $item->fullname;
            $data['datas'][] = (int) $item->point;
        }

        $this->charts = json_encode($data);
        $this->emit('chartUpdated', ['data' => $this->charts]);
    }
}
