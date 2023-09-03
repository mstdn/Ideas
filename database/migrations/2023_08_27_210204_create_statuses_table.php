<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('classes');
            $table->timestamps();
        });

        $data =  array(
            [
                'name'             => 'Open',
                'class'             => 'bg-blue-700 text-white',
            ],
            [
                'name'             => 'Considering',
                'class'             => 'bg-purple-700 text-white',
            ],
            [
                'name'             => 'In Progress',
                'class'             => 'bg-gray-900 text-white',
            ],
            [
                'name'             => 'Implemented',
                'class'             => 'bg-green-600 text-white',
            ],
            [
                'name'             => 'Closed',
                'class'             => 'bg-red-700 text-white',
            ],

        );
        foreach ($data as $datum) {
            $category = new Status();
            $category->name = $datum['name'];
            $category->classes = $datum['class'];
            $category->save();
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
