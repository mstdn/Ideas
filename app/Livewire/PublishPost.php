<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class PublishPost extends Component
{
    use WithFileUploads;

    #[Rule('required|min:5|max:80')]
    public $title ='';

    #[Rule('nullable|min:5|max:2000')]
    public $description;

    #[Rule('nullable|min:5|max:2000')]
    public $content;

    #[Rule('required')]
    public $category = 1;

    #[Rule('required|min:1|max:4')]
    public $images;

    public $slug;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }

    public function save()
    {
        $this->validate();

        $formSubmission = Post::create([
            'user_id'           =>  Auth()->id(),
            'title'             =>  $this->title,
            'content'           =>  $this->content,
            'category_id'       =>  $this->category,
            'slug'              =>  $this->slug
        ]);

        if ($this->images) {
            foreach ($this->images as $image) {
                $formSubmission->addMedia($image->getRealPath())
                    ->usingName($image->getClientOriginalName())
                    ->toMediaCollection('images');
            }
        }

        $this->title = '';
        $this->content = '';
        $this->images = '';
        $this->category = 1;
        $this->slug = '';
    }

    public function render()
    {
        return view('livewire.publish-post');
    }
}
