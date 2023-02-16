<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\GalleryType;
use App\Enums\ProjectType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // start ENUM ProjectType
            $table->integer('type')->default(ProjectType::PHOTOS->value);
            // end ENUM
            // start ENUM GalleryType
            $table->integer('gallery_type')->default(GalleryType::CAROUSEL->value);
            // end ENUM

            $table->boolean('active')->default(true);
            $table->string('info_time'); // eg 'run during 2022' or 'from 2021 to 2022'
            $table->text('info_de')->nullable();
            $table->text('info_en')->nullable();
            $table->tinyInteger('menu_position');
            $table->string('watermark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
