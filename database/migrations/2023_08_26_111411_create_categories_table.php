<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        $data =  array(
            [
                'title'             => 'General',
                'slug'              => 'general',
                'description'       =>  'A general default forum.',
            ],
            [
                'title'             => 'Help',
                'slug'              => 'help',
                'description'       =>  'A default help forum.',
            ],
            
        );
        foreach ($data as $datum) {
            $category = new Category();
            $category->title = $datum['title'];
            $category->slug = $datum['slug'];
            $category->description = $datum['description'];
            $category->save();
        };
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
