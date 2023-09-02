<?php

namespace App\Livewire;

use App\Mail\IdeaStatusUpdateMailable;
use App\Models\Idea;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class SetStatus extends Component
{
    public $idea;
    public $status;
    public $notifyAllVoters;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
        if (auth()->guest() || ! auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->status_id = $this->status;
        $this->idea->save();

        if ($this->notifyAllVoters) {
            $this->notifyAllVoters();
        }

        $this->dispatch('statusWasUpdated');
    }

    public function notifyAllVoters()
    {
        $this->idea->votes()
            ->select('name', 'email')
            ->chunk(100, function ($voters) {
                foreach ($voters as $user) {
                    Mail::to($user)
                        ->queue(new IdeaStatusUpdateMailable($this->idea));
                }
            });
    }
    
    public function render()
    {
        return view('livewire.set-status');
    }
}
