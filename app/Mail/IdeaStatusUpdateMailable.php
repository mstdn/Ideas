<?php

namespace App\Mail;

use App\Models\Idea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IdeaStatusUpdateMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $idea;

    public function __construct(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function build()
    {
        return $this->subject('An idea you voted for has a new status')
            ->markdown('emails.idea-status-updated');
    }
}
