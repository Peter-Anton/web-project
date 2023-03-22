<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->index();
            $table->text('excerpt');
            $table->text('body');
            $table->foreignId('offer_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('briefs');
    }
};
