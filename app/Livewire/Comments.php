<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $post;
    public $comment;
    public $successMessage;

    protected $rules = [
        'comment' => 'required|min:4',
        'post' => 'required',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function deleteComment()
    {
        
    }

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'model_id'          =>  $this->post->id,
            'model_type'        =>  Post::class,
            'user_id'           =>  Auth()->id(),
            'content'           =>  $this->comment,
        ]);

        $this->comment = '';

        $this->post = Post::find($this->post->id);

        $this->successMessage =  'Comment was posted!';
    }
    
    public function render()
    {
        return view('livewire.comments');
    }
}
