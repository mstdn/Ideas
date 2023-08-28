<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PublishCategory extends Component
{

    use WithFileUploads;

    #[Rule('required|min:1|max:30')]
    public $title ='';

    #[Rule('nullable|min:3|max:2000')]
    public $description;

    #[Rule('required|min:1|max:4')]
    public $images;

    public $slug;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->title);
    }

    public function save()
    {
        $this->validate();

        $formSubmission = Category::create([
            'title'             =>  $this->title,
            'description'       =>  $this->description,
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
        $this->description = '';
        $this->images = '';
        $this->slug = '';

    }

    public function render()
    {
        return view('livewire.publish-category');
    }
}
