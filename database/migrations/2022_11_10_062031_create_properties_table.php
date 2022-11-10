<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('rent');
            $table->string('adderss');
            $table->string('size');
            $table->string('room_category');
            $table->string('additional_facilities');
            $table->string('apt_overview');
            $table->string('features');
            $table->tinyInteger('is_active')->default(1)->comment('1:Active, 0:Inactive');
            $table->string('slug', 100)->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
};
